#Gibbon Mobile

###Developer Installation
Developers should install directly from the Git hub repository [Gibbon Mobile](https://github.com/crayner/Gibbon-Mobile).  For true development, the repository should be forked to your own Github account, and the links below would change appropriately to reflect the use of your own Github account.

__You will need both [git](https://www.linode.com/docs/development/version-control/how-to-install-git-on-linux-mac-and-windows/) and [composer](https://getcomposer.org/doc/00-intro.md) to be installed on your server.__

Change to your web directory, one level above where your Gibbon install currently is, and where your new Mobile installation will be installed.  The commands below will create a new directory if it does not exist.

```

cd /var/www

git clone https://github.com/crayner/Gibbon-Mobile.git mobile
git clone https://github.com/<your Github account>/Gibbon-Mobile.git mobile

cd mobile
composer install

```
In this example the Mobile document root will be __/var/www/mobile/public__

On an Apache system, create your sub-domain for Gibbon Mobile by pointing to the mobile document root and you should be ready to go.  If you are using Apache 2.4, ensure that you edit the .htaccess file as per the instructions within the .htaccess file.  If you are using other server technology, then the [Symfony Server Setup Document](https://symfony.com/doc/current/setup/web_server_configuration.html) will be helpful.

The composer installation runs a number of scripts using best guess algorithms to find the Gibbon Installation.  If successful, then the Mobile Installation will be ready to use when composer completes.