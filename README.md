License Key Manager
===================

Easily integrate product key management within your apps, premium themes, plugins, any web based php software. 

Have you ever built a cool app or a website and by time the project was over and the the final payment was due you got stiffed on your hard earn cash? Have you ever noticed you can not install Microsoft Windows without a product key code? That's what License Key Manager is all about.

This project is a work in progress... what that means is that the script works great, however I could really clean it up a bit and will as we move forward and I rollout version releases here: https://github.com/icryptic/License-Key-Manager/releases

***

#### Php Standalone Requirements:
* PHP: 5.2
* allow_url_fopen: on
* short_open_tag: on

***

#### WordPress Edition Requirements:
* PHP: 5.2+
* WordPress 3.7.1 tested up to 3.8

***

#### Last Updated:
* php standalone (2010)
* wordpress edition (12/14/2013)

***

#### Documentation: WordPress Edition

There are two parts to the License Key Manager WordPress Edition.

The first part is the 'server node' and the second part is the 'client node'. Now that I said that, you will understand my lingo better moving forward. The first step to setting up License Key Manager is to install a fresh copy of WordPress (tested up to 3.8).

ATTENTION: Do not add any WordPress plugins. 

This WordPress site will be for your server node. The server node is what connects to the client node and verifies that the license key is valid. 

Once you have installed WordPress, upload the following folder via ftp (ie: wp-content/themes/license-key-server ). Next, login your wp-admin. Once logged in, head on over to your Appearance menu. Select the "License Key Server" theme and activate it. That's it! Your License Key Server is now setup. Head on over to your dashboard now and please review the documentation regarding the php code that you need to integrate within your digital goods (ie:  scripts, themes, plugins, on-wordpress and off-wordpress, etc.).

The documentation on the dashboard only consists of the php snippet you need to implement in your digital products. I will be adding further documentation, and/or videos within later updates of License Key Manager. 

The php snippet needs to be edited for each client/user. You need to add a new key first within your License Key Server, then add that key to the second line of the code on your dashboard. It looks like this: 

```
define('KEY_CODE', '000-0000-0000-0000');
```

So if you create a license key that is 123-4567-8901-234

Then the php code should look like this:

```
define('KEY_CODE', '123-4567-8901-234');
```

If you are preparing a brand new Wordpress site for a client or getting ready to sell a site and want to make sure that transaction goes through smoothly, you could place the php snippet within the wp-login.php just below the opening <?php 

You may also place the snippet within one of these files as well: 

1. wp-config.php
2. wp-load.php
3. wp-settings.php

For just plugins or themes, you probably will want to link a new function to the snippet. On other platforms, such as Drupal, Joomla, any php script - I recommend using an important file like a login or config file. 

If they don’t pay, you simply login to your License Key Server, locate their key, edit it, change its 'visibility' (on the right) from 'public' to 'private'. That will immediately disable the wp-admin to their WordPress site or whatever script you applied License Key Manager to. 

In the event you actually have to use License Key Manager and disable a clients WordPress site, one that when you implemented the php snippet you placed it within one of the core files mentioned above- their frontend still stays up upon deactivation of their key, but the backend locks down. I thought that kept the possible "losses liability" claims fairly slim since we aren't preventing web visitors from seeing the site, but only preventing any user from login to the wp-admin. 

Mark my words, you will have your money by the end of the day, if not almost instantly. Once they pay, locate their key again on the License Key Server, edit it, change it's 'visibility' from 'private' back to 'public' and that will enable their wp-admin access in real-time.

If you are having any problems with the WordPress Edition of License Key Manager, then maybe you should consider using the Php Standalone version. I've used that for years with zero problems, simply flawless, but that version could use a bath. The WordPress Edition is still brand new, so please send me your feedback so I can make sure any issues are resolved.

If you'd like to contribute to License Key Manager, please let me know: https://twitter.com/degersey. Oh btw, you need to keep an eye out for all the latest updates via this link: https://github.com/icryptic/license-key-manager
