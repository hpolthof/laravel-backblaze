# Backblaze B2 Cloud Storage for Laravel 5

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hpolthof/laravel-backblaze.svg?style=flat-square)](https://packagist.org/packages/hpolthof/laravel-backblaze)
[![Total Downloads](https://img.shields.io/packagist/dt/hpolthof/laravel-backblaze.svg?style=flat-square)](https://packagist.org/packages/hpolthof/laravel-backblaze)

Backblaze B2 is a great cloud storage system that compares to Amazon S3, but uses lower pricing, so worth the try. ;-)
Since I couldn't find a serviceprovider to implement B2 into the Laravel Filesystem, I wrote one myself. 
Feel free to use it.
 
## Installation
Via Composer
```
composer require hpolthof/laravel-backblaze
```

### Auto-discovery
By default auto-discovery is disabled. If you want the add this package manually or
if you are using Laravel < 5.5, then you should add the ServiceProvider manually.

In your app.php config file add to the list of service providers:
```
\Hpolthof\Backblaze\BackblazeServiceProvider::class,
```

Add the following to your filesystems.php config file in the ```disks``` section:
```
'b2' => [
    'driver'         => 'b2',
    'accountId'      => env('B2_ACCOUNT_ID'),
    'applicationKey' => env('B2_APP_KEY'),
    'bucketName'     => env('B2_BUCKET'),
],
```

Now just add your credentials and bucketname into your `.env` file and you're ready to go!

```
B2_ACCOUNT_ID=
B2_APP_KEY=
B2_BUCKET=
```

## Usage
Just use it as you normally would use the Storage facade.
```
\Storage::disk('b2')->put('test.txt', 'test')
```
and
```
\Storage::disk('b2')->get('test.txt')
```

## Credits
* [Paul Olthof](https://github.com/hpolthof)
* [Ramesh Mhetre](https://github.com/mhetreramesh/flysystem-backblaze)
* [Chris White](https://github.com/cwhite92/b2-sdk-php)

## License
MIT