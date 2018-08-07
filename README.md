# Lite Blog

## Demo
Try a live demo [here](https://lite-blog.timothyclark.co.uk)

Note: This demo may be updated before releases (and sometimes even this repo)

## Install
[Stable-ish](https://github.com/TheCoolBlackCat/lite-blog/releases)
[Bleeding Edge](https://github.com/TheCoolBlackCat/lite-blog.git)

1. Unzip in web server directory
2. Configure server (NGINX file provided)
3. Navigate to server, you'll see the homepage!

## Permissions
Ensure permissions are set
```
sudo chmod 775 lite-blog -R
sudo chown www-data:www-data lite-blog -R
```
(*www-data* can be any webserver/PHP user)
