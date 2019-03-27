#Gibbon Responsive 

###Installation using Composer
Installation using Composer require you to have Composer installed on your system.  Install composer on your PHP server is relatively easy with [comprehensive Composer instructions](https://getcomposer.org/doc/00-intro.md) available.

Change to your web directory, one level above where your Gibbon install currently is, and where your new Mobile installation will be installed.  The commands below will create a new directory if it does not exist.

```
cd /var/www

composer create-project crayner/gibbon-mobile <your-mobile-directory> ^0.0.* --stability dev
composer create-project crayner/gibbon-mobile mobile ^0.0.* --stability dev

```
In this example the Mobile document root will be __/var/www/mobile/public__

On an Apache system, create your sub-domain for Gibbon Responsive  by pointing to the mobile document root and you should be ready to go.  If you are using Apache 2.4, ensure that you edit the .htaccess file as per the instructions within the .htaccess file.  If you are using other server technology, then the [Symfony Server Setup Document](https://symfony.com/doc/current/setup/web_server_configuration.html) will be helpful.

The composer installation runs a number of scripts using best guess algorithms to find the Gibbon Installation.  If successful, then the Mobile Installation will be ready to use when composer completes.