<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link        https://devdaryl.com/
 * @since      1.0.0
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/public/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
// Checks if wp-login.php and wp-register.php are the current pages being viewed
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// Get menu options value
$getApogeeMenuOptionsValue = get_option('plugin_apogee_menu_options');
// Check if user is on the admin screen or in the login screen
if (!is_admin() AND !is_login_page() AND $getApogeeMenuOptionsValue){ ?>
    <nav id="public-top-nav-apogee" class="navbar navbar-expand-lg navbar-dark" style="background-color: <?php echo esc_html_e(get_option('plugin_apogee_menu_options_bg_color'));?>; display: none;">
        <div class="container-fluid public-top-nav-apogee__links">
            <a class="navbar-brand" href="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_link')); ?>" target="_blank">
                <?php if(get_option('plugin_apogee_menu_options_logo_img')) { ?>
                        <img src="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_img')); ?>" alt="" width="50" height="24" class="d-inline-block align-text-top">
                    <?php } ?>
                    <strong style="color: <?php echo esc_html_e(get_option('plugin_apogee_menu_options_color')); ?>;">
                        <?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_text')); ?>
                    </strong>
            </a>
            <div class="navbar-menu-items public-top-nav-apogee__links">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
            // Set count
            $count = 1;
            // Keep looping as long as the menu options value is <= count
            while($count <= $getApogeeMenuOptionsValue) {
                $linkItemsData = (get_option('plugin_apogee_menu_' . $count));
                // Check if there are any menu items in the db
                if($linkItemsData) {
                // Loop the array in the db, then output menu items
                foreach ($linkItemsData as $menuTitle => $menuLink) { ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: <?php echo esc_html_e(get_option('plugin_apogee_menu_options_color'));?>;" aria-current="page" href="<?php echo $menuLink; ?>" target="_blank"><?php echo $menuTitle; ?></a>
                    </li>
                <?php }   
                }                       
                // Increament count
                $count++;
            } // end while loop
         ?>
                <span style="color: <?php echo esc_html_e(get_option('plugin_apogee_menu_options_color')); ?>;" class="close" data-apogee-close-nav>X</span>
            </ul>
        </div>
    </div>
</nav>
<?php  
} // end of if
