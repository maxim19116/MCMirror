# MC Mirror
![Lines of code](https://tokei.rs/b1/github/MCMirror/MCMirror?category=code)
![Files](https://tokei.rs/b1/github/MCMirror/MCMirror?category=files)
[![Maintainability](https://api.codeclimate.com/v1/badges/961f59c5aff8d3c046df/maintainability)](https://codeclimate.com/github/MCMirror/MCMirror/maintainability)

## Support
Discord: https://discord.gg/dge38Gm

## Installation
[![PPM Compatible](https://raw.githubusercontent.com/php-pm/ppm-badge/master/ppm-badge.png)](https://github.com/php-pm/php-pm)

```
sudo apt install composer
apt-get install php7.2 php7.2-cli php7.2-xml php7.2-cgi
composer install
```

## Start
To start MCMirror locally (after you finished installation) run:


### PHP-PM
```
php vendor/bin/ppm start --bootstrap=symfony --app-env=prod --logging=0 --debug=0 --workers=20 --static-directory=public/
```
Your Self-Hosted MCMirror will be available at 127.0.0.1:8080


You can start the Website with PHP-PM, but currently it does not like the generated Container Cache. If you want to modify the PHP Code use the following instead:
```
php bin/console server:run
```

Also you can customize the server port, as example port 8080:
```
php bin/console server:run 0.0.0.0:8080
```
