# Changelog

All notable changes to this project will be documented in this file.

## [2.2.0] - 2025-08-28T16:02:48+0200

### Changed
- Separated JavaScript into external `app.js` file for better maintainability
- Cleaned up PHP file by removing inline JavaScript
- Improved code organization with complete separation of concerns (HTML/PHP, CSS, JS)

## [2.1.0] - 2025-08-28T15:57:34+0200

### Changed
- Separated CSS into external `styles.css` file for better maintainability
- Cleaned up PHP file by removing inline styles
- Improved code organization and separation of concerns

## [2.0.0] - 2025-08-28T15:43:24+0200

### Added
- Vue.js 3 integration for interactive sidebar navigation
- "On this page" sidebar that automatically detects and lists all headers
- Scroll spy functionality that highlights the current section
- Responsive mobile sidebar with hamburger menu
- Smooth scrolling to sections when clicking sidebar links
- Hierarchical indentation for different header levels (H1, H2, H3, etc.)
- Mobile-friendly design with collapsible sidebar

### Changed
- Complete redesign with sidebar layout similar to Vue documentation
- Improved responsive design for mobile devices
- Enhanced user experience with interactive navigation

## [1.2.0] - 2025-08-28T15:28:39+0200

### Added
- Comprehensive README.md with installation instructions for Apache and Nginx
- Detailed troubleshooting guide
- Security considerations documentation
- Development guidelines

### Fixed
- CSS styling for images to prevent overflow issues
- Added proper responsive image handling

## [1.1.0] - 2025-08-28T15:12:35+0200

### Changed
- Replaced basic regex-based markdown parser with Parsedown library
- Added Composer dependency management
- Improved markdown parsing accuracy and reliability
- Added security with Parsedown's safe mode

## [1.0.0] - 2025-08-28T13:48:41+0200

### Added
- Initial project setup with markdown-to-HTML converter
- `index.md` file for writing content in markdown format
- `index.php` file that converts markdown to HTML with modern styling
- Dynamic page title extraction from first markdown heading
- Responsive design with clean, modern CSS styling
- Support for common markdown features:
  - Headers (H1, H2, H3)
  - Bold and italic text
  - Links and images
  - Code blocks and inline code
  - Lists
  - Horizontal rules
  - Paragraphs

### Features
- Automatic conversion of markdown content to HTML
- Page title dynamically extracted from first H1 heading in markdown
- Fallback to default title if no H1 heading is found
- Clean, responsive design with modern typography
- Syntax highlighting for code blocks
