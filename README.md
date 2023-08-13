Pretty File Name
====
This library generates pretty, clean, user friendly, unique and well formatted file name. 

[![Total Downloads](http://poser.pugx.org/salmanbe/filename/downloads)](https://packagist.org/packages/salmanbe/filename)
[![License](http://poser.pugx.org/salmanbe/filename/license)](https://github.com/salmanbe/filename/blob/master/LICENSE)

Video Tutorial
-------
[![Laravel Filename](https://img.youtube.com/vi/S0qK0HYcLjw/0.jpg)](https://www.youtube.com/watch?v=S0qK0HYcLjw)

Laravel Installation
-------
Install using composer:
```bash
composer require salmanbe/filename
```

There is a service provider included for integration with the Laravel framework. This service should automatically be registered else to register the service provider, add the following to the providers array in `config/app.php`:

```php
Salmanbe\FileName\FileNameServiceProvider::class,
```
You can also add it as a Facade in `config/app.php`:
```php
'Filename' => Salmanbe\FileName\FileName::class,
```
Basic Usage
-----

Add `use Salmanbe\FileName\FileName;` or `use FileName;` at top of the class where you want to use it.

```php
$filename = 'visa-_ application With fréé.PNG';
```
```php
echo FileName::get($filename);  // visa-application-with-free-2021-02-16-001454.png
```
Options
-----
You can generate configuration file by `php artisan vendor:publish` command. Global file name generation options can be defined in it. However, you can override options by adding additional array parameter.

Timestamp
-----
```php
echo FileName::get($filename, ['timestamp' => 'Y-m-d']]);
```
You can override default timestamp format that is placed at the end of file name before extension.

Slugify
-----
```php
echo FileName::get($filename, ['slugify' => true]]);
```
Removes special characters from file name.

Limit
-----
```php
echo FileName::get($filename, ['limit' => 200]]);
```
Limit the total number of characters in file name to avoid very long file name. Default recommended maximum limit is 240.

Separator
-----
```php
echo FileName::get($filename, ['separator' => '_']]);
```
You can specify the separator between file name words. Default separator is '-'.

Uppercase
-----
```php
echo FileName::get($filename, ['uppercase' => true]]);
```
File name is generated by default in lower case. However, you can use this option to generate file name in upper case.

All Options
-----
```php
echo FileName::get($filename, [
            'limit' => 200,
            'timestamp' => date('d-m-Y-His'),
            'slugify' => true,
            'separator' => '-',
            'uppercase' => true
    ]);
```
Global Configuration
-----
Run `php artisan vendor:publish --provider="Salmanbe\FileName\FileNameServiceProvider"` to publish configuration file.

```php
'timestamp' => 'Y-m-d-His',
```
If set to false then no timestamp will be added at the end of file name. It is possible to change the timestamp format. This value can be overridden when calling the function.

```php
'limit' => 225,
```
If set to false then by default first 225 characters will be used. This value can be overridden when calling the function.
```php
'slugify' => true,
```
If set to true then special characters will be removed from the file name. This value can be overridden when calling the function.
```php
'separator' => '-',
```
If set then it will be used as separator between file name words. This value can be overridden when calling the function.
```php
'uppercase' => false,
```
If set to true then file name will be in uppercase else lowercase. This value can be overridden when calling the function.

Uninstall
-----
First remove `Salmanbe\FileName\FileNameServiceProvider::class,` and 
`'Filename' => Salmanbe\FileName\FileName::class,` from `config/app.php` if it was added.
Then Run `composer remove salmanbe/filename` 

## License

Laravel Perfect Filename is licensed under THE MIT License. Please see [License File](https://github.com/salmanbe/filename/blob/master/LICENSE) for more information.

## Security contact information

To report a security vulnerability, follow [these steps](https://tidelift.com/security).
