<?php
/**
 * Shared helpers for the Upfront pages (/services/upfront, /book/upfront-demo).
 *
 * up_img(): every /img/upfront/ asset URL carries a content hash (?v=), so a swapped file gets
 * a new URL even though the server caches images for 30 days. ALWAYS reference product images
 * through up_img(); never hardcode /img/upfront/ paths.
 *
 * up_wordmark(): the Upfront wordmark as a retina-ready image (Marketing's rendered PNG, light
 * version; the mark is part of the image). Used instead of live text so it renders the same on
 * every OS (Gill Sans is macOS-only). Dark-background variant: upfront-wordmark-dark.png in
 * Marketing/Ad Assets (opaque navy bg, not yet needed on this light-only page).
 */
if (!function_exists('up_img')) {
    function up_img(string $file): string {
        $path = __DIR__ . '/../img/upfront/' . $file;
        $v = is_file($path) ? substr(md5_file($path), 0, 10) : '0';
        return '/img/upfront/' . $file . '?v=' . $v;
    }
}
if (!function_exists('up_wordmark')) {
    function up_wordmark(int $w = 130): string {
        $h = (int) round($w * 248 / 1034);
        return '<img class="up-wordmark-img" src="' . up_img('upfront-wordmark-280.png') . '" srcset="'
            . up_img('upfront-wordmark-280.png') . ' 1x, ' . up_img('upfront-wordmark-560.png') . ' 2x" width="'
            . $w . '" height="' . $h . '" alt="Upfront">';
    }
}
