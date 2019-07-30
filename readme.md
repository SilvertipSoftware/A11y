# A11y

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require silvertip/a11y
```

## Usage
In your your Laravel project's `AppServiceProvider.php`, add a `Browser::mixin` to the `boot()` method:

```php
    public function boot() {
        ...

        if ($this->app->environment('local', 'testing')) {
            Browser::mixin(new \Silvertip\A11y\BrowserMixins);
        }

        ...
    }
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email andre@silvertipsoftware.com instead of using the issue tracker.

## Credits

- [Andre Sonnichsen][link-author]
- [All Contributors][link-contributors]

## License

WTFPL. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/silvertip/a11y.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/silvertip/a11y.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/silvertip/a11y
[link-downloads]: https://packagist.org/packages/silvertip/a11y
[link-author]: https://github.com/silvertip
[link-contributors]: ../../contributors
