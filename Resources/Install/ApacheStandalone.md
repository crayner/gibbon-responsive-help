##Apache 2.4 Virtual Host Configuration on a Standalone Machine

### Responsive Virtual Host Configuration on a Standalone Machine

Configuring Apache for more that one website on the same host is bread and butter for hosting companies.  But if you are trying to get a multi-website machine working for the first time it can cause your head to explode.

So, this information is for those who struggle to find the key to a successfully implementation of multiple sites on your host machine.

#### Named Server Hosts
The following configuration works if the internet, or your school intranet, or your machine knows the details about where to find _responsive.myschool.edu_ and _gibbon.myschool.edu_. I will only deal with the local machine here, as your local intranet and internet settings need handling in DNS, beyond the scope of this article and for an IT trained person to handle.

A full example copy of the virtual host conf file can be [downloaded here](/Download/VirtualHosts.conf/).

```apacheconfig
<VirtualHost *:80>
	ServerName responsive.myschool.edu
	DocumentRoot "C:/wamp64/www/responsive/public"
    ...
</VirtualHost>

<VirtualHost *:80>
	ServerName gibbon.myschool.edu
	DocumentRoot "C:/wamp64/www/gibbon"
    ...
</VirtualHost>
```

On your local machine find the ___hosts___ file.  In both cases, (windows and linux,) the file must be edited as an administrator (super user.) 
* Windows: __C:\Windows\System32\drivers\etc\hosts__ 
* Most Linux varieties: /etc/hosts
* Mac OS: /etc/hosts

The standard windows host file looks like:
```text
# Copyright (c) 1993-2009 Microsoft Corp.
#
# This is a sample HOSTS file used by Microsoft TCP/IP for Windows.
#
# This file contains the mappings of IP addresses to host names. Each
# entry should be kept on an individual line. The IP address should
# be placed in the first column followed by the corresponding host name.
# The IP address and the host name should be separated by at least one
# space.
#
# Additionally, comments (such as these) may be inserted on individual
# lines or following the machine name denoted by a '#' symbol.
#
# For example:
#
# 102.54.94.97 rhino.acme.com # source server
# 38.25.63.10 x.acme.com # x client host

# localhost name resolution is handled within DNS itself.
#	127.0.0.1 localhost
#::1 localhost

127.0.0.1	localhost
::1 localhost
```
Add the two hosts names to this file, save and your done.  The file will then look like:
```text
# Copyright (c) 1993-2009 Microsoft Corp.
#
# This is a sample HOSTS file used by Microsoft TCP/IP for Windows.
#
# This file contains the mappings of IP addresses to host names. Each
# entry should be kept on an individual line. The IP address should
# be placed in the first column followed by the corresponding host name.
# The IP address and the host name should be separated by at least one
# space.
#
# Additionally, comments (such as these) may be inserted on individual
# lines or following the machine name denoted by a '#' symbol.
#
# For example:
#
# 102.54.94.97 rhino.acme.com # source server
# 38.25.63.10 x.acme.com # x client host

# localhost name resolution is handled within DNS itself.
#	127.0.0.1 localhost
#::1 localhost

127.0.0.1	localhost
::1 localhost

127.0.0.1	gibbon.myschool.edu
::1 gibbon.myschool.edu

127.0.0.1	responsive.myschool.edu
::1 responsive.myschool.edu
```
This will then allow your local machine to find the two different websites.  Your done.