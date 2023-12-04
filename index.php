<?php
/*
Plugin Name: Custom Checkbox Limit by Suresh Kumar M
Description: Limit the number of selected checkboxes in a field.
Version: 1.0
Author: Suresh Kumar M
*/

function custom_checkbox_limit_script_by_for($forValue, $className) {
    ?>
    <script>
        jQuery(document).ready(function($) {
            var maxSelections = 2; // Set the maximum number of selections
            
            $(document).on('change', '.<?php echo esc_attr($className); ?>[for="<?php echo esc_attr($forValue); ?>"] input[type="checkbox"]', function() {
                var selectedCheckboxes = $('.<?php echo esc_attr($className); ?>[for="<?php echo esc_attr($forValue); ?>"] input[type="checkbox"]:checked');
                
                if (selectedCheckboxes.length > maxSelections) {
                    $(this).prop('checked', false);
                    alert('You can only select up to ' + maxSelections + ' options.');
                }
            });
        });
    </script>
    <?php
}


// Add the script for each specific 'for' value and class name
add_action('wp_footer', function() {
    custom_checkbox_limit_script_by_for('653880257363d', 'wapf-field-checkboxes');
});


?>
