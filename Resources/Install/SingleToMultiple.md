
### Setting up Virtual Hosts

If you are using a stand alone machine to run Gibbon and your current url for Gibbon looks like ___localhost___ or ___127.0.0.1___ then you may need to read on.  

#### Changing Gibbon to a Real (fake) Host Name
If you have a standard <a href="http://www.wampserver.com/" target="_blank">WAMP</a> or <a href="https://www.digitalocean.com/community/tags/lamp-stack?type=tutorials" target="_blank">LAMP</a> installation and are running Gibbon on this server in the default setup, then we have a little work to do.

#### Changing the Gibbon Server Name.
You need to pick a name that is NOT used on the internet for your stand alone sever.  I suggest you use _gibbon.local_ for your **Gibbon** installation.  You can then use _responsive.local_ for your **Responsive** installation, when we get to that stage.  ___.local___ is not a valid internet top level (TLD) domain.

You need to find a couple of files on your server.  The virtual hosts file for Apache and the system hosts file. Open your hosts name as an administrator and add the new host name as per [Apache Stand Alone Server](/Install/ApacheStandalone.md/)

When you have added the new host name, your Gibbon installation should still be working.

The standard WAMP server adds a Virtual Host file at C:\wamp64\bin\apache\apache2.4.37\conf\extra\httpd-vhosts.conf, and it has a standard ___localhost___ section.

```apacheconfig
<VirtualHost *:80>
    ServerName localhost
    ServerAlias localhost
    DocumentRoot "${INSTALL_DIR}/www"
    <Directory "${INSTALL_DIR}/www/">
        Options +Indexes +Includes +FollowSymLinks +MultiViews
        AllowOverride All
        Require local
    </Directory>
</VirtualHost>
```
Copy this section and add it to the bottom of the virtual hosts file. (Yes, in the same file.) Edit the ServerName and ServerAlias in your copy to match your Gibbon server name you selected above.
```apacheconfig
<VirtualHost *:80>
  ServerName localhost
  ServerAlias localhost
  DocumentRoot "${INSTALL_DIR}/www"
  <Directory "${INSTALL_DIR}/www/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>


<VirtualHost *:80>
	ServerName gibbon.local
    ServerAlias gibbon.local
    DocumentRoot "${INSTALL_DIR}/www"
    <Directory "${INSTALL_DIR}/www/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```
Restart your apache server to load the new configuration.
Gibbon should still work as before, and now you should have Gibbon working at ___gibbon.local___ 

You can now add the responsive installation and setup Apache to serve both Gibbon and the new Responsive site.  [A working example of the virtual host file is available.](/Download/VirtualHosts.conf/)
