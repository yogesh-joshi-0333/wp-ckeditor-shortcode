<?php
/*
Plugin Name: WP CKEditor Shortcode
Plugin URI: https://devyogesh.com/wp-ckeditor-shortcode/
Description: A WordPress plugin that enables self hosted CKEditor inside textareas using a shortcode.
Version: 1.0
Author: Yogesh Joshi
Author URI: https://devyogesh.com/
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Enqueue CKEditor
function ckeditor_shortcode_scripts() {
    wp_enqueue_script('ckeditor-js', plugins_url('ckeditor/ckeditor.js', __FILE__), array(), null, true);
    wp_enqueue_script('ckeditor-init', plugins_url('ckeditor-init.js', __FILE__), array('ckeditor-js'), null, true);
}
add_action('wp_enqueue_scripts', 'ckeditor_shortcode_scripts');

// Register Shortcode [ckeditor]
function ckeditor_textarea_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'class'  => '',  // Allow user-defined classes
            'id'     => 'editor-' . rand(1000, 9999), // Unique ID
            'height' => '300px',
            'width'  => '100%',
            'styles' => '', // Custom inline styles
            'text' => '',
        ),
        $atts,
        'ckeditor'
    );

    // Combine all styles dynamically
    $inline_styles = 'width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';';
    if (!empty($atts['styles'])) {
        $inline_styles .= esc_attr($atts['styles']) . ';'; // Append user-defined styles
    }

    return '<textarea data-ckeditor="true" id="' . esc_attr($atts['id']) . '" class="' . esc_attr($atts['class']) . '" style="' . $inline_styles . '">'.esc_attr($atts['text']).'</textarea>';
}
add_shortcode('ckeditor', 'ckeditor_textarea_shortcode');