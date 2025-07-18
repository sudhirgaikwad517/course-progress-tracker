<form method="post">
    <label for="course_name">Course Name:</label><br>
    <input type="text" name="course_name" required><br>
    <input type="hidden" name="cpt_nonce" value="<?php echo wp_create_nonce('cpt_save'); ?>">
    <input type="submit" name="cpt_submit" value="Track Progress">
</form>
