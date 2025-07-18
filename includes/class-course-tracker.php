<?php

class Course_Progress_Tracker {

    public function init() {
        add_shortcode('course_tracker', [$this, 'render_shortcode']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        register_activation_hook(__FILE__, [$this, 'create_db_table']);
    }

    public function render_shortcode() {
        ob_start();
        include CPT_PLUGIN_PATH . 'templates/form.php';
        return ob_get_clean();
    }

    public function add_admin_menu() {
        add_menu_page(
            'Course Tracker',
            'Course Tracker',
            'manage_options',
            'course-tracker',
            [$this, 'admin_page_content'],
            'dashicons-welcome-learn-more'
        );
    }

    public function admin_page_content() {
        echo '<div class="wrap"><h1>Course Progress Tracker</h1><p>Coming soon...</p></div>';
    }

    public function create_db_table() {
        // Placeholder for DB table creation logic
    }
}
