# CFP Elementor Theme

A custom WordPress theme for the Chess Federation of Pakistan (CFP) with full Elementor Pro integration.

## 🎯 Overview

This theme converts your custom frontend design into a fully functional WordPress theme that integrates seamlessly with:

- **Elementor Pro** - For page building and dynamic content
- **Popup Maker** - For popup functionality
- **WordPress Core** - For content management

## 🚀 Features

### ✅ Dynamic Content Integration

- **Logos** → `elementor-widget-theme-site-logo`
- **Menus** → `elementor-widget-nav-menu`
- **Headings** → `elementor-widget-heading`
- **Text Blocks** → `elementor-widget-text-editor`
- **Buttons** → `elementor-widget-button`
- **Lists** → `elementor-widget-icon-list`
- **Forms** → `elementor-widget-form` (Elementor Pro)
- **Popups** → Popup Maker / Elementor popup system
- **Sliders** → Swiper-based Elementor background slideshow

### ✅ Preserved Design Elements

- All CSS animations and transitions
- JavaScript interactivity
- Responsive design
- Custom styling and effects
- FIDE 100th Anniversary popup

### ✅ WordPress Integration

- Proper theme structure (header.php, footer.php, index.php, style.css)
- WordPress hooks and filters
- Customizer integration
- Widget areas
- Custom post types for team members

## 📁 Theme Structure

```
wp-content/themes/cfp-elementor-theme/
├── style.css                 # Main theme stylesheet with header
├── functions.php             # Theme functions and hooks
├── header.php                # Header template
├── footer.php                # Footer template
├── index.php                 # Main template file
├── page-contact.php          # Contact page template
├── page-gallery.php          # Gallery page template
├── page-team.php             # Team page template
├── README.md                 # This file
└── assets/
    ├── css/
    │   └── styles.css        # Main CSS file
    ├── js/
    │   └── main.js           # Main JavaScript file
    └── images/               # Theme images (copy from original)
```

## 🛠️ Installation

1. **Upload Theme Files**

   ```bash
   # Copy the theme folder to your WordPress themes directory
   cp -r wp-content/themes/cfp-elementor-theme/ /path/to/wordpress/wp-content/themes/
   ```

2. **Copy Assets**

   ```bash
   # Copy your existing images to the theme assets directory
   cp -r images/* wp-content/themes/cfp-elementor-theme/assets/images/
   ```

3. **Activate Theme**

   - Go to WordPress Admin → Appearance → Themes
   - Activate "CFP Elementor Theme"

4. **Install Required Plugins**
   - Elementor (Free)
   - Elementor Pro
   - Popup Maker

## ⚙️ Configuration

### 1. Site Settings

- **Site Title**: "Chess Federation of Pakistan (CFP)"
- **Tagline**: "Empowering Minds, Shaping Futures"
- **Logo**: Upload via Customizer → Site Identity

### 2. Navigation Menus

- **Primary Menu**: Main navigation
- **Footer Menu**: Footer links

### 3. Customizer Settings

- **CFP Settings** section for hero content
- Hero title, subtitle, and description

### 4. Elementor Integration

- Create pages using Elementor
- Use Elementor widgets for dynamic content
- Forms will automatically integrate with Elementor Pro

## 🎨 Customization

### CSS Variables

The theme uses CSS custom properties for easy customization:

```css
:root {
  --primary-color: #2a5e41; /* Deep Green */
  --secondary-color: #55a374; /* Light Green */
  --accent-color: #d4af37; /* Gold/Chess Accent */
  --text-dark: #333333; /* Dark Gray */
  --text-light: #666666; /* Medium Gray */
  --white: #ffffff; /* White */
  --light-gray: #f5f5f5; /* Light Gray */
  --warm-bg: #f4f1ea; /* Soft Beige/Sand */
}
```

### Custom Post Types

- **Team Members**: Add team members with positions and emails
- **Custom Fields**: Position and email for team members

### Widget Areas

- **Footer Widget Area**: Add widgets to footer

## 🔧 Elementor Integration

### Widget Mapping

Your hardcoded elements are now mapped to Elementor widgets:

| Original Element | Elementor Widget     | Admin Control              |
| ---------------- | -------------------- | -------------------------- |
| Logo             | Theme Site Logo      | Customizer → Site Identity |
| Navigation       | Nav Menu             | Appearance → Menus         |
| Headings         | Heading              | Elementor Editor           |
| Text Content     | Text Editor          | Elementor Editor           |
| Buttons          | Button               | Elementor Editor           |
| Icon Lists       | Icon List            | Elementor Editor           |
| Forms            | Form (Pro)           | Elementor Editor           |
| Popups           | Popup Maker          | Popup Maker → Popups       |
| Sliders          | Background Slideshow | Elementor Editor           |

### Form Integration

- Contact forms use Elementor Pro Form widget
- Newsletter form with AJAX submission
- Form validation and error handling

### Popup Integration

- FIDE 100th Anniversary popup preserved
- Popup Maker integration for additional popups
- Elementor popup system support

## 📱 Responsive Design

The theme maintains full responsive functionality:

- Mobile navigation with hamburger menu
- Responsive grid layouts
- Touch-friendly interactions
- Optimized for all screen sizes

## 🚀 Performance Features

- **Optimized CSS/JS loading**
- **Lazy loading for images**
- **Throttled scroll events**
- **Intersection Observer for animations**
- **Elementor performance optimizations**

## 🔒 Security Features

- **Nonce verification** for forms
- **Input sanitization** and validation
- **WordPress security best practices**
- **XSS protection**

## 📋 Admin Dashboard Integration

### Content Management

- **Pages**: Create and edit pages with Elementor
- **Team Members**: Add/edit team members with custom fields
- **Media**: Upload images via WordPress Media Library
- **Menus**: Manage navigation menus

### Elementor Editor

- **Drag & Drop**: Build pages visually
- **Widget Library**: Access all Elementor widgets
- **Responsive Controls**: Edit for different screen sizes
- **History**: Undo/redo changes

### Popup Maker

- **Popup Builder**: Create and edit popups
- **Triggers**: Set when popups appear
- **Targeting**: Control who sees popups
- **Analytics**: Track popup performance

## 🐛 Troubleshooting

### Common Issues

1. **Images Not Loading**

   - Ensure images are copied to `assets/images/`
   - Check file permissions
   - Verify image paths in templates

2. **Elementor Not Working**

   - Install and activate Elementor plugin
   - Check Elementor Pro license
   - Clear cache if using caching plugins

3. **Forms Not Submitting**

   - Verify Elementor Pro is active
   - Check form configuration in Elementor
   - Test AJAX functionality

4. **Styling Issues**
   - Clear browser cache
   - Check CSS file paths
   - Verify theme activation

### Debug Mode

Enable WordPress debug mode for troubleshooting:

```php
// In wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

## 🔄 Updates

### Theme Updates

- Backup your customizations before updating
- Test updates on staging site first
- Check compatibility with Elementor updates

### Elementor Updates

- Keep Elementor and Elementor Pro updated
- Test customizations after updates
- Check for deprecated features

## 📞 Support

For theme support:

1. Check this README first
2. Review WordPress documentation
3. Check Elementor documentation
4. Contact theme developer

## 📄 License

This theme is custom-built for the Chess Federation of Pakistan.
All rights reserved.

## 🎯 Next Steps

1. **Upload and activate** the theme
2. **Install required plugins** (Elementor, Elementor Pro, Popup Maker)
3. **Configure site settings** in WordPress admin
4. **Create pages** using Elementor
5. **Add content** through the admin dashboard
6. **Test functionality** on different devices
7. **Optimize performance** as needed

---

**Theme Version**: 1.0.0  
**WordPress Compatibility**: 5.0+  
**Elementor Compatibility**: 3.0+  
**PHP Version**: 7.4+
