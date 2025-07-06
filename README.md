# Nucleus - WordPress Theme with Turborepo

A modern WordPress theme development setup using Turborepo for efficient SCSS and TypeScript compilation.

## Features

- **Turborepo**: High-performance build system for monorepos
- **SCSS Compilation**: Modern CSS preprocessing with variables, mixins, and responsive design
- **TypeScript**: Type-safe JavaScript with modern ES2020 features
- **WordPress Theme**: Complete WordPress theme with all essential template files
- **Development Workflow**: Hot reloading and watch modes for efficient development

## Project Structure

```
nucleus/
├── package.json                 # Root package.json with all build scripts
├── turbo.json                   # Turborepo pipeline configuration
├── tsconfig.json               # TypeScript configuration
├── .eslintrc.js               # ESLint configuration
├── public/app/themes/electron/  # WordPress theme
│   ├── src/                   # Source files
│   │   ├── scss/             # SCSS source files
│   │   │   └── main.scss     # Main stylesheet
│       │   └── ts/               # TypeScript source files
    │   │       ├── navigation.ts # Navigation functionality
    │   │       └── customizer.ts # Customizer functionality
│   ├── dist/                  # Compiled assets (generated)
│   │   ├── css/              # Compiled CSS
│   │   └── js/               # Compiled JavaScript
│   └── [WordPress theme files]
└── [Other project files]
```

## Getting Started

### Prerequisites

- Node.js 16+ 
- npm 9+
- WordPress development environment

### Installation

1. **Install dependencies:**
   ```bash
   npm install
   ```

2. **Build the theme:**
   ```bash
   npm run build:theme
   ```

3. **Start development mode:**
   ```bash
   npm run dev:theme
   ```

## Available Scripts

### Root Level (Turborepo)
- `npm run build` - Build all packages
- `npm run dev` - Start development mode for all packages
- `npm run watch` - Watch mode for all packages
- `npm run clean` - Clean all dist folders
- `npm run lint` - Lint all packages
- `npm run type-check` - Type check all packages

### Theme Build Scripts
- `npm run build:theme` - Build CSS and JS
- `npm run build:theme:css` - Build only SCSS files
- `npm run build:theme:js` - Build only TypeScript files
- `npm run dev:theme` - Start development mode (watch both CSS and JS)
- `npm run dev:theme:css` - Watch SCSS files
- `npm run dev:theme:js` - Watch TypeScript files
- `npm run watch:theme` - Alias for dev:theme
- `npm run clean:theme` - Remove dist folder
- `npm run lint:theme` - Lint TypeScript files
- `npm run type-check:theme` - Type check TypeScript files

## Development Workflow

### 1. SCSS Development
- Source files: `public/app/themes/electron/src/scss/`
- Output: `public/app/themes/electron/dist/css/`
- Features: Variables, mixins, responsive design, modern CSS

### 2. TypeScript Development
- Source files: `public/app/themes/electron/src/ts/`
- Output: `public/app/themes/electron/dist/js/`
- Features: ES2020, strict type checking, modern JavaScript

### 3. WordPress Integration
- Compiled assets are automatically enqueued in `functions.php`
- Theme follows WordPress coding standards
- Full WordPress theme functionality

## Build Process

### SCSS Compilation
```bash
sass public/app/themes/electron/src/scss:public/app/themes/electron/dist/css --style=compressed --no-source-map
```

### TypeScript Compilation
```bash
tsc --project tsconfig.json
```

### Turborepo Caching
- Build results are cached for faster subsequent builds
- Remote caching support for team collaboration
- Parallel task execution

## Configuration Files

### `turbo.json`
Defines the build pipeline and task dependencies:
- `build:theme`: Compiles SCSS and TypeScript
- `dev:theme`: Development mode with file watching
- `watch:theme`: File watching for changes
- `clean:theme`: Removes build artifacts
- `lint:theme`: Code linting
- `type-check:theme`: TypeScript type checking

### `tsconfig.json`
TypeScript configuration with:
- ES2020 target
- Strict type checking
- Source maps for debugging
- Declaration files

### `.eslintrc.js`
ESLint configuration with:
- TypeScript support
- Modern JavaScript features
- Code quality rules

## WordPress Theme Features

- **Responsive Design**: Mobile-first approach
- **Modern CSS**: CSS Grid, Flexbox, custom properties
- **Accessibility**: WCAG compliant
- **SEO Optimized**: Semantic HTML structure
- **Translation Ready**: Full internationalization support
- **Customizer Support**: Live preview functionality
- **Widget Areas**: Sidebar widget support
- **Custom Logo**: WordPress custom logo support
- **Featured Images**: Post thumbnail support

## Performance Benefits

### Turborepo Advantages
- **Parallel Execution**: Tasks run simultaneously across cores
- **Intelligent Caching**: Only rebuilds what changed
- **Remote Caching**: Share cache across team members
- **Incremental Adoption**: Add to existing projects easily

### Build Optimizations
- **SCSS**: Compressed output, no source maps in production
- **TypeScript**: Modern ES2020 output, tree shaking
- **WordPress**: Optimized asset loading

## Deployment

1. **Build for production:**
   ```bash
   npm run build:theme
   ```

2. **Upload theme to WordPress:**
   - Copy the `electron` theme folder to `/wp-content/themes/`
   - Activate the theme in WordPress admin

3. **Verify assets:**
   - Check that CSS and JS files are loading correctly
   - Test responsive design and functionality

## Troubleshooting

### Common Issues

1. **Build fails:**
   - Check Node.js version (requires 16+)
   - Clear cache: `npm run clean:theme && npm run build:theme`

2. **TypeScript errors:**
   - Run type check: `npm run type-check:theme`
   - Check `tsconfig.json` configuration

3. **SCSS compilation issues:**
   - Verify SCSS syntax
   - Check file paths in imports

4. **WordPress assets not loading:**
   - Verify `dist/` folder exists
   - Check file permissions
   - Clear WordPress cache

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests: `npm run lint:theme && npm run type-check:theme`
5. Build: `npm run build:theme`
6. Submit a pull request

## License

This project is licensed under the GPL v2 or later.

## Credits

- Built with [Turborepo](https://turborepo.com/)
- WordPress theme development best practices
- Modern frontend development workflow 
