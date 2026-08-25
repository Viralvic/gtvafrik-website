<?php
if (!defined('ABSPATH')) exit;

function gtvafrik_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 90,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('html5', ['search-form','gallery','caption','style','script']);
    register_nav_menus([
        'primary' => __('Primary Menu', 'gtvafrik'),
        'footer' => __('Footer Menu', 'gtvafrik'),
    ]);
}
add_action('after_setup_theme', 'gtvafrik_setup');

function gtvafrik_assets() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('gtvafrik-fonts', 'https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap', [], null);
    wp_enqueue_style('gtvafrik-theme', get_template_directory_uri() . '/assets/css/theme.css', [], $version);
    wp_enqueue_script('gtvafrik-theme', get_template_directory_uri() . '/assets/js/theme.js', [], $version, true);
}
add_action('wp_enqueue_scripts', 'gtvafrik_assets');

function gtvafrik_reading_time($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $content = wp_strip_all_tags(get_post_field('post_content', $post_id));
    $words = str_word_count($content);
    return max(1, (int) ceil($words / 220));
}

function gtvafrik_primary_category($post_id = null) {
    $categories = get_the_category($post_id ?: get_the_ID());
    return !empty($categories) ? $categories[0] : null;
}

function gtvafrik_excerpt($length = 22) {
    return wp_trim_words(get_the_excerpt(), $length, '…');
}

function gtvafrik_posts_page_url() {
    $page_id = (int) get_option('page_for_posts');
    return $page_id ? get_permalink($page_id) : home_url('/newsroom/');
}
