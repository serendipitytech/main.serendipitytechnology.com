<?php
/**
 * Projects Helper
 *
 * Parses markdown files with YAML frontmatter from /projects/ directory.
 * Used by index.php and project.php to render project cards and details.
 */

/**
 * Parse a markdown file with YAML frontmatter
 * Returns ['meta' => [...], 'content' => '...']
 */
function parseProjectFile($filepath) {
    if (!file_exists($filepath)) {
        return null;
    }

    $raw = file_get_contents($filepath);

    // Check for frontmatter (starts with ---)
    if (strpos($raw, '---') !== 0) {
        return ['meta' => [], 'content' => $raw];
    }

    // Split frontmatter from content
    $parts = preg_split('/^---$/m', $raw, 3);

    if (count($parts) < 3) {
        return ['meta' => [], 'content' => $raw];
    }

    $frontmatter = trim($parts[1]);
    $content = trim($parts[2]);

    // Parse YAML frontmatter (simple parser, no library needed)
    $meta = parseSimpleYaml($frontmatter);

    return [
        'meta' => $meta,
        'content' => $content
    ];
}

/**
 * Simple YAML parser for frontmatter
 * Handles: strings, booleans, numbers, simple arrays, multiline strings
 */
function parseSimpleYaml($yaml) {
    $result = [];
    $lines = explode("\n", $yaml);
    $currentKey = null;
    $currentArray = null;
    $multilineValue = null;

    foreach ($lines as $line) {
        // Skip empty lines unless in multiline mode
        if (trim($line) === '' && $multilineValue === null) {
            continue;
        }

        // Handle multiline string continuation (for summary: > style)
        if ($multilineValue !== null) {
            if (preg_match('/^  (.+)$/', $line, $m)) {
                $result[$multilineValue] .= ' ' . trim($m[1]);
                continue;
            } else {
                $result[$multilineValue] = trim($result[$multilineValue]);
                $multilineValue = null;
            }
        }

        // Handle array items (- value)
        if ($currentArray !== null && preg_match('/^  - (.+)$/', $line, $m)) {
            $result[$currentArray][] = trim($m[1]);
            continue;
        } elseif ($currentArray !== null && !preg_match('/^  -/', $line)) {
            $currentArray = null;
        }

        // Handle key: value pairs
        if (preg_match('/^([a-z_-]+):\s*(.*)$/i', $line, $m)) {
            $key = trim($m[1]);
            $value = trim($m[2]);

            // Multiline string indicator
            if ($value === '>') {
                $result[$key] = '';
                $multilineValue = $key;
                continue;
            }

            // Array start (empty value, items follow)
            if ($value === '') {
                $result[$key] = [];
                $currentArray = $key;
                continue;
            }

            // Inline array [item1, item2]
            if (preg_match('/^\[(.+)\]$/', $value, $arrMatch)) {
                $items = array_map('trim', explode(',', $arrMatch[1]));
                $result[$key] = $items;
                continue;
            }

            // Boolean
            if ($value === 'true') {
                $result[$key] = true;
                continue;
            }
            if ($value === 'false') {
                $result[$key] = false;
                continue;
            }

            // Number
            if (is_numeric($value)) {
                $result[$key] = strpos($value, '.') !== false ? (float)$value : (int)$value;
                continue;
            }

            // String (remove quotes if present)
            $result[$key] = trim($value, '"\'');
        }
    }

    return $result;
}

/**
 * Get all projects, sorted by order
 * Excludes files starting with _ (like _template.md)
 */
function getAllProjects($projectsDir = null) {
    if ($projectsDir === null) {
        $projectsDir = __DIR__ . '/projects';
    }

    $projects = [];
    $files = glob($projectsDir . '/*.md');

    foreach ($files as $file) {
        $filename = basename($file);

        // Skip template and hidden files
        if (strpos($filename, '_') === 0) {
            continue;
        }

        $parsed = parseProjectFile($file);
        if ($parsed && !empty($parsed['meta'])) {
            $parsed['meta']['filename'] = $filename;
            $parsed['meta']['slug'] = $parsed['meta']['slug'] ?? basename($filename, '.md');
            $projects[] = $parsed;
        }
    }

    // Sort by order field
    usort($projects, function($a, $b) {
        $orderA = $a['meta']['order'] ?? 999;
        $orderB = $b['meta']['order'] ?? 999;
        return $orderA - $orderB;
    });

    return $projects;
}

/**
 * Get featured projects only
 */
function getFeaturedProjects($projectsDir = null) {
    $all = getAllProjects($projectsDir);
    return array_filter($all, function($p) {
        return !empty($p['meta']['featured']);
    });
}

/**
 * Get non-featured projects only
 */
function getGridProjects($projectsDir = null) {
    $all = getAllProjects($projectsDir);
    return array_filter($all, function($p) {
        return empty($p['meta']['featured']);
    });
}

/**
 * Get a single project by slug
 */
function getProjectBySlug($slug, $projectsDir = null) {
    if ($projectsDir === null) {
        $projectsDir = __DIR__ . '/projects';
    }

    // Sanitize slug to prevent directory traversal
    $slug = preg_replace('/[^a-z0-9\-]/', '', strtolower($slug));

    $filepath = $projectsDir . '/' . $slug . '.md';
    return parseProjectFile($filepath);
}

/**
 * Get image orientation (landscape, portrait, or square)
 * Returns: 'landscape', 'portrait', or 'square'
 */
function getImageOrientation($imagePath) {
    if (!file_exists($imagePath)) {
        return 'landscape'; // default
    }

    $size = getimagesize($imagePath);
    if (!$size) {
        return 'landscape';
    }

    $width = $size[0];
    $height = $size[1];
    $ratio = $height / $width;

    if ($ratio > 1.2) {
        return 'portrait';  // Mobile screenshots (taller than wide)
    } elseif ($ratio < 0.8) {
        return 'landscape'; // Desktop screenshots (wider than tall)
    } else {
        return 'square';
    }
}

/**
 * Convert markdown to HTML (simple version)
 * For more complex needs, consider a library like Parsedown
 */
function markdownToHtml($markdown) {
    $html = $markdown;

    // Headers
    $html = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $html);
    $html = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $html);
    $html = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $html);

    // Bold
    $html = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $html);

    // Italic
    $html = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $html);

    // Inline code
    $html = preg_replace('/`(.+?)`/', '<code>$1</code>', $html);

    // Unordered lists
    $html = preg_replace('/^- (.+)$/m', '<li>$1</li>', $html);
    $html = preg_replace('/(<li>.*<\/li>\n?)+/s', '<ul>$0</ul>', $html);

    // Paragraphs (double newlines)
    $html = preg_replace('/\n\n+/', '</p><p>', $html);
    $html = '<p>' . $html . '</p>';

    // Clean up empty paragraphs and fix list wrapping
    $html = preg_replace('/<p>\s*<\/p>/', '', $html);
    $html = preg_replace('/<p>\s*(<[uh][l1-6]>)/', '$1', $html);
    $html = preg_replace('/(<\/[uh][l1-6]>)\s*<\/p>/', '$1', $html);

    // HTML comments (remove TODO comments)
    $html = preg_replace('/<!--.*?-->/s', '', $html);

    return $html;
}
