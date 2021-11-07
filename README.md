[![Latest Version on Packagist](https://img.shields.io/packagist/v/storewid/tigopesa.svg?style=flat-square)](https://packagist.org/packages/storewid/tigopesa)
[![Total Downloads](https://img.shields.io/packagist/dt/storewid/tigopesa.svg?style=flat-square)](https://packagist.org/packages/storewid/tigopesa)
![GitHub Actions](https://github.com/storewid/tigopesa/actions/workflows/main.yml/badge.svg)

## Installation

## Version Matrix

| Version | PHP Version     |
| ------- | --------------- |
| 1.0.0   | >= 8.0          |
| 1.0.1   | >= 7.3 >= 8.0   |
| 1.0.2   | >= 7.2.5 >= 8.0 |

You can install the package via composer:

```bash
composer require storewid/tigopesa
```

## Usage

This is unpinionated tigopesa php library .

```php
<?php

namespace App\Http\Controllers;

use BillMe;
use Illuminate\Http\Request;
use Epmnzava\LocationDemografia\Models\Country;
use Epmnzava\LocationDemografia\Models\State;
use Epmnzava\Bulksms\Bulksms;
use Epmnzava\Telerivet\Telerivet;
use Epmnzava\Tigosecure\Tigosecure;
use Spatie\SslCertificate\SslCertificate;
use Storewid\Tigopesa;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function transaction(){


            //instatiate
         $payment=new Tigopesa($endpoint,$clientid,
        $clientsecret,
        $account_number,
        $pin,
        $account_id,
        $redirect_url,
        $callback_url,
        $lang,
        $currency);


        $response=$payment->processpayment("emmanuel","mnzava","devs@storewid.com",4000,"48fhldplofhf".rand(5,100));


        return redirect($response->redirectUrl);

    }

```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email devs@storewid.com instead of using the issue tracker.

## Credits

- [storewid](https://github.com/storewid)
- [All Contributors](../../contributors)
- [Emmanuel Mnzava](https://github.com/dbrax)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
