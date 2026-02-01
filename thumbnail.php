<?php
/**
 * Thumbnail Generator
 *
 * Generates and caches resized thumbnails from full-size images.
 * Usage: thumbnail.php?src=projects/hero.png&w=800
 *
 * Thumbnails are cached in /img/cache/ with the format:
 * {hash}_{width}.jpg
 */

// Configuration
$sourceDir = __DIR__ . '/img/';
$cacheDir = __DIR__ . '/img/cache/';
$defaultWidth = 800;
$quality = 85;

// Get parameters
$src = $_GET['src'] ?? '';
$width = isset($_GET['w']) ? (int)$_GET['w'] : $defaultWidth;

// Validate width (prevent abuse)
$width = max(100, min(1920, $width));

// Sanitize source path (prevent directory traversal)
$src = str_replace(['..', "\0"], '', $src);
$sourcePath = $sourceDir . $src;

// Validate source file exists and is an image
if (empty($src) || !file_exists($sourcePath)) {
    header('HTTP/1.0 404 Not Found');
    exit('Image not found');
}

$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
$mimeType = mime_content_type($sourcePath);

if (!in_array($mimeType, $allowedTypes)) {
    header('HTTP/1.0 400 Bad Request');
    exit('Invalid image type');
}

// Create cache directory if needed
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0755, true);
}

// Generate cache filename
$cacheKey = md5($src . filemtime($sourcePath)) . "_{$width}.jpg";
$cachePath = $cacheDir . $cacheKey;

// Serve cached version if it exists
if (file_exists($cachePath)) {
    header('Content-Type: image/jpeg');
    header('Cache-Control: public, max-age=31536000');
    header('X-Thumbnail-Cache: HIT');
    readfile($cachePath);
    exit;
}

// Generate thumbnail
$sourceImage = null;

switch ($mimeType) {
    case 'image/jpeg':
        $sourceImage = imagecreatefromjpeg($sourcePath);
        break;
    case 'image/png':
        $sourceImage = imagecreatefrompng($sourcePath);
        break;
    case 'image/gif':
        $sourceImage = imagecreatefromgif($sourcePath);
        break;
    case 'image/webp':
        $sourceImage = imagecreatefromwebp($sourcePath);
        break;
}

if (!$sourceImage) {
    header('HTTP/1.0 500 Internal Server Error');
    exit('Failed to load image');
}

// Calculate dimensions
$origWidth = imagesx($sourceImage);
$origHeight = imagesy($sourceImage);

// Only resize if larger than target
if ($origWidth <= $width) {
    // Serve original if smaller than requested width
    header('Content-Type: ' . $mimeType);
    header('Cache-Control: public, max-age=31536000');
    readfile($sourcePath);
    imagedestroy($sourceImage);
    exit;
}

$ratio = $origHeight / $origWidth;
$newWidth = $width;
$newHeight = (int)($width * $ratio);

// Create resized image
$resized = imagecreatetruecolor($newWidth, $newHeight);

// Preserve transparency for PNG
if ($mimeType === 'image/png') {
    imagealphablending($resized, false);
    imagesavealpha($resized, true);
}

// Resize with high quality resampling
imagecopyresampled(
    $resized, $sourceImage,
    0, 0, 0, 0,
    $newWidth, $newHeight,
    $origWidth, $origHeight
);

// Save to cache as JPEG
imagejpeg($resized, $cachePath, $quality);

// Output
header('Content-Type: image/jpeg');
header('Cache-Control: public, max-age=31536000');
header('X-Thumbnail-Cache: MISS');
imagejpeg($resized, null, $quality);

// Cleanup
imagedestroy($sourceImage);
imagedestroy($resized);
