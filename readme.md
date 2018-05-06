
[![Latest Stable Version](https://poser.pugx.org/shamim/laravel-installer/v/stable)](https://packagist.org/packages/shamim/laravel-installer?format=flat-square)
[![License](https://poser.pugx.org/shamim/laravel-installer/license)](https://packagist.org/packages/shamim/laravel-installer?format=flat-square)
[![GitHub issues](https://img.shields.io/github/issues/akasham67/laravel-installer.svg?style=flat-square)](https://github.com/akasham67/laravel-installer/issues)
[![GitHub stars](https://img.shields.io/github/stars/akasham67/laravel-installer.svg?style=flat-square)](https://github.com/akasham67/laravel-installer/stargazers)

# Ultimate SMS Auto Installer

Ultimate SMS Auto Installer checks for the following things and install the application in one go.

1. Check For Server Requirements.
2. Check For Folders Permissions.
3. Ability to set database information.
4. Migrate The Database.
5. Seed The Tables.
6. Update Admin credential

## Note:
You need to have `.env` to the root

## Installation
Require this package with composer:
```
composer require shamim/laravel-installer
```


After updating composer, add the ServiceProvider to the providers array in `config/app.php`.

```
'providers' => [
    Shamim\LaravelInstaller\Providers\LaravelInstallerServiceProvider::class,
];
```

## Usage

Before using this package you need to run :
```bash
php artisan vendor:publish --provider="Shamim\LaravelInstaller\Providers\LaravelInstallerServiceProvider"
```

You will notice additional files and folders appear in your project :
 
 - `config/installer.php` : Set the requirements along with the folders permissions for your application to run, by default the array contains the default requirements for a basic Laravel app.
 - `public/installer/assets` : This folder contains a css folder and inside it you will find a `main.css` file, this file is responsible for the styling of your installer, you can override the default styling and add your own.
 - `resources/views/vendor/installer` : Contains the HTML code for your installer.
 - `resources/lang/en/installer_messages.php` : This file holds all the messages/text.

## Installing your application
- **Install:** In order to install your application, go to the `/install` url and follow the instructions.
## Screenshots
 
## Credits
[Laravel Installer](https://github.com/Froiden/laravel-installer)
