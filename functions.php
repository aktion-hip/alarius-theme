<?php
/**
 * Alarius functions and definitions.
 *
 * @package alarius
 */

/**
 * Enqueue styles.
 *
 * @return void
 */
if ( ! function_exists( 'alarius_styles' ) ) :

function alarius_styles() {
    // Register theme stylesheet.
    $theme_version = wp_get_theme()->get( 'Version' );
    $version_string = is_string( $theme_version ) ? $theme_version : false;

    wp_register_style(
        'alarius-style',
        get_template_directory_uri() . '/assets/css/alarius.css',
        array(),
        $version_string
    );

    wp_register_style(
        'fontawesome-all',
        get_template_directory_uri() . '/assets/css/fontawesome-all.min.css',
        array(),
        $version_string
    );

    wp_register_style(
        'main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        $version_string
    );

    wp_register_script(
        'main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(), $version_string, true
    );

    wp_register_script(
        'jquery',
        get_template_directory_uri() . '/assets/js/jquery.min.js',
        array(), $version_string, true
    );

    wp_register_script(
        'breakpoints',
        get_template_directory_uri() . '/assets/js/breakpoints.min.js',
        array(), $version_string, true
    );

    wp_register_script(
        'browser',
        get_template_directory_uri() . '/assets/js/browser.min.js',
        array(), $version_string, true
    );

    wp_register_script(
        'util',
        get_template_directory_uri() . '/assets/js/util.js',
        array(), $version_string, true
    );

    wp_register_script(
        'alarius',
        get_template_directory_uri() . '/assets/js/alarius.js',
        array(), $version_string, true
    );

    // Enqueue theme stylesheet.
    wp_enqueue_style('alarius-style');
    wp_enqueue_script('browser');
    wp_enqueue_script('breakpoints');
    wp_enqueue_script('jquery');
    wp_enqueue_script('util');
    wp_enqueue_script('main');
    wp_enqueue_script('alarius');

    // Design: HTML5 UP
    wp_enqueue_style(
        'main',
        get_parent_theme_file_uri( 'assets/css/main.css' ),
        array(),
        wp_get_theme()->get( 'Version' ),
        'all'
    );
    wp_enqueue_style( 
        'fontawesome-all',
        get_parent_theme_file_uri( 'assets/css/fontawesome-all.min.css' ),
        array(),
        wp_get_theme()->get( 'Version' ),
        'all'
    );

}

endif;

add_action( 'wp_enqueue_scripts', 'alarius_styles' );

// Add setting using the Settings API
add_action( 'admin_init', 'wp_alarius_settings_api_init' );

function wp_alarius_settings_api_init() {
    add_settings_section( 'alarius_settings_section', 'Alarius Settings', 'alarius_settings_section_callback', 'general' );
    add_settings_field( 'alarius_x_path', 'X URL', 'alarius_x_field_callback', 'general', 'alarius_settings_section' );
    add_settings_field( 'alarius_facebook_path', 'Facebook URL', 'alarius_facebook_field_callback', 'general', 'alarius_settings_section' );
    add_settings_field( 'alarius_instagram_path', 'Instagram URL', 'alarius_instagram_field_callback', 'general', 'alarius_settings_section' );
    register_setting( 'general', 'alarius_x_path' );
    register_setting( 'general', 'alarius_facebook_path' );
    register_setting( 'general', 'alarius_instagram_path' );

    function alarius_settings_section_callback() {
        //echo '<p>Settings for the Alarius theme.</p>';
    }
    
    function alarius_x_field_callback() {
        $value = get_option( 'alarius_x_path', '' );
        echo "<input type='text' name='alarius_x_path' id='alarius_x_path' type='text' value='{$value}' />";
        echo "<label for='alarius_x_path'>&nbsp;URL to X (used in the Alarius theme)</label>";
    }

    function alarius_facebook_field_callback() {
        $value = get_option( 'alarius_facebook_path', '' );
        echo "<input type='text' name='alarius_facebook_path' id='alarius_facebook_path' type='text' value='{$value}' />";
        echo "<label for='alarius_facebook_path'>&nbsp;URL to Facebook (used in the Alarius theme)</label>";
    }

    function alarius_instagram_field_callback() {
        $value = get_option( 'alarius_instagram_path', '' );
        echo "<input type='text' name='alarius_instagram_path' id='alarius_instagram_path' type='text' value='{$value}' />";
        echo "<label for='alarius_instagram_path'>&nbsp;URL to Instagram (used in the Alarius theme)</label>";
    }

}
