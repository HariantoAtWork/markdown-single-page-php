<?php
// Require Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Use Parsedown for markdown parsing
use Parsedown;

function markdownToHtml($markdown) {
    $parsedown = new Parsedown();
    $parsedown->setSafeMode(true); // Enable safe mode for security
    return $parsedown->text($markdown);
}

// Read the markdown file
$markdownFile = __DIR__ . '/index.md';
$markdown = '';

if (file_exists($markdownFile)) {
    $markdown = file_get_contents($markdownFile);
} else {
    $markdown = '# Error: index.md not found';
}

// Extract page title from first line
$lines = explode("\n", $markdown);
$pageTitle = 'Markdown to HTML Converter'; // Default title

if (!empty($lines[0])) {
    $firstLine = trim($lines[0]);
    if (preg_match('/^# (.+)$/', $firstLine, $matches)) {
        $pageTitle = $matches[1];
    }
}

// Convert markdown to HTML
$content = markdownToHtml($markdown);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #34495e;
            margin-top: 30px;
        }
        
        h3 {
            color: #7f8c8d;
        }
        
        a {
            color: #3498db;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        code {
            background-color: #f4f4f4;
            padding: 2px 4px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        
        pre {
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            border-left: 4px solid #3498db;
        }
        
        pre code {
            background: none;
            padding: 0;
        }
        
        ul {
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 5px;
        }
        
        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: block;
            margin: 20px 0;
        }
        
        hr {
            border: none;
            border-top: 2px solid #ecf0f1;
            margin: 30px 0;
        }
        
        p {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>


