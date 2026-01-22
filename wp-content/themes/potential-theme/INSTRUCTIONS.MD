# Custom WordPress Block Theme + React Blocks — Wine Brand Website

You are an expert WordPress developer with strong Gutenberg + React experience.

Create:

1. A **custom WordPress block theme**
2. A **custom block plugin** with React-based Gutenberg blocks

This is a **content website**, NOT ecommerce.  
❌ Do NOT use WooCommerce.

---

# 🎯 Project Goals

Build a modern wine brand website using:

- Full Site Editing (FSE)
- Core blocks + **custom React blocks**
- Reusable patterns
- Clean architecture
- Accessibility-first design

Pages:
- Home
- About
- Products
- Experience
- Contact

---

# 🗂️ Architecture

## Theme
wp-content/themes/wine-block-theme/
├── style.css
├── theme.json
├── functions.php
├── templates/
│ ├── home.html
│ ├── page.html
│ ├── single-wine.html
│ └── 404.html
├── parts/
│ ├── header.html
│ └── footer.html
├── patterns/
│ ├── hero-home.php
│ ├── product-grid.php
│ ├── experience-section.php
│ └── contact-cta.php


## Custom Blocks Plugin
wp-content/plugins/wine-react-blocks/
├── wine-react-blocks.php
├── package.json
├── src/
│ ├── wine-card/
│ │ ├── block.json
│ │ ├── edit.jsx
│ │ ├── save.jsx
│ │ └── index.js
│ ├── experience-highlight/
│ │ ├── block.json
│ │ ├── edit.jsx
│ │ ├── save.jsx
│ │ └── index.js
│ └── contact-cta/
│ ├── block.json
│ ├── edit.jsx
│ ├── save.jsx
│ └── index.js
└── build/


Use `@wordpress/scripts` for the build system.

---

# 🎨 theme.json Requirements

Configure:

- Fonts  
  - Headings: serif  
  - Body: sans-serif  

- Colors  
  - Wine red / burgundy  
  - Cream  
  - Charcoal  
  - Gold accent  

- Layout  
  - contentSize: 1200px  
  - wideSize: 1400px  

- Presets  
  - spacing  
  - typography scale  
  - buttons  
  - links hover styles  

---

# 🧩 React Gutenberg Blocks

Create **three custom blocks** using React.

---

## 1. Wine Card Block

### Purpose  
Display a wine product card.

### Fields
- Image
- Wine name
- Wine type (select)
- Short description

### Editor
- MediaUpload for image
- TextControl for name
- SelectControl for type
- TextareaControl for description

### Frontend Output
Semantic markup:
```html
<article class="wine-card">
  <img />
  <h3></h3>
  <span class="wine-type"></span>
  <p></p>
</article>
2. Experience Highlight Block
Purpose

Highlight tastings, tours, or events.

Fields

Icon (Dashicon selector or emoji)

Title

Description

3. Contact CTA Block
Purpose

Reusable call-to-action.

Fields

Headline

Button text

Button link

🧱 Block Patterns (Theme)

Use a mix of core blocks + custom React blocks.

Home

Hero pattern

Wine Card block grid

Experience Highlight

Contact CTA

About

Story section

Timeline section

Image gallery

Products

Query Loop of Wine CPT

Wine Card block inside loop

Experience

Experience Highlight blocks

Reservation info section

Contact

Core form blocks

Contact CTA block

🧠 Custom Post Type

Register CPT:

Name: Wine

Slug: wine

Supports:

title

editor

featured image

excerpt

Taxonomy:

wine_type

Red

White

Rosé

Sparkling

🧱 Templates
home.html

Hero

Wine grid

Experience preview

CTA

single-wine.html

Featured image

Title

Taxonomy term

Content

Back link to Products

⚙️ functions.php

Implement:

Register CPT + taxonomy

Register block patterns

Enqueue theme styles

Disable unused core patterns if needed

⚛️ React Block Technical Rules

Use:

@wordpress/blocks

@wordpress/block-editor

@wordpress/components

@wordpress/i18n

No external UI frameworks

JSX required

Each block must:

Use block.json

Support align, anchor

Be translatable

Follow accessibility rules

♿ Accessibility

Images require alt text

Buttons keyboard accessible

WCAG AA contrast

Proper landmarks:

header

main

footer

🚀 Deliverables

Provide:

Full theme

Full block plugin

Build instructions:

npm install
npm run build


README:

How to install theme

How to activate plugin

How to add wines

How to use custom blocks

❌ Do NOT

No WooCommerce

No payments

No page builders

No external CSS frameworks

No jQuery