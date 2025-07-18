<?php
/**
 * Plugin Name: Course Progress Tracker
 * Description: A custom plugin to track users’ course progress.
 * Version: 1.0.0
 * Author: Sudhir Gaikwad
 * License: GPL2
 */

defined('ABSPATH') or die('No script kiddies please!');

// Define constant for plugin path
define('CPT_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Include main class
require_once CPT_PLUGIN_PATH . 'includes/class-course-tracker.php';

// Initialize plugin
function cpt_init_plugin() {
    $plugin = new Course_Progress_Tracker();
    $plugin->init();
}
add_action('plugins_loaded', 'cpt_init_plugin');

// Plugin activation: create table
register_activation_hook(__FILE__, 'cpt_activate_plugin');

function cpt_activate_plugin() {
    require_once CPT_PLUGIN_PATH . 'includes/class-course-tracker.php';
    $plugin = new Course_Progress_Tracker();
    $plugin->create_db_table();
}
