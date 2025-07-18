<?php

class Course_Progress_Tracker {

    public function init() {
        add_shortcode('course_tracker', [$this, 'render_shortcode']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        register_activation_hook(__FILE__, [$this, 'create_db_table']);
        add_action('init', [$this, 'handle_form_submission']);

    }

    public function handle_form_submission() {
    if (!isset($_POST['cpt_submit'])) return;
    if (!isset($_POST['cpt_nonce']) || !wp_verify_nonce($_POST['cpt_nonce'], 'cpt_save')) return;

    $course_name = isset($_POST['course_name']) ? sanitize_text_field($_POST['course_name']) : '';

    global $wpdb;
    $table = $wpdb->prefix . 'course_progress';

    $wpdb->insert(
        $table,
        [
            'user_id' => get_current_user_id(),
            'course_name' => $course_name,
            'progress' => 0
        ]
    );

    // Optional: redirect to avoid resubmission on refresh
    wp_redirect(add_query_arg('cpt_success', '1', $_SERVER['REQUEST_URI']));
    exit;
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
    global $wpdb;
    $table = $wpdb->prefix . 'course_progress';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        course_name varchar(255) NOT NULL,
        progress int DEFAULT 0,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

}
