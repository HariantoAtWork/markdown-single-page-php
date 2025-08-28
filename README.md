# Markdown PHP Converter

A simple, elegant markdown-to-HTML converter that allows you to write content in markdown format and automatically converts it to a beautiful HTML page.

## Features

- ✨ **Simple Setup**: Just write in `index.md` and view the result
- 🎨 **Modern Design**: Clean, responsive layout with beautiful typography
- 🔒 **Secure**: Uses Parsedown with safe mode enabled
- 📱 **Responsive**: Works perfectly on desktop, tablet, and mobile
- 🏷️ **Dynamic Titles**: Page title automatically extracted from first heading
- ⚡ **Fast**: Lightweight and efficient

## Requirements

- PHP 7.4 or higher
- Composer (for dependency management)
- Web server (Apache or Nginx)

## Quick Start

1. **Clone or download** this project
2. **Install dependencies**:
   ```bash
   cd httpdocs
   composer install
   ```
3. **Edit content** in `index.md`
4. **View the result** by visiting the page in your browser

## Installation

### Option 1: Apache Setup

#### Method A: Document Root (Recommended)
1. Copy the entire project to your Apache document root:
   ```bash
   sudo cp -r /path/to/markdown-php /var/www/html/
   ```

2. Set proper permissions:
   ```bash
   sudo chown -R www-data:www-data /var/www/html/markdown-php
   sudo chmod -R 755 /var/www/html/markdown-php
   ```

3. Install dependencies:
   ```bash
   cd /var/www/html/markdown-php/httpdocs
   composer install
   ```

4. Access via: `http://your-domain.com/markdown-php/httpdocs/`

#### Method B: Virtual Host
1. Create a virtual host configuration:
   ```apache
   <VirtualHost *:80>
       ServerName markdown.yourdomain.com
       DocumentRoot /var/www/html/markdown-php/httpdocs
       
       <Directory /var/www/html/markdown-php/httpdocs>
           AllowOverride All
           Require all granted
       </Directory>
       
       ErrorLog ${APACHE_LOG_DIR}/markdown_error.log
       CustomLog ${APACHE_LOG_DIR}/markdown_access.log combined
   </VirtualHost>
   ```

2. Enable the site and restart Apache:
   ```bash
   sudo a2ensite markdown.conf
   sudo systemctl restart apache2
   ```

### Option 2: Nginx Setup

#### Method A: Document Root
1. Copy the project to your Nginx document root:
   ```bash
   sudo cp -r /path/to/markdown-php /var/www/html/
   ```

2. Set proper permissions:
   ```bash
   sudo chown -R www-data:www-data /var/www/html/markdown-php
   sudo chmod -R 755 /var/www/html/markdown-php
   ```

3. Install dependencies:
   ```bash
   cd /var/www/html/markdown-php/httpdocs
   composer install
   ```

4. Access via: `http://your-domain.com/markdown-php/httpdocs/`

#### Method B: Server Block (Recommended)
1. Create a server block configuration:
   ```nginx
   server {
       listen 80;
       server_name markdown.yourdomain.com;
       root /var/www/html/markdown-php/httpdocs;
       index index.php index.html;
       
       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }
       
       location ~ \.php$ {
           include snippets/fastcgi-php.conf;
           fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
       }
       
       location ~ /\.ht {
           deny all;
       }
   }
   ```

2. Enable the site and restart Nginx:
   ```bash
   sudo ln -s /etc/nginx/sites-available/markdown /etc/nginx/sites-enabled/
   sudo nginx -t
   sudo systemctl restart nginx
   ```

## Usage

### Writing Content
1. Edit the `index.md` file in the `httpdocs` directory
2. Use standard markdown syntax:
   ```markdown
   # Your Page Title
   
   ## Section Heading
   
   This is **bold** and *italic* text.
   
   - List item 1
   - List item 2
   
   ![Image Alt](https://example.com/image.jpg)
   
   [Link Text](https://example.com)
   ```

### Page Title
- The page title is automatically extracted from the first `#` heading
- If no heading is found, it defaults to "Markdown to HTML Converter"

### Supported Markdown Features
- Headers (H1, H2, H3, etc.)
- Bold and italic text
- Links and images
- Code blocks and inline code
- Lists (ordered and unordered)
- Blockquotes
- Horizontal rules
- Tables
- And more...

## File Structure

```
markdown-php/
├── httpdocs/
│   ├── index.md          # Your markdown content
│   ├── index.php         # PHP converter script
│   ├── composer.json     # Composer dependencies
│   ├── composer.lock     # Locked versions
│   └── vendor/           # Composer packages
├── README.md             # This file
└── CHANGELOG.md          # Project changelog
```

## Security Considerations

- The application uses Parsedown's safe mode to prevent XSS attacks
- All user content is properly escaped
- No database or file upload functionality (read-only markdown)

## Troubleshooting

### Common Issues

**Composer not found:**
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

**Permission denied:**
```bash
sudo chown -R www-data:www-data /path/to/markdown-php
sudo chmod -R 755 /path/to/markdown-php
```

**PHP not working:**
- Ensure PHP is installed and configured
- Check that the PHP-FPM service is running (for Nginx)
- Verify that the `mod_php` module is enabled (for Apache)

### Logs
- **Apache**: `/var/log/apache2/error.log`
- **Nginx**: `/var/log/nginx/error.log`
- **PHP**: `/var/log/php8.1-fpm.log` (or similar)

## Development

### Adding Features
1. Edit `index.php` to add new functionality
2. Update `CHANGELOG.md` with your changes
3. Test thoroughly before deployment

### Styling
The CSS is embedded in `index.php`. To modify the design:
1. Locate the `<style>` section in `index.php`
2. Modify the CSS rules as needed
3. Consider moving to a separate CSS file for larger projects

## License

This project is open source and available under the MIT License.

## Support

For issues or questions:
1. Check the troubleshooting section above
2. Review the CHANGELOG.md for recent changes
3. Ensure all dependencies are properly installed
