# Lite Blog

## Demo
Try a live demo [here](https://lite-blog.timothyclark.co.uk)
Note: This demo may be updated before releases (and sometimes even this repo)

## Install
* Unzip in web server directory
* Configure server (NGINX file provided)
* Navigate to server, you'll see the homepage!

## Permissions
Ensure permissions are set
```
sudo chmod 775 lite-blog -R
sudo chown www-data:www-data lite-blog -R
```
(*www-data* can be any webserver/PHP user)
