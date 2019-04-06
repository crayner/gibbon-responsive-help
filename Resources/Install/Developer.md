### Developer Installation
Gibbon Responsive is written using the Symfony Framework and Facebook React. 

Developers should install directly from the Git hub repository <a href="https://github.com/crayner/Gibbon-Responsive" target="_blank">Gibbon Responsive</a>.  For true development, the repository should be forked to your own Github account, and the links below would change appropriately to reflect the use of your own Github account.

__You will need__
- <a href="https://www.linode.com/docs/development/version-control/how-to-install-git-on-linux-mac-and-windows/" target="_blank">git</a>
- <a href="https://getcomposer.org/doc/00-intro.md" target="_blank">composer</a>
- <a href="https://yarnpkg.com/lang/en/docs/install/" target="_blank">yarn</a>

Change to your web directory, one level above where your Gibbon install currently is, and where your new Mobile installation will be installed.  The commands below will create a new directory if it does not exist.

```

cd /var/www

git clone https://github.com/crayner/Gibbon-Responsive.git responsive
git clone https://github.com/<your Github account>/Gibbon-Responsive.git responsive

cd responsive
composer install

```
In this example the responsive document root will be __/var/www/responsive/public__

On an Apache system, create your sub-domain for Gibbon Responsive  by pointing to the mobile document root and you should be ready to go.  If you are using Apache 2.4, ensure that you edit the .htaccess file as per the instructions within the .htaccess file.  If you are using other server technology, then the [Symfony Server Setup Document](https://symfony.com/doc/current/setup/web_server_configuration.html) will be helpful.

The composer installation runs a number of scripts using best guess algorithms to find the Gibbon Installation.  If successful, then the Mobile Installation will be ready to use when composer completes.