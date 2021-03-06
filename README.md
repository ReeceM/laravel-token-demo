# Custom API Token authentication for Laravel

This is the demo repo for the associated dev.to article and tutorial.

Please find it here on dev.to, [Custom Token Authentication for Laravel](https://dev.to/reecem/custom-token-authentication-for-laravel-2aml)

## About

This demo application has the token authentication methods described in the tutorial so that you are able to get a running test up and going if you just want to see it in action.

The authentication method behind this app is that you get the API token and it is only visible once off as the hash of that token is stored in the database. This makes it that only one person would have that token.

The method for authenticating the users tokens actually extends the default Laravel token auth.

## Installation

You can install the package via composer:

```bash
git clone https://github.com/ReeceM/laravel-token-demo.git
```

Then you want to install the composer files:

```bash
composer install
```

Make sure you have a database and settings like the dev.to article explains then run:

```bash
php artisan migrate
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email zsh.rce@gmail.com instead of using the issue tracker.

## Credits

- [ReeceM](https://github.com/ReeceM)
- [All Contributors](../../contributors)

## Support

<a href="https://www.buymeacoffee.com/ReeceM" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/S6S7UQ66)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
