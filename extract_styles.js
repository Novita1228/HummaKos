const fs = require('fs');
const path = require('path');

const viewsDir = path.join(__dirname, 'resources', 'views');
const cssPath = path.join(__dirname, 'public', 'assets', 'css', 'utilities.css');

const stylesMap = new Map();
let customCounter = 0;

function generateClassName(prop, value) {
    prop = prop.trim();
    value = value.trim().replace(/!important/g, '').trim();
    
    const prefixes = {
        'font-size': 'fs', 'font-weight': 'fw', 'color': 'text', 'background-color': 'bg',
        'border-radius': 'rounded', 'max-width': 'max-w', 'min-width': 'min-w', 'width': 'w', 'height': 'h',
        'margin': 'm', 'margin-top': 'mt', 'margin-bottom': 'mb', 'margin-left': 'ms', 'margin-right': 'me',
        'padding': 'p', 'padding-top': 'pt', 'padding-bottom': 'pb', 'padding-left': 'ps', 'padding-right': 'pe',
        'line-height': 'lh', 'border': 'border', 'box-shadow': 'shadow', 'object-fit': 'object',
        'letter-spacing': 'tracking', 'z-index': 'z', 'text-align': 'text', 'display': 'd', 'align-items': 'align',
        'justify-content': 'justify', 'flex-direction': 'flex'
    };

    let prefix = prefixes[prop] || prop;
    let safeValue = value.replace(/[^a-zA-Z0-9-]/g, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
    
    if (value.startsWith('#')) {
        safeValue = value.substring(1).toLowerCase();
    }
    
    if (!safeValue) {
        customCounter++;
        safeValue = 'val-' + customCounter;
    }
    
    let className = prefix + '-' + safeValue;
    if (!/^[a-zA-Z_]/.test(className)) className = 'u-' + className;
    
    return className.toLowerCase();
}

function processFiles(dir) {
    const files = fs.readdirSync(dir);
    for (const file of files) {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            processFiles(fullPath);
        } else if (fullPath.endsWith('.blade.php')) {
            let content = fs.readFileSync(fullPath, 'utf8');
            let modified = false;

            const tagRegex = /<([a-zA-Z0-9\-]+)((?:(?!>|{{)[\s\S]|{{[\s\S]*?}})*)>/g;
            const styleRegex = /\sstyle=(["'])(.*?)\1/g;

            content = content.replace(tagRegex, (tagMatch, tagName, attributes) => {
                if (!attributes.includes('style=')) return tagMatch;
                
                let styleString = '';
                let newAttr = attributes.replace(styleRegex, (match, quote, innerStyle) => {
                    styleString = innerStyle;
                    return ''; // remove style attribute
                });

                if (!styleString) return tagMatch;

                const declarations = styleString.split(';').filter(d => d.trim().length > 0);
                const newClasses = [];
                for (let decl of declarations) {
                    const parts = decl.split(':');
                    if (parts.length >= 2) {
                        const prop = parts[0].trim();
                        const val = parts.slice(1).join(':').trim();
                        if (prop && val) {
                            // If it contains blade tags inside the style, skip extraction for safety
                            if (val.includes('{{') || prop.includes('{{')) {
                                return tagMatch; // Keep the original tag
                            }
                            
                            const fullRule = prop + ': ' + val + ' !important;';
                            const className = generateClassName(prop, val);
                            if (!stylesMap.has(className)) {
                                stylesMap.set(className, fullRule);
                            }
                            newClasses.push(className);
                        }
                    }
                }

                if (newClasses.length === 0) {
                     return '<' + tagName + newAttr + '>';
                }

                // Add classes
                if (newAttr.includes('class="')) {
                    newAttr = newAttr.replace(/class="([^"]*)"/, (match, existingClasses) => {
                        return 'class="' + (existingClasses ? existingClasses + ' ' : '') + newClasses.join(' ') + '"';
                    });
                } else if (newAttr.includes("class='")) {
                    newAttr = newAttr.replace(/class='([^']*)'/, (match, existingClasses) => {
                        return "class='" + (existingClasses ? existingClasses + ' ' : '') + newClasses.join(' ') + "'";
                    });
                } else {
                    // if tag ends with slash, put class before it
                    if (newAttr.trim().endsWith('/')) {
                        newAttr = newAttr.replace(/\/\s*$/, ' class="' + newClasses.join(' ') + '" /');
                    } else {
                        newAttr += ' class="' + newClasses.join(' ') + '"';
                    }
                }
                
                modified = true;
                return '<' + tagName + newAttr + '>';
            });

            if (modified) {
                fs.writeFileSync(fullPath, content, 'utf8');
                console.log('Updated: ' + fullPath);
            }
        }
    }
}

console.log("Starting extraction...");
processFiles(viewsDir);

if (stylesMap.size > 0) {
    let cssContent = '/* Auto-generated utilities from inline styles */\n\n';
    for (const [className, rule] of stylesMap.entries()) {
        cssContent += '.' + className + ' { ' + rule + ' }\n';
    }
    
    // Check if utilities.css exists, if so append or create
    if (fs.existsSync(cssPath)) {
        fs.appendFileSync(cssPath, '\n' + cssContent, 'utf8');
    } else {
        fs.writeFileSync(cssPath, cssContent, 'utf8');
    }
    console.log('Generated utilities.css with ' + stylesMap.size + ' classes.');
} else {
    console.log("No inline styles found.");
}