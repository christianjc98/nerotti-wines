# Potential Wine Theme + React Blocks

A modern WordPress block theme for wine brand websites, featuring Full Site Editing (FSE) and custom React-based Gutenberg blocks.

## Overview

This project consists of two parts:
1. **Potential Wine Theme** - A block theme with templates, patterns, and custom post type
2. **Wine React Blocks Plugin** - Custom Gutenberg blocks built with React

## Features

- Full Site Editing (FSE) support
- Custom Wine post type with taxonomy
- Responsive design
- Accessibility-ready (WCAG AA)
- Three custom React blocks:
  - Wine Card
  - Experience Highlight
  - Contact CTA
- Pre-built block patterns
- Semantic HTML markup
- No external dependencies (no jQuery, no page builders)

---

## Installation

### 1. Install the Theme

1. Copy the `potential-theme` folder to `/wp-content/themes/`
2. In WordPress admin, go to **Appearance > Themes**
3. Activate **Potential Wine Theme**

### 2. Install the Plugin

1. Navigate to the plugin directory:
   ```bash
   cd wp-content/plugins/wine-react-blocks
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Build the blocks:
   ```bash
   npm run build
   ```

4. In WordPress admin, go to **Plugins**
5. Activate **Wine React Blocks**

### 3. Development Mode (Optional)

To work on the blocks with live reloading:

```bash
cd wp-content/plugins/wine-react-blocks
npm start
```

---

## Theme Structure

```
potential-theme/
├── style.css           # Theme header and base styles
├── theme.json          # Theme configuration (colors, typography, spacing)
├── functions.php       # CPT registration, patterns, hooks
├── index.php           # Required by WordPress (minimal)
├── templates/          # Block templates
│   ├── home.html
│   ├── page.html
│   ├── single.html
│   ├── single-wine.html
│   ├── archive.html
│   └── 404.html
├── parts/              # Template parts
│   ├── header.html
│   ├── footer.html
│   └── hero.html
└── patterns/           # Block patterns
    ├── hero-home.php
    ├── product-grid.php
    ├── experience-section.php
    └── contact-cta.php
```

---

## Plugin Structure

```
wine-react-blocks/
├── wine-react-blocks.php    # Main plugin file
├── package.json             # Dependencies and build scripts
├── src/                     # Source files
│   ├── wine-card/
│   │   ├── block.json
│   │   ├── edit.jsx
│   │   ├── save.jsx
│   │   ├── index.js
│   │   ├── style.scss
│   │   └── editor.scss
│   ├── experience-highlight/
│   │   └── ...
│   └── contact-cta/
│       └── ...
└── build/                   # Compiled files (generated)
```

---

## How to Use

### Setting Up Pages

1. **Create a Home Page**
   - Go to **Pages > Add New**
   - Create a page titled "Home"
   - In the Page Settings panel, select the **Home Page** template
   - The home page template includes hero, featured wines, and CTA sections

2. **Set as Front Page**
   - Go to **Settings > Reading**
   - Set "Your homepage displays" to "A static page"
   - Select your Home page

3. **Create Navigation Menu**
   - Go to **Appearance > Editor**
   - Click on the header part
   - Add/edit the Navigation block with your pages:
     - Home
     - About
     - Products (link to `/wine` archive)
     - Experience
     - Contact

### Creating Wines

1. Go to **Wines > Add New** in the WordPress admin
2. Add wine details:
   - **Title**: Wine name (e.g., "Cabernet Sauvignon Reserve")
   - **Content**: Full description of the wine
   - **Featured Image**: Upload wine bottle image
   - **Excerpt**: Short description for listings
   - **Wine Type**: Select Red, White, Rosé, or Sparkling
3. Click **Publish**

### Using Custom Blocks

The plugin adds three custom blocks under the **Wine Blocks** category:

#### 1. Wine Card Block

Displays a wine product card with image, name, type, and description.

**Fields:**
- Image (uploaded via Media Library)
- Wine Name
- Wine Type (dropdown: Red, White, Rosé, Sparkling)
- Description

**Usage:**
- Best used in grid layouts (3 columns)
- Add to Products page or home page wine grids

#### 2. Experience Highlight Block

Highlights wine experiences like tastings, tours, or events.

**Fields:**
- Icon (emoji selector)
- Title
- Description

**Usage:**
- Best used in 3-column layouts
- Perfect for the Experience page

#### 3. Contact CTA Block

Call-to-action section with headline and button.

**Fields:**
- Headline
- Button Text
- Button URL

**Usage:**
- Add to end of pages for conversion
- Supports wide and full alignment

### Using Block Patterns

Block patterns are pre-built layouts you can insert:

1. In the block editor, click the **+** button
2. Select the **Patterns** tab
3. Look for **Wine Theme Patterns** category
4. Choose a pattern:
   - **Hero Home** - Large hero section with CTA buttons
   - **Product Grid** - Grid of wines with query loop
   - **Experience Section** - Three-column experience highlights
   - **Contact CTA** - Call-to-action section

---

## Customization

### Colors

Edit colors in `theme.json`:
- Burgundy (#722F37)
- Wine Red (#8B3A3A)
- Cream (#FAF7F2)
- Off White (#F5F2ED)
- Charcoal (#2C2C2C)
- Dark Gray (#4A4A4A)
- Gold (#D4AF37)

### Typography

The theme uses:
- **Headings**: Playfair Display (serif) - can be changed to system serif
- **Body**: System sans-serif stack

To use Google Fonts, add them in `functions.php` and update `theme.json`.

### Layout Widths

Edit in `theme.json`:
- **Content width**: 1200px
- **Wide width**: 1400px

---

## Development

### Rebuilding Blocks

After making changes to block source files:

```bash
cd wp-content/plugins/wine-react-blocks
npm run build
```

### Linting and Formatting

```bash
npm run lint:js   # Check JavaScript
npm run lint:css  # Check CSS
npm run format    # Format code
```

---

## Browser Support

- Modern browsers (last 2 versions)
- Chrome, Firefox, Safari, Edge
- IE11 not supported

---

## Accessibility

This theme follows accessibility best practices:

- WCAG AA color contrast ratios
- Semantic HTML5 landmarks
- Keyboard navigation support
- Screen reader friendly
- Alt text support for all images
- Focus visible styles

---

## Support

For issues or questions:
- Check WordPress Codex for block theme documentation
- Review @wordpress/scripts documentation for build issues
- Ensure Node.js version 18+ is installed

---

## License

GPL v2 or later

---

## Credits

Built with:
- WordPress Block Editor (Gutenberg)
- @wordpress/scripts
- @wordpress/components
- React 18+
