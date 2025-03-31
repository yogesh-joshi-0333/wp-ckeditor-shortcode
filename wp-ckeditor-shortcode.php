<?php
/**
 * Plugin Name: WP CKEditor Shortcode
 * Plugin URI: https://github.com/yogesh-joshi-0333/wp-ckeditor-shortcode
 * Description: A self-hosted CKEditor integration using shortcodes.
 * Version: 1.0.0
 * Author: Yogesh Joshi
 * Author URI: https://devyogesh.com
 * Plugin Details URI: https://devyogesh.com/wp-ckeditor-shortcode/
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-ckeditor-shortcode
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

// Hook to add an admin menu
add_action('admin_menu', 'wpck_add_admin_menu');

function wpck_add_admin_menu() {
    add_menu_page(
        'WP CKEditor Support', // Page Title
        'CKEditor Support',    // Menu Title
        'manage_options',      // Capability
        'wpck-support',        // Menu Slug
        'wpck_support_page',   // Function to display page
        'dashicons-editor-help', // Menu Icon
        99                     // Position
    );
}

function wpck_support_page() {
    ?>
    <title>WP CKEditor Plugin Support</title>
    <link rel="stylesheet" href="<?php echo plugins_url('wp-ckeditor-shortcode/assets/css/style.css'); ?>">
    <div class="container">
        <header>
            <h1>WP CKEditor Plugin Support</h1>
            <p class="subtitle">Welcome to the support and help section for WP CKEditor Shortcode Plugin.</p>
        </header>

        <section class="help-section">
            <h2>Need Help?</h2>
            <p>If you have any issues, feel free to reach out:</p>
            <div class="support-links">
                <a href="https://github.com/yogesh-joshi-0333/wp-ckeditor-shortcode" class="card" target="_blank">
                    <h3>Plugin Documentation</h3>
                    <p>View on GitHub</p>
                </a>
                <a href="https://wordpress.org/support/plugin/wp-ckeditor-shortcode" class="card" target="_blank">
                    <h3>Support Forum</h3>
                    <p>WordPress Plugin Support</p>
                </a>
                <a href="https://devyogesh.com" class="card" target="_blank">
                    <h3>Custom Development</h3>
                    <p>Hire Me for Development</p>
                </a>
            </div>
        </section>

        <section class="faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item">
                <h3>How do I use the shortcode?</h3>
                <p>Just add <code>[ckeditor]</code> in your posts or pages to display CKEditor.</p>
            </div>
            <div class="faq-item">
                <h3>Can I customize CKEditor?</h3>
                <p>Yes! Edit the <code>config.js</code> file inside the plugin folder to modify the toolbar, plugins, and other settings.</p>
            </div>
            <div class="faq-item">
                <h3>Does this plugin support all WordPress themes?</h3>
                <p>Yes, WP CKEditor Shortcode works with most WordPress themes. However, some themes may override default editor styles, so minor CSS adjustments might be needed.</p>
            </div>
            <div class="faq-item">
                <h3>Is this plugin compatible with WordPress block editor (Gutenberg)?</h3>
                <p>Yes! You can use this plugin in Classic Editor blocks inside Gutenberg.</p>
            </div>
            <div class="faq-item">
                <h3>How do I disable CKEditor for specific posts or pages?</h3>
                <p>Currently, the <code>[ckeditor]</code> shortcode is optional. If you don't use it, CKEditor won't appear.</p>
            </div>
            <div class="faq-item">
                <h3>Can I use CKEditor inside custom post types?</h3>
                <p>Yes! Just add the <code>[ckeditor]</code> shortcode in your custom post type content fields.</p>
            </div>
            <div class="faq-item">
                <h3>Does this plugin support multilingual sites?</h3>
                <p>Yes! CKEditor supports multiple languages. You can set the language in <code>config.js</code>:</p>
                <pre><code>CKEDITOR.config.language = 'fr'; // Change 'fr' to your preferred language</code></pre>
            </div>
            <div class="faq-item">
                <h3>How can I reset CKEditor settings to default?</h3>
                <p>Simply delete or rename your <code>config.js</code> file inside the plugin folder, and the plugin will load the default settings.</p>
            </div>
            <div class="faq-item">
                <h3>Where can I get support if I face issues?</h3>
                <p>You can get support via:</p>
                <ul class="support-list">
                    <li>GitHub Issues: <a href="https://github.com/yogesh-joshi-0333/wp-ckeditor-shortcode" target="_blank">Visit GitHub Repository</a></li>
                    <li>WordPress Plugin Support Forum: <a href="https://wordpress.org/support/plugin/wp-ckeditor-shortcode" target="_blank">Visit Support Forum</a></li>
                    <li>Custom Development Services: <a href="https://devyogesh.com" target="_blank">Contact for Custom Development</a></li>
                </ul>
            </div>
        </section>

        <footer>
            <p>Thank you for using WP CKEditor Shortcode Plugin!</p>
        </footer>
    </div>
    <?php
}
