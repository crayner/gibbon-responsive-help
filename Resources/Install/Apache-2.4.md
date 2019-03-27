#Gibbon Responsive 
###Apache 2.4 Virtual Host Configuration

#### Responsive (Mobile) Virtual Host File

This site configuration can be added to the __http-vhost.conf__ file in the __extra__ directory of your Apache conf directory.  On your server you will need to change the "F:/websites/crayner/" to you web server path.  (e.g. Linux, /var/www/)

__NB: If you use this configuration, you will not need any .htaccess files in your installation.__

```
<VirtualHost *:80>
	ServerName mobile.myschool.edu
	DocumentRoot "f:/websites/crayner/mobile/public"
	<Directory  "f:/websites/crayner/mobile/public/">
		DirectoryIndex index.php
		AllowOverride All
		Require all granted

		Options FollowSymlinks

		# Disabling MultiViews prevents unwanted negotiation, e.g. "/index" should not resolve
		# to the front controller "/index.php" but be rewritten to "/index.php/index".
		<IfModule mod_negotiation.c>
			Options -MultiViews
		</IfModule>

		<IfModule mod_rewrite.c>
			RewriteEngine On

			# Determine the RewriteBase automatically and set it as environment variable.
			# If you are using Apache aliases to do mass virtual hosting or installed the
			# project in a subdirectory, the base path will be prepended to allow proper
			# resolution of the index.php file and to redirect to the correct URI. It will
			# work in environments without path prefix as well, providing a safe, one-size
			# fits all solution. But as you do not need it in this case, you can comment
			# the following 2 lines to eliminate the overhead.
			RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
			RewriteRule ^(.*) - [E=BASE:%1]

			# Sets the HTTP_AUTHORIZATION header removed by Apache
			RewriteCond %{HTTP:Authorization} .
			RewriteRule ^ - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

			# Redirect to URI without front controller to prevent duplicate content
			# (with and without `/index.php`). Only do this redirect on the initial
			# rewrite by Apache and not on subsequent cycles. Otherwise we would get an
			# endless redirect loop (request -> rewrite to front controller ->
			# redirect -> request -> ...).
			# So in case you get a "too many redirects" error or you always get redirected
			# to the start page because your Apache does not expose the REDIRECT_STATUS
			# environment variable, you have 2 choices:
			# - disable this feature by commenting the following 2 lines or
			# - use Apache >= 2.3.9 and replace all L flags by END flags and remove the
			#   following RewriteCond (best solution)
			RewriteCond %{ENV:REDIRECT_STATUS} ^$
			RewriteRule ^index\.php(?:/(.*)|$) %{ENV:BASE}/$1 [R=301,L]

			# If the requested filename exists, simply serve it.
			# We only want to let Apache serve files and not directories.
			RewriteCond %{REQUEST_FILENAME} -f
			RewriteRule ^ - [L]

			# Rewrite all other queries to the front controller.
			RewriteRule ^ %{ENV:BASE}/index.php [L]
		</IfModule>

		<IfModule !mod_rewrite.c>
			<IfModule mod_alias.c>
				# When mod_rewrite is not available, we instruct a temporary redirect of
				# the start page to the front controller explicitly so that the website
				# and the generated links can still be used.
				RedirectMatch 307 ^/$ /index.php/
				# RedirectTemp cannot be used instead
			</IfModule>
		</IfModule>
				
		<FilesMatch "(?<!index)\.php">
			Require all denied
		</FilesMatch>
	</Directory>
	<Directory  "f:/websites/crayner/mobile/public/build">
		Require all denied
		<FilesMatch ".+\.(gif|jpe?g|png|js|css|svg)$">
			Require all granted
		</FilesMatch>
	</Directory>
	<Directory  "f:/websites/crayner/mobile/public/bundles">
		Require all denied
		<FilesMatch ".+\.(gif|jpe?g|png|js|css|svg)$">
			Require all granted
		</FilesMatch>
	</Directory>
	<Directory  "f:/websites/crayner/mobile/public/js">
		Require all denied
		<FilesMatch (js)$>
			Require all granted
		</FilesMatch>
	</Directory>
	<Directory  "f:/websites/crayner/mobile/public/css">
		Require all denied
		<FilesMatch (css)$>
			Require all granted
		</FilesMatch>
	</Directory>
    ErrorLog f:/websites/crayner/logs/mobile_error.log
    CustomLog f:/websites/crayner/logs/mobile_access.log combined
</VirtualHost>

```
