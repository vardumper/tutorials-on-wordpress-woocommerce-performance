=== Plugin Name ===
Contributors: (Virgial)
Tags: notification,notify,email,user,password,moderator,postauthor,automatic updates, admin e-mail,switch
Requires at least: 4.0.0
Donate link:https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TYG56SLWNG42N
Tested up to: 5.5.3
Stable tag: 1.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Disable or enable the Wordpress notification e-mails (new user, changed password, automatic updates, etc.). Works perfectly in combination with a lot of other plugins!

== Description ==

With this plugin you can switch the different Wordpress notification e-mails on and off, like options as the new user and password change notifications send by Wordpress to the administrator and user. Works perfectly in combination with a lot of other plugins!

Watch this nice tut made by Robert Orzanna: 
[youtube https://www.youtube.com/watch?v=66UkQKgSFio]


**The options you can manage are:**

1. New user notification to admin
2. New user notification to user
3. Notify postauthor
4. Notify moderator
5. Password change notification to admin
6. Password change notification to user
7. E-mail address change notification to user
8. Forgotten password e-mail to user
9. Forgotten password e-mail to administrator
10. Automatic Wordpress core update e-mail
11. Automatic Wordpress plugin update e-mail *NEW*
12. Automatic Wordpress theme update e-mail *NEW*

The automatic core, plugin, and theme updates have a special built-in feature. When one of these options is disabled, successful e-mails don't get send out, but failed updates still will send an e-mail to the admin.


Want regular updates? Feel free to support me with a small donation :-)


== Installation ==

1. Upload `manage-notification-emails.zip` via the plugins menu
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the settingspage to enable or disable sending of notifications


== Frequently Asked Questions ==

= Is it active right away? =

Yes, after activating you can go to the settings page and disable or enable the notification e-mails that suits you.

= Can I use this plugin for multisite? =
This plugin is not tested on multisite environments yet.

= Disabling user notifications does not work =
Some other plugins also use their custom notifications which overwrite the core notifications of Wordpress. To be sure, please first try the plugin without other plugins installed or at least temporarily disable them.

== Screenshots ==

1. This is your view of the settingspage.

== Upgrade Notice ==
If you're one of the early installers, than you'll be happy to see that de new user notification is now splitted in admin and user e-mail management.

== Changelog ==

= 1.6.0 =
ADDED: Automatic Wordpress plugin, and theme update e-mail options.

= 1.5.1 = 
FIXED: php-notice for missing $deprecated variable.
= 1.5.0 =
UPGRADED: Upgraded the pluggable functions file. Fixing the missing PassWordHash Class bug.

= 1.4.2 =
FIXED: Loading local language.

= 1.4.1 =
ADDED: Manage sending e-mail after a successful automatic Wordpress core update to administrators. E-mails about failed updates will always be sent to the administrators and will not be disabled.


= 1.4.0 =
ADDED: Multi-language support

= 1.3.0 =
ADDED: passing through the $notify variable, available sinds 4.6. This is for other plugins to override default sending to admin or user. Only useful if sending within this plugin is activated. 
UPDATED: updated with the newer pluggable send functions of wordpress 4.7.
FIXED: Missing blogname in user email

= 1.2.0 =
ADDED: Manage sending password forgot e-mail to registered user.
ADDED: Manage sending password forgot e-mail to administrator.

= 1.1.0 =
FIXED: Checking password change notification to admin now works.
ADDED: Splitted the manage option for new user notification e-mail into user and admin e-mail.
UPDATED: Clearified some comments and fixed some typo's.

= 1.0 =
* It all starts here.