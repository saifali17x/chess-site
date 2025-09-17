<?php
/**
 * CFP Elementor Theme Functions
 * 
 * @package CFP_Elementor_Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup and support
 */
function cfp_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for Elementor
    add_theme_support('elementor');
    add_theme_support('elementor-pro');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cfp-elementor-theme'),
        'footer' => __('Footer Menu', 'cfp-elementor-theme'),
    ));
}
add_action('after_setup_theme', 'cfp_theme_setup');

/**
 * Enqueue scripts and styles
 */
function cfp_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('cfp-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom CSS
    wp_enqueue_style('cfp-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('cfp-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('cfp-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('cfp-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('cfp-main-js', 'cfp_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cfp_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'cfp_enqueue_scripts');

/**
 * Register widget areas
 */
function cfp_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'cfp-elementor-theme'),
        'id' => 'footer-widget-area',
        'description' => __('Add widgets here to appear in the footer.', 'cfp-elementor-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'cfp_widgets_init');

/**
 * Custom image sizes
 */
function cfp_image_sizes() {
    add_image_size('cfp-hero', 1200, 600, true);
    add_image_size('cfp-gallery', 400, 300, true);
    add_image_size('cfp-team', 300, 400, true);
    add_image_size('cfp-logo', 200, 100, false);
}
add_action('after_setup_theme', 'cfp_image_sizes');

/**
 * Elementor compatibility
 */
function cfp_elementor_support() {
    // Add support for Elementor Pro features
    add_theme_support('elementor-pro');
    
    // Disable default Elementor fonts
    update_option('elementor_disable_color_schemes', 'yes');
    update_option('elementor_disable_typography_schemes', 'yes');
}
add_action('after_setup_theme', 'cfp_elementor_support');

/**
 * Customizer additions
 */
function cfp_customize_register($wp_customize) {
    // Add section for CFP settings
    $wp_customize->add_section('cfp_settings', array(
        'title' => __('CFP Settings', 'cfp-elementor-theme'),
        'priority' => 30,
    ));
    
    // Hero section settings
    $wp_customize->add_setting('cfp_hero_title', array(
        'default' => 'Empowering Minds, Shaping Futures',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cfp_hero_title', array(
        'label' => __('Hero Title', 'cfp-elementor-theme'),
        'section' => 'cfp_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('cfp_hero_subtitle', array(
        'default' => 'National Mind Sports Initiative for Schools',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cfp_hero_subtitle', array(
        'label' => __('Hero Subtitle', 'cfp-elementor-theme'),
        'section' => 'cfp_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('cfp_hero_description', array(
        'default' => 'Be a member of our chess club and participate in online tournaments with players from all over the world.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('cfp_hero_description', array(
        'label' => __('Hero Description', 'cfp-elementor-theme'),
        'section' => 'cfp_settings',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'cfp_customize_register');

/**
 * AJAX handler for newsletter form
 */
function cfp_newsletter_submit() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'cfp_nonce')) {
        wp_die('Security check failed');
    }
    
    $email = sanitize_email($_POST['email']);
    
    if (!is_email($email)) {
        wp_send_json_error('Invalid email address');
    }
    
    // Here you would typically save to database or send to email service
    // For now, we'll just return success
    wp_send_json_success('Thank you for subscribing!');
}
add_action('wp_ajax_cfp_newsletter_submit', 'cfp_newsletter_submit');
add_action('wp_ajax_nopriv_cfp_newsletter_submit', 'cfp_newsletter_submit');

/**
 * Add custom body classes
 */
function cfp_body_classes($classes) {
    // Add class for admin bar
    if (is_admin_bar_showing()) {
        $classes[] = 'admin-bar';
    }
    
    // Add class for Elementor
    if (class_exists('Elementor\Plugin')) {
        $classes[] = 'elementor-active';
    }
    
    return $classes;
}
add_filter('body_class', 'cfp_body_classes');

/**
 * Custom excerpt length
 */
function cfp_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cfp_excerpt_length');

/**
 * Custom excerpt more
 */
function cfp_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cfp_excerpt_more');

/**
 * Fallback menu for primary navigation
 */
function cfp_fallback_menu() {
    echo '<ul class="nav-list">';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/')) . '" class="nav-link">' . __('Home', 'cfp-elementor-theme') . '</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/#about')) . '" class="nav-link">' . __('About', 'cfp-elementor-theme') . '</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/#championship')) . '" class="nav-link">' . __('Championship', 'cfp-elementor-theme') . '</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/#results')) . '" class="nav-link">' . __('Results', 'cfp-elementor-theme') . '</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/team')) . '" class="nav-link">' . __('Our Team', 'cfp-elementor-theme') . '</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/gallery')) . '" class="nav-link">' . __('Gallery', 'cfp-elementor-theme') . '</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '" class="nav-link">' . __('Contact', 'cfp-elementor-theme') . '</a></li>';
    echo '</ul>';
}

/**
 * Fallback menu for footer navigation
 */
function cfp_footer_fallback_menu() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'cfp-elementor-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/#about')) . '">' . __('About', 'cfp-elementor-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/#championship')) . '">' . __('Championship', 'cfp-elementor-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/#results')) . '">' . __('Results', 'cfp-elementor-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/team')) . '">' . __('Our Team', 'cfp-elementor-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gallery')) . '">' . __('Gallery', 'cfp-elementor-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . __('Contact', 'cfp-elementor-theme') . '</a></li>';
    echo '</ul>';
}

/**
 * Register custom post type for team members
 */
function cfp_register_post_types() {
    // Team Members post type
    register_post_type('team_member', array(
        'labels' => array(
            'name' => __('Team Members', 'cfp-elementor-theme'),
            'singular_name' => __('Team Member', 'cfp-elementor-theme'),
            'add_new' => __('Add New', 'cfp-elementor-theme'),
            'add_new_item' => __('Add New Team Member', 'cfp-elementor-theme'),
            'edit_item' => __('Edit Team Member', 'cfp-elementor-theme'),
            'new_item' => __('New Team Member', 'cfp-elementor-theme'),
            'view_item' => __('View Team Member', 'cfp-elementor-theme'),
            'search_items' => __('Search Team Members', 'cfp-elementor-theme'),
            'not_found' => __('No team members found', 'cfp-elementor-theme'),
            'not_found_in_trash' => __('No team members found in trash', 'cfp-elementor-theme'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'team-member'),
    ));
}
add_action('init', 'cfp_register_post_types');

/**
 * Add custom meta boxes for team members
 */
function cfp_add_team_meta_boxes() {
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'cfp-elementor-theme'),
        'cfp_team_member_meta_box',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cfp_add_team_meta_boxes');

/**
 * Team member meta box callback
 */
function cfp_team_member_meta_box($post) {
    wp_nonce_field('cfp_team_member_meta_box', 'cfp_team_member_meta_box_nonce');
    
    $position = get_post_meta($post->ID, 'team_position', true);
    $email = get_post_meta($post->ID, 'team_email', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="team_position">' . __('Position', 'cfp-elementor-theme') . '</label></th>';
    echo '<td><input type="text" id="team_position" name="team_position" value="' . esc_attr($position) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="team_email">' . __('Email', 'cfp-elementor-theme') . '</label></th>';
    echo '<td><input type="email" id="team_email" name="team_email" value="' . esc_attr($email) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';
}

/**
 * Save team member meta data
 */
function cfp_save_team_member_meta($post_id) {
    if (!isset($_POST['cfp_team_member_meta_box_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['cfp_team_member_meta_box_nonce'], 'cfp_team_member_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['team_position'])) {
        update_post_meta($post_id, 'team_position', sanitize_text_field($_POST['team_position']));
    }
    
    if (isset($_POST['team_email'])) {
        update_post_meta($post_id, 'team_email', sanitize_email($_POST['team_email']));
    }
}
add_action('save_post', 'cfp_save_team_member_meta');

/**
 * Elementor template integration
 */
function cfp_elementor_template_integration() {
    // Add support for Elementor templates
    if (class_exists('Elementor\Plugin')) {
        // Register custom Elementor widgets if needed
        add_action('elementor/widgets/register', 'cfp_register_custom_widgets');
    }
}

/**
 * Register custom Elementor widgets
 */
function cfp_register_custom_widgets($widgets_manager) {
    // You can add custom Elementor widgets here if needed
}

/**
 * Add theme customizer support for Elementor
 */
function cfp_elementor_customizer_support() {
    if (class_exists('Elementor\Plugin')) {
        // Add customizer support for Elementor
        add_theme_support('elementor-customizer');
    }
}
add_action('after_setup_theme', 'cfp_elementor_customizer_support');

/**
 * Optimize Elementor performance
 */
function cfp_optimize_elementor() {
    if (class_exists('Elementor\Plugin')) {
        // Disable Elementor's default fonts
        update_option('elementor_disable_color_schemes', 'yes');
        update_option('elementor_disable_typography_schemes', 'yes');
        
        // Enable Elementor's performance features
        update_option('elementor_optimized_css_loading', 'yes');
        update_option('elementor_optimized_assets_loading', 'yes');
    }
}
add_action('after_switch_theme', 'cfp_optimize_elementor');

/**
 * Add custom CSS for Elementor compatibility
 */
function cfp_elementor_custom_css() {
    if (class_exists('Elementor\Plugin')) {
        echo '<style>
        .elementor-widget-container {
            margin-bottom: 0;
        }
        .elementor-section {
            padding: 0;
        }
        .elementor-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        </style>';
    }
}
add_action('wp_head', 'cfp_elementor_custom_css');
