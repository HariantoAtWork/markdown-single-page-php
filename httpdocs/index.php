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
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
    <div id="app">
        <button class="mobile-toggle" @click="toggleSidebar">
            {{ sidebarOpen ? '✕' : '☰' }} Menu
        </button>
        
        <aside class="sidebar" :class="{ open: sidebarOpen }">
            <div class="sidebar-title">On this page</div>
            <ul class="sidebar-nav">
                <li v-for="header in headers" :key="header.id">
                    <a 
                        :href="'#' + header.id" 
                        :class="['h' + header.level, { active: activeHeader === header.id }]"
                        @click="scrollToHeader(header.id)"
                    >
                        {{ header.text }}
                    </a>
                </li>
            </ul>
        </aside>
        
        <main class="main-content">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </main>
    </div>

    <script src="app.js"></script>
</body>
</html>


