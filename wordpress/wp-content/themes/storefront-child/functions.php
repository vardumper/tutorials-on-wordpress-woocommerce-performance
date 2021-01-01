<?php
/** @desc make sure is_plugin_active() is available in here */
incluude_once(ABSPATH . 'wp-admin/includes/plugin.php');

/** @desc override Mailgun settings and return API Credentials from .env file instead */
if (is_plugin_active('mailgun/mailgun.php')) {
    add_filter('pre_option_mailgun', 'override_mailgun_settings');
    function override_mailgun_settings() : array {
        return [
            'region' => $_ENV['MAILGUN_REGION'],
            'useAPI' => '0',
            'domain' => $_ENV['MAILGUN_DOMAIN'],
            'apiKey' => '',
            'username' => $_ENV['MAILGUN_USER'],
            'password' => $_ENV['MAILGUN_PASS'],
            'secure' => '1',
            'sectype' => 'tls',
            'track-clicks' => 'htmlonly',
            'track-opens' => '1',
            'from-address' => $_ENV['MAILGUN_FROM'],
            'from-name' => $_ENV['MAILGUN_FROMNAME'],
            'override-from' => '1',
            'campaign-id' => '',
        ];
    }
}