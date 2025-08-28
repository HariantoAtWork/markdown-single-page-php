# Changelog

All notable changes to this project will be documented in this file.

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
