# laravel-options
Key - Value Database Storage.

## Install
`composer require dividebuy/laravel-options`

### Migrations
Run `php artisan vendor:publish --provider="DivideBuy\LaravelOptions\LaravelOptionsServiceProvider"` in your project to publish the migrations. 

You can then run `php artisan migrate` to add the options table to your database

## Usage
Instant Key Value Storage in the database.

You can use the helpers to access and set option data:
```php
get_option('optionKey', 'defaultValue'); //returns the value loaded from the database or the default value provided

set_option('optionKey', 'valueToSet'); //returns the value on save

option_exists('optionKey'); //Boolean check to see if an option exists
```

Alternatively you can use the Facade Alias
```php
use DBOptions;

DBOptions::get($key, $defaultValue);
DBOptions::set($key, $newValue);
DBOptions::exists($key);
DBOptions::remove($key);
```

Setting a value to a key will overwrite the key if it exists or create a new key.

## Testing
Run the tests with:

``` bash
composer test
```

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security-related issues, please email david.sivocha@dividebuy.co.uk instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.