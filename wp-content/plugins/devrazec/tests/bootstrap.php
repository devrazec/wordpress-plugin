<?php
// Load the main plugin file
require dirname(__DIR__) . '/index.php';

// Mock some WP functions
if (!function_exists('__')) {
    function __($str) { return $str; }
}
if (!function_exists('_e')) {
    function _e($str) { echo $str; }
}
if (!function_exists('esc_attr')) {
    function esc_attr($str) { return htmlspecialchars($str, ENT_QUOTES); }
}
if (!function_exists('selected')) {
    function selected($a, $b) { return $a === $b ? 'selected' : ''; }
}
if (!function_exists('checked')) {
    function checked($a, $b) { return $a === $b ? 'checked' : ''; }
}
if (!function_exists('settings_fields')) {
    function settings_fields($option_group) {}
}
if (!function_exists('do_settings_sections')) {
    function do_settings_sections($page) {}
}
if (!function_exists('submit_button')) {
    function submit_button($text = 'Save Changes') { echo "<button>$text</button>"; }
}
if (!function_exists('get_option')) {
    function get_option($name) { return ''; }
}
