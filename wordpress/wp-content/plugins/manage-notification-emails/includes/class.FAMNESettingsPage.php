<?php
/**
 * Manage notification emails settings page class
 *
 * Displays the settings page.
 * 
 * This file is part of the Manage Notification Emails plugin
 * You can find out more about this plugin at http://www.freeamigos.mx
 * Copyright (c) 2006-2015  Virgial Berveling
 *
 * @package WordPress
 * @author Virgial Berveling
 * @copyright 2006-2015
 *
 * version: 1.3.0
 */

if (!class_exists('FAMNESettingsPage')):

class FAMNESettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_filter( 'plugin_action_links_' . FA_MNE_PLUGIN_BASENAME, array($this,'add_action_links') );
        add_action( 'init', array( $this, 'famne_load_textdomain') );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Notification e-mails', 
            'manage_options', 
            'famne-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = FAMNE::get_option( 'famne_options' );

        ?>
        <div class="wrap">
            <h2><?php _e('Manage the notification e-mails','manage-notification-emails')?></h2>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'famne_option_group' );   
                do_settings_sections( 'famne-admin' );
                submit_button(); 
            ?>
            </form>

            <div style="padding:40px;text-align:center;color:rgba(0,0,0,0.7);">
                <p class="description"><?php _e('If you find this plugin useful, you can show your appreciation here :-)','manage-notification-emails')?></p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="LTZWTLEDPULFE">
<input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, de veilige en complete manier van online betalen.">
<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
</form>
            </div>

</div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'famne_option_group', // Option group
            'famne_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'famne-admin' // Page
        );  

        add_settings_field(
            'wp_new_user_notification_to_admin', // ID
            __('New user notification to admin','manage-notification-emails'), // Title 
            array( $this, 'field1_callback' ), // Callback
            'famne-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'wp_new_user_notification_to_user', // ID
            __('New user notification to user','manage-notification-emails'), // Title 
            array( $this, 'field7_callback' ), // Callback
            'famne-admin', // Page
            'setting_section_id' // Section           
        );      
        
        add_settings_field(
            'wp_notify_postauthor', 
            __('Notify post author','manage-notification-emails'), 
            array( $this, 'field2_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );      

        add_settings_field(
            'wp_notify_moderator', 
            __('Notify moderator','manage-notification-emails'), 
            array( $this, 'field3_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );      

        add_settings_field(
            'wp_password_change_notification', 
            __('Password change notification to admin','manage-notification-emails'), 
            array( $this, 'field4_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );      

        add_settings_field(
            'send_password_change_email', 
            __('Password change notification to user','manage-notification-emails'), 
            array( $this, 'field5_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );      

        add_settings_field(
            'send_email_change_email', 
            __('E-mail address change notification to user','manage-notification-emails'), 
            array( $this, 'field6_callback' ), 
            'famne-admin', 
            'setting_section_id'
        ); 
        
        add_settings_field(
            'send_password_forgotten_email', 
            __('Password forgotten e-mail to user','manage-notification-emails'), 
            array( $this, 'field8_callback' ), 
            'famne-admin', 
            'setting_section_id'
        ); 

        add_settings_field(
            'auto_core_update_send_email', 
            __('automatic Wordpress core update e-mail','manage-notification-emails'), 
            array( $this, 'field10_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );

        add_settings_field(
            'auto_plugin_update_send_email', 
            __('Automatic Wordpress plugin update e-mail','manage-notification-emails'), 
            array( $this, 'field11_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );

        add_settings_field(
            'auto_theme_update_send_email', 
            __('Automatic Wordpress theme update e-mail','manage-notification-emails'), 
            array( $this, 'field12_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );

        add_settings_field(
            'send_password_admin_forgotten_email', 
            __('Password forgotten e-mail to administrator','manage-notification-emails'), 
            array( $this, 'field9_callback' ), 
            'famne-admin', 
            'setting_section_id'
        );
    

    
    
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        if (empty($input)) $input = array();
        $new_input = array();
        foreach( $input as $key=>$val )
            $new_input[$key] = $val == '1'?'1':'';

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        _e('Manage your notification e-mail preferences below.','manage-notification-emails');
        echo '<br/>';
        _e('By unchecking the checkbox you prevent sending the specific e-mails.','manage-notification-emails');
    }

    /** 
     * Get the settings option array and print one of its values
     */

    public function print_checkbox($name,$id,$message='')
    {
        $checked = isset( $this->options[$id]) && $this->options[$id] =='1' ?true:false;

        if ($checked) {$add_check = 'checked="checked"';}else {$add_check='';};
        print '<label><input type="checkbox" name="famne_options['.$id.']" value="1" '.$add_check.' />&nbsp;'.__('Enable sending e-mail','manage-notification-emails').'</label>';
        print '<p class="description">'.$message.'</p>';
    }
    
    
    public function field1_callback()
    {
        $this->print_checkbox('field1','wp_new_user_notification_to_admin',__('Sends an e-mail to the site admin after a new user is registered.','manage-notification-emails'));
    }

    public function field7_callback()
    {
        $this->print_checkbox('field7','wp_new_user_notification_to_user',__('Send e-mail with login credentials to a newly-registered user.','manage-notification-emails'));
    }

    public function field2_callback()
    {
        $this->print_checkbox('field2','wp_notify_postauthor',__('Send e-mail to an author (and/or others) of a comment/trackback/pingback on a post.','manage-notification-emails'));
    }

    public function field3_callback()
    {
        $this->print_checkbox('field3','wp_notify_moderator',__('Send e-mail to the moderator of the blog about a new comment that is awaiting approval.','manage-notification-emails'));
    }
    
    public function field4_callback()
    {
        $this->print_checkbox('field4','wp_password_change_notification',__('Send e-mail to the blog admin of a user changing his or her password.','manage-notification-emails'));
    }
    
    public function field5_callback()
    {
        $this->print_checkbox('field5','send_password_change_email',__('Send e-mail to registered user about changing his or her password. Be careful with this option, because when unchecked, the forgotten password request e-mails will be blocked too.','manage-notification-emails'));
    }

    public function field6_callback()
    {
        $this->print_checkbox('field6','send_email_change_email',__('Send e-mail to registered user about changing his or her E-mail address.','manage-notification-emails'));
    }
    
    public function field8_callback()
    {
        $this->print_checkbox('field8','send_password_forgotten_email',__('Send the forgotten password e-mail to registered user.<br/>(To prevent locking yourself out, sending of the forgotten password e-mail for administrators will still work)','manage-notification-emails'));
    }    
    public function field9_callback()
    {
        $this->print_checkbox('field9','send_password_admin_forgotten_email',__('Send the forgotten password e-mail to administrators. Okay, this is a <strong style="color:#900">DANGEROUS OPTION !</strong><br/> So be warned, because unchecking this option prevents sending out the forgotten password e-mail to all administrators. So hold on to your own password and uncheck this one at your own risk ;-)','manage-notification-emails'));
    }  

    public function field10_callback()
    {
        $this->print_checkbox('field10','auto_core_update_send_email',__('Sends an e-mail after a successful automatic Wordpress core update to administrators. E-mails about failed updates will always be sent to the administrators and cannot be disabled.','manage-notification-emails'));
    }

    public function field11_callback()
    {
        $this->print_checkbox('field11','auto_plugin_update_send_email',__('Sends an e-mail after a successful automatic plugin update to administrators. E-mails about failed plugin updates will always be sent to the administrators','manage-notification-emails'));
    }

    public function field12_callback()
    {
        $this->print_checkbox('field12','auto_theme_update_send_email',__('Sends an e-mail after a successful automatic theme update to administrators. E-mails about failed theme updates will always be sent to the administrators','manage-notification-emails'));
    }


    function add_action_links ( $links ) {
        $mylinks = array(
        '<a href="' . admin_url( 'options-general.php?page=famne-admin' ) . '">'.__('Settings').'</a>',
        );
        return array_merge( $links, $mylinks );
    }

    /**
     * Translations.
     *
     * @since 1.4.2
     */
    function famne_load_textdomain() {
        load_plugin_textdomain( 'manage-notification-emails', false, basename(FA_MNE_PLUGIN_DIR) . '/languages' );
    }
}

endif;