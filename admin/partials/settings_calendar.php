<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.p4w5.eu/blog/
 * @since      1.0.0
 */

$title = $plugin_data['Name'];
$description = __('A plugin for using the eventaservo.org API in wordpress.', 'eventaservo-api');
$version = $plugin_data['Version'];
?>
<div class="wrap">
    <h1><?php echo $title; ?> <small>version: <?php echo $version; ?></small></h1>
    <p><?php echo $description; ?></p>
<?php
if (isset($_POST['submit'])) {
    /* copy and overwrite $post for checkboxes */
    $form = $_POST;

    foreach ($settings->map_options as $name => $option) {
        /* checkboxes don't get sent if not checked */
        if ($option->type === 'checkbox') {
            $form[$name] = isset($_POST[ $name ]) ? 1 : 0;
        }
        $value = trim( stripslashes( $form[$name]) );
        $settings->set($name, $value);
    }
?>
<div class="notice notice-success is-dismissible">
    <p><?php _e('Options Updated!', 'eventaservo-api'); ?></p>
</div>
<?php
} elseif (isset($_POST['reset'])) {
    $settings->reset();
?>
<div class="notice notice-success is-dismissible">
    <p><?php _e('Options have been reset to default values!', 'eventaservo-api'); ?></p>
</div>
<?php
} elseif (isset($_POST['clear-geocoder-cache'])) {
    echo "HALLO";
?>
<div class="notice notice-success is-dismissible">
    <p><?php _e('Location caches have been cleared!', 'eventaservo-api'); ?></p>
</div>
<?php
}
?>
<div class="wrap">
    <div class="wrap">
    <form method="post">
        <div class="container">
            <h2><?php _e('Calendar Settings', 'eventaservo-api'); ?></h2>
            <hr>
        </div>
        <div class="container">
          <h4>Calendar Apperance:</h4>
          <hr>
          <div class="">
              <label class="label">Width:</label>
              <input id="calendar-width" name="calendar-width" type="text" placeholder="100%">
          </div>
          <div class="">
              <label class="label">Height:</label>
              <input id="calendar-height" name="calendar-height" type="text" placeholder="500px">
          </div>
        </div>
        <div class="container">
            <h4>Config CDN URLs</h4>
            <hr>
              <div>
                <label class="label">Fullcalendar JS:</label>
                <input id="js_url" name="js_url" type="url" placeholder="https://unpkg.com/fullcalendar@3.10.0/dist/fullcalendar.js">
              </div>
              <div>
                  <label class="label">Fullcalendar CSS:</label>
                  <input id="css_url" name="css_url" type="url" placeholder="https://unpkg.com/fullcalendar@3.10.0/dist/fullcalendar.css">
              </div>
              <h4>Other Options</h4>
              <hr>
              ...
        </div>
    <div class="submit">
        <input type="submit"
            name="submit"
            id="submit"
            class="button button-primary"
            value="<?php _e('Save Changes', 'eventaservo-api'); ?>">
        <input type="submit"
            name="reset"
            id="reset"
            class="button button-secondary"
            value="<?php _e('Reset to Defaults', 'eventaservo-api'); ?>">
        <input type="submit"
            name="clear-geocoder-cache"
            id="clear-geocoder-cache"
            class="button button-secondary"
            value="<?php _e('Clear Geocoder Cache', 'eventaservo-api'); ?>">
    </div>

    </form>
    </div>
</div>