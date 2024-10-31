=== PS_User Copy ===
Contributors: Pooya Soleimani
Donate link: http://pooyasoleimani.ir
Tags: vB, vBulletin, vbulletin, vb, transfer, user, users
Requires at least: 3.1
Tested up to: 4.4.2
Stable tag: trunk

transfer vBulletin users to WordPress users.

== Description ==

This plugin transfer vBulletin users and makes them Wordpress accounts. If you run the importer and remove this plugin users that you have imported that have not logged in will be unable to log in. 

== Installation ==

1. Upload the vb-user-copy folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set your vBulletin table prefix in 'Settings' -> 'vB User Copy'.
1. Save your table prefix and click the import users button.

== Frequently Asked Questions ==

= Can I import users from another database? =

Yes Baby you can :)
if you select a correct Database host. ;)

= Can I drop the vBulletin user table after I run this? =

Yes you can :D

= Is this a Wordpress/vBulletin bridge? =

No, it only copies users from vBulletin to Wordpress. If someone were to register on the forums after doing the user import they would not have a Wordpress account unless you ran the importer again. **I don't recommend running the importer more than once**. You should make a custom registration page and point both Wordpress and vBulletin to that page. Which would then add their user data to both databases.

== Screenshots ==

= 1.0 =
* First release, plugin includes basic functionality.

== Upgrade Notice ==

= 1.0 =
* Initial Release