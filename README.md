# Zencule Cookie Banner

A modern, customizable cookie consent banner for Laravel and Statamic applications. Built with Alpine.js and Tailwind CSS.

![License](https://img.shields.io/github/license/zencule/cookie-banner)

## Features

- 🎨 Modern, responsive design with Tailwind CSS
- ⚡ Smooth animations with Alpine.js
- 📊 Google Analytics integration
- 🔒 GDPR-compliant with essential/all cookies options
- 🎯 Works with both Laravel and Statamic
- ⚙️ Fully customizable through config

## Installation

You can install the package via composer:

```bash
composer require zencule/cookie-banner
```

### Laravel

The package will automatically register its service provider.

Publish the configuration file:

```bash
php artisan vendor:publish --tag=cookie-banner
```

### Statamic

The package will automatically register as a Statamic addon.

Publish the configuration file:

```bash
php artisan vendor:publish --tag=cookie-banner
```

## Usage

### Laravel

Add the cookie banner to your layout file:

```php
@include('cookie-banner::banner')
```

### Statamic

Add the cookie banner to your layout file:

```antlers
{{ zencule:cookie-banner }}
```

## Configuration

Configure the banner in `config/cookie-banner.php`:

```php
return [
    'privacy_policy_url' => env('COOKIE_BANNER_PRIVACY_URL', '/privacy-policy'),
    
    'analytics_id' => env('COOKIE_BANNER_ANALYTICS_ID', ''),
    
    'messages' => [
        'banner_text' => 'We use cookies to improve your experience...',
        'essential_button' => 'Essential Only',
        'accept_button' => 'Accept All',
        'more_info' => 'More Information',
    ],
];
```

## Customization

### Styling

The banner uses Tailwind CSS classes by default. You can customize the appearance by:

1. Publishing the views:
```bash
php artisan vendor:publish --tag=cookie-banner
```

2. Modifying the templates in:
   - Laravel: `resources/views/vendor/cookie-banner/blade/banner.blade.php`
   - Statamic: `resources/views/vendor/cookie-banner/antlers/banner.antlers.html`

### Analytics

By default, the package supports Google Analytics. Set your Analytics ID in your `.env` file:

```env
COOKIE_BANNER_ANALYTICS_ID=G-XXXXXXXXXX
```

The script will only load after the user accepts all cookies.

## Requirements

- PHP 8.1 or higher
- Laravel 10.0 or higher
- Statamic 4.0 or higher (for Statamic integration)
- Alpine.js
- Tailwind CSS

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email security@zencule.com instead of using the issue tracker.

## Credits

- [Zencule](https://github.com/zencule)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. 