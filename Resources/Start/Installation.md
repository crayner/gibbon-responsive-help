#Gibbon Mobile

This package is aimed at provision of responsive design for mobiles and tablets for core features of the Gibbon Education programme.

###Version 0.0.06

[Version 0.0.06 for Gibbon 17.0.00](/Download/Gibbon-Mobile.0.0.06.zip/)

[Version Information](/Start/Version/)

###Installation

####Server Requirements

1.  Apache 2.2/2.4 or Nginx 1.12+
2.  PHP 7.2 or above (with PDO, gettext, CURL, zip, xml and gd.)
    1. Recommended to turn display_errors off.
    2. Currently Gibbon v17 supports PHP 7.0-7.2, but this software requires PHP 7.2+
    3. Recommended for caching __OPCache__ and __APCu__.
3.  MySQL 5.6+ or MariaDB 10.2+ (collation set to utf8_general_ci)
4.  Gibbon 17.0.00+
5.  As you are dealing with sensitive data over an open communication system, I recommend that all communication to Gibbon and Gibbon Mobile be made using https communication protocol (SSL).  This will require a yearly cost for an appropriate security certificate or two.  Speak to your server provider or your ICT support people for how to do this important step. 

#### File Structure
Create your directory on your server to hold the Gibbon Mobile Project, then changege to that directory.  The directory should NOT be inside your Gibbon installation.  So you may have a directory structure like:

* var
    * www
        * html
        * gibbon
        
then you would add another directory called 'mobile' to the www directory.  In this case the Gibbon Document Root is __/var/www/gibbon__  and the Gibbon Mobile directory would be __/var/www/mobile__ and the Gibbon Mobile document root would be __/var/www/mobile/public__  
The package comes with a .htaccess file in the public directory, so your virtualhost configuration should point your Gibbon Mobile domain name to to the document root of the mobile installation.

* var
    * www
        * html
        * gibbon
        * mobile
        
If your school runs the gibbon software with the school website, then in this example the following would be appropriate expectation of the final result:

| Domain Type          | Host URL                    | Document Root          |
|----------------------|-----------------------------|------------------------|
| School Domain        | http://www.myschool.edu/    | /var/www/html          |
| Gibbon Domain        | http://gibbon.myschool.edu/ | /var/www/gibbon        |
| Gibbon Mobile Domain | http://mobile.myschool.edu/ | /var/www/mobile/public |

Details for setting up __Apache__ or __Nginx__ web servers can be found at [Configuring a Web Server](https://symfony.com/doc/current/setup/web_server_configuration.html)

Select the method you wish to use to install Gibbon Mobile.

*   [Composer Installation](/Install/Composer/)
*   [Developer Installation](/Install/Developer/)
*   [Production Installation](/Install/Production/)