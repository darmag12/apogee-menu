<?php
/**
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link        https://devdaryl.com/
 * @since      1.0.0
 *
 * @package    Apogee_Menu
 * @subpackage Apogee_Menu/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
        <div class="wrap">
           <h1 class="mb-3"><strong>Apogee Menu</strong></h1>
           <!-- Checks if form is submitted then calls apogee_menu_admin_display_handle_form -->
           <?php if($_POST['justsubmitted'] == "true") apogee_menu_admin_display_handle_form(); ?>
           <form method="POST">
                    <input type="hidden" name="justsubmitted" value="true">
                    <?php wp_nonce_field('saveMenuList', 'ApogeeNonce'); ?>
                    <!-- Check if an option has been selected then output corresponding input fields -->
                    <?php
                    // Store results of get_options() in a variable
                        $getApogeeMenuOptionsValue = get_option('plugin_apogee_menu_options');
                        $count = 1;
                        while($count <= $getApogeeMenuOptionsValue) { 
                            $linkItemsData = (get_option('plugin_apogee_menu_' . $count)); ?>
                            <div class="input-group mb-5">
                                <span class="input-group-text">Link Title and URL Respectivly</span>
                                <input name="<?php echo 'apogee_link_title_' . $count ?>" id="<?php echo 'apogee_link_title_' . $count ?>" type="text" placeholder="<?php echo 'Enter Link Title ' . $count ?>" aria-label="Link title" class="form-control" 
                                value="<?php if($linkItemsData) foreach($linkItemsData as $menuTitle => $menuLink) echo $menuTitle; ?>"
                                required>
                                <input name="<?php echo 'apogee_link_title_url_' . $count ?>" id="<?php echo 'apogee_link_title_url_' . $count ?>" type="url" placeholder="<?php echo "https://example-$count.com" ?>" pattern="https://.*" aria-label="Url" class="form-control" 
                                value="<?php if($linkItemsData) foreach($linkItemsData as $menuTitle => $menuLink) echo $menuLink; ?>"
                                required>
                            </div>
                            <?php
                            // Increament
                            $count++;
                        } // end of while loop
                        
                        // check if a value is set in options, if so, display save changes button
                        if($getApogeeMenuOptionsValue){ ?>
                            <div class="col-12">
                                <button class="btn btn-primary" name="submit" id="submit" type="submit">Save Changes</button>
                            </div>
                        <?php } else { ?>
                            <div class="apogee-menu-info-alert alert alert-primary d-flex align-items-center" role="alert">
                                <div>
                                    <i class="bi bi-info-circle-fill"></i> Headover to the <strong>Options</strong> tab and set the amount of menu items you'd like. 
                                </div>
                            </div>
                        <?php } // end of else
                    ?>
           </form>
        </div>
    <?php
    function apogee_menu_admin_display_handle_form() {
        // Verify the nonce value that takes two arguments, (value, action)
        if(wp_verify_nonce($_POST['ApogeeNonce'], 'saveMenuList') AND current_user_can('manage_options')) {
        // Store results of get_options() in a variable
        $getApogeeMenuOptionsValue = get_option('plugin_apogee_menu_options');
        if(isset($_POST['submit'])){
            $inputCount = 1;
            while($inputCount <= $getApogeeMenuOptionsValue) {
            // Sanitize the post link title
            $postLinkTitle = filter_var($_POST['apogee_link_title_' . $inputCount], FILTER_SANITIZE_STRING);

            // Sanitize the post link title url
            $postLinkTitleUrl = filter_var($_POST['apogee_link_title_url_' . $inputCount], FILTER_SANITIZE_URL);

            // declaring the apogeeDataArray
            $apogeeDataArray = array("$postLinkTitle" => "$postLinkTitleUrl");

            // Posting/Updating data in the database
            update_option('plugin_apogee_menu_' . $inputCount , $apogeeDataArray);
            
            // Increament inputCount
            $inputCount++;
            }
        }
         ?>
        <!-- Out put success message -->
        <div class="updated">
            <p>Now we are cooking with fire. Your menu items were saved ✔️</p>
        </div>
        <?php } else { ?>

            <div class="error">
                <p>Sorry, you do not have the correct permision to perform that action 😔</p>
            </div>
        <?php }
    }

