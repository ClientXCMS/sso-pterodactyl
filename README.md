[![Latest Version on Packagist](https://img.shields.io/packagist/v/clientxcms/sso-pterodactyl.svg?style=flat-square)](https://packagist.org/packages/clientxcms/sso-pterodactyl)
[![Total Downloads](https://img.shields.io/packagist/dt/clientxcms/sso-pterodactyl.svg?style=flat-square)](https://packagist.org/packages/clientxcms/sso-pterodactyl)

# Laravel SSO

Laravel SSO is a package for implementing Single Sign-On (SSO) authorizations in your Laravel project. This package allows you to authorize users on a Laravel panel from another website.

## Requirements

- PHP 8.0 or higher
- Laravel 10 or higher

## Installation

To install the package, use Composer:

```bash
composer require clientxcms/sso-pterodactyl
```

## Configuration
1. Publish the configuration file by running the following command:
```bash
php artisan vendor:publish --tag=sso-clientxcms
```
This command will publish the config/sso-clientxcms.php file, where you can set the secret key for SSO authorization.

2. Generate new SSO key
```shell
php artisan clientxcms:generate
```

3. Clear the configuration cache to ensure the new settings are applied:
```bash
php artisan route:clear
```
4. Add the SSO key to your `.env` file in your clientxcms application by adding the following line:
```env
SSO_CLIENTXCMS_KEY{SERVER_ID}=your_secret_key_here
```
with `{SERVER_ID}` being the ID of the server you want to connect to. For example, if your server ID is `1`, you would add:
```env
SSO_CLIENTXCMS_KEY1=your_secret_key_here
```
If you are using Cloud platforms you can add metadata to your CLIENTXCMS server to set the SSO key:
Key: `sso_key`
Value: `your_secret_key_here`
4. You can now use the SSO key in your application to authenticate users.
## Usage

1. Generate a access token for using a GET request from your application
2. Redirect the user to the SSO redirect with their token
After being redirected to the /sso-login route, the user will be automatically authorized on the Laravel panel if their email address matches a record in the database.

## Support

If you have any questions or issues, please create a new issue in the project repository on GitHub.

## License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/GIGABAIT93/LaravelSso/blob/main/LICENSE) file for details.
