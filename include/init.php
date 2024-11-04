<?php

// Evitar la ejecución directa del archivo.
if (! defined('ABSPATH')) {
    exit; // Salir si se accede directamente.
}

// Verifica si el archivo ACF está disponible antes de incluirlo.
if (file_exists(__DIR__ . '/acf-fields.php')) {
    require_once __DIR__ . '/acf-fields.php';
    add_action('acf/include_fields', 'acf_spotiblog_fields');
}

// Verifica si el archivo CPT está disponible antes de incluirlo.
if (file_exists(__DIR__ . '/cpt-post.php')) {
    require_once __DIR__ . '/cpt-post.php';
    add_action('init', 'cpt_spotiblog');
}

// Verifica si el archivo Shortcode está disponible antes de incluirlo.
if (file_exists(__DIR__ . '/shortcode.php')) {
    require_once __DIR__ . '/shortcode.php';
    add_shortcode('spotify_posts_list', 'spotify_posts_list_shortcode');
}
