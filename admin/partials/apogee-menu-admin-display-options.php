<?php
/**
 * Provide an admin area options view for the plugin
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
            <h1 class="mb-3"><strong>Options</strong></h1>
            <h4 class="mb-3">Select the number of menu items you want</h4>
            <!-- Checks if form is submitted then calls apogee_menu_admin_display_handle_options_form -->
            <?php if(isset($_POST['submit_options'])) apogee_menu_admin_display_handle_options_form(); ?>
            <form method="POST">
            <?php wp_nonce_field('saveMenuItems', 'ApogeeNonceOptions'); ?>
                <select name="apogee_menu_options" class="form-select form-select-md mb-5" aria-label="Apogee Menu Options" require>
                    <option value="" selected disabled>----------- Select desired menu items -----------</option>
                    <option value="4" <?php if(get_option('plugin_apogee_menu_options') == 4) echo 'selected';?>>Four</option>
                    <option value="5" <?php if(get_option('plugin_apogee_menu_options') == 5) echo 'selected';?>>Five</option>
                    <option value="6" <?php if(get_option('plugin_apogee_menu_options') == 6) echo 'selected';?>>Six</option>
                    <option value="7" <?php if(get_option('plugin_apogee_menu_options') == 7) echo 'selected';?>>Seven</option>
                    <option value="8" <?php if(get_option('plugin_apogee_menu_options') == 8) echo 'selected';?>>Eight</option>
                    <option value="9" <?php if(get_option('plugin_apogee_menu_options') == 9) echo 'selected';?>>Nine</option>
                    <option value="10"<?php if(get_option('plugin_apogee_menu_options') == 10) echo 'selected';?>>Ten</option>
                </select>
                <div class="admin-add-menu-styles mb-5">
                    <h4 class="mb-3">Add Menu Styles</h4>
                    <!-- Start of choose between a logo text or image -->
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="textLogoChecker">
                            <label class="form-check-label" for="textLogoChecker">
                                Text Logo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="imageLogoChecker" checked>
                            <label class="form-check-label" for="imageLogoChecker">
                                Image Logo
                            </label>
                        </div> -->
                        <!-- End of choose between a logo text or image -->
                        <!-- Start of upload logo image -->
                        <div class="col-4 mb-4">
                            <label for="apogeeLogoFile" class="form-label"><strong>Upload Menu Logo</strong></label>
                            <input name="apogee_menu_options_logo_img" class="form-control mb-3" id="apogeeLogoFile" placeholder="Choose File...." accept="image/*" 
                            value="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_img')); ?>" data-apogee-logo-img readonly>
                            <?php
                                if(get_option('plugin_apogee_menu_options_logo_img')) { ?>
                                    <div id="apogeeUploadLogoContainer" class="mb-3">
                                        <img src="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_img')); ?>" alt="Logo Thumbnail" width="80" height="40" data-apogee-logo-thumbnail/>
                                    <button type="button" class="btn btn-outline-danger btn-sm" id="apogeeRemoveLogo" data-remove-logo-btn>Remove Logo</button>
                                    </div>
                                <?php } ?>
                        </div>
                         <!-- End of upload logo image -->
                         <!-- Start of upload logo text -->
                        <div class="col-4 mb-4">
                            <label for="apogeeLogoText" class="form-label"><strong>Logo Text</strong> (optional)</label>
                            <input name="apogee_menu_options_logo_text" type="text" class="form-control" id="apogeeLogoText" placeholder="Enter Logo Text" value="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_text')); ?>" aria-label="Logo Text" aria-describedby="apogeeLogoText">
                            <br>
                            <label for="apogeeLogoLink" class="form-label"><strong>Logo Link</strong></label>
                            <input name="apogee_menu_options_logo_link" type="url" class="form-control" id="apogeeLogoLink" placeholder="https://yourlink.com" value="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_logo_link')); ?>" aria-label="Logo Link" aria-describedby="apogeeLogoLink" pattern="https://.*">
                        </div>
                        <!-- End of upload logo text -->
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="navBgColor" class="form-label">Choose Background Color</label>
                                <input name="apogee_menu_options_bg_color" type="color" class="form-control form-control-color" id="navBgColor" value="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_bg_color'));?>" title="Choose your background color" data-navBgColor>
                            </div>

                            <div class="col-3">
                                <label for="navItemsColor" class="form-label">Choose Menu Items Color</label>
                                <input name="apogee_menu_options_color" type="color" class="form-control form-control-color" id="navItemsColor" value="<?php echo esc_html_e(get_option('plugin_apogee_menu_options_color'));?>" title="Choose your menu items color" data-navItemsColor>
                            </div>
                        </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="submit_options" id="submit" type="submit" data-submit-options-btn>Save Changes</button>
                </div>
            </form>
        </div>   
    <?php
    // Handles the form in the options menu
    function apogee_menu_admin_display_handle_options_form() { ?>
        <?php
           if((isset($_POST['apogee_menu_options']) AND $_POST['apogee_menu_options'] == true) AND (wp_verify_nonce($_POST['ApogeeNonceOptions'], 'saveMenuItems') AND current_user_can('manage_options')) ) { 
            // Sanitize the selected option
            $postApogeeMenuOptions = filter_var($_POST['apogee_menu_options'], FILTER_SANITIZE_STRING);
            $postApogeeMenuOptionsStylesImg = filter_var($_POST['apogee_menu_options_logo_img'], FILTER_SANITIZE_STRING);
            $postApogeeMenuOptionsLogoText = filter_var($_POST['apogee_menu_options_logo_text'], FILTER_SANITIZE_STRING);
            $postApogeeMenuOptionsLogoLink = filter_var($_POST['apogee_menu_options_logo_link'], FILTER_SANITIZE_URL);
            $postApogeeMenuOptionsStylesBgColor = filter_var($_POST['apogee_menu_options_bg_color'], FILTER_SANITIZE_STRING);
            $postApogeeMenuOptionsStylesColor = filter_var($_POST['apogee_menu_options_color'], FILTER_SANITIZE_STRING);

            // Convert to a number
            $numPostApogeeMenuOptions = (int) $postApogeeMenuOptions;
            
            // Posting/Updating data in the database
            update_option('plugin_apogee_menu_options', $numPostApogeeMenuOptions);
            update_option('plugin_apogee_menu_options_logo_img', $postApogeeMenuOptionsStylesImg);
            update_option('plugin_apogee_menu_options_logo_text', $postApogeeMenuOptionsLogoText);
            update_option('plugin_apogee_menu_options_logo_link', $postApogeeMenuOptionsLogoLink);
            update_option('plugin_apogee_menu_options_bg_color', $postApogeeMenuOptionsStylesBgColor);
            update_option('plugin_apogee_menu_options_color', $postApogeeMenuOptionsStylesColor);
            ?>
            <!-- Success Message  -->
            <div class="updated">
                <p>Your menu settings were saved, headback to <strong>The Menu</strong> tab to add menu items ✔️</p>
            </div>

           <?php } else { ?>
            <!-- Error Message  -->
            <div class="error">
                <p>Please select the number of menu items you desire, or check to see if you have correct permissions to perform this action 🤨</p>
            </div>
        <?php }
        
    }

    
