# Laravel Fillable Validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maize-tech/laravel-fillable-validation.svg?style=flat-square)](https://packagist.org/packages/maize-tech/laravel-fillable-validation)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/maize-tech/laravel-fillable-validation/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/maize-tech/laravel-fillable-validation/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/maize-tech/laravel-fillable-validation/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/maize-tech/laravel-fillable-validation/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/maize-tech/laravel-fillable-validation.svg?style=flat-square)](https://packagist.org/packages/maize-tech/laravel-fillable-validation)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require maize-tech/laravel-fillable-validation
```

## Usage

```php
<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Maize\FillableValidation\HasFillableValidation;

class Article extends Model
{
    use HasFillableValidation;

    protected array $rules = [
        'title' => 'required|string',
        'body' => 'required|string',
        'status' => [Rule::enum(Status::class)],
    ];
}

Article::create([
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'status' => Status::draft
]); // fail: missing title

$article = Article::create([
    'title' => 'Laravel package',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'status' => Status::draft
]);

$article->update([
    'title' => 'Laravel validation',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'status' => Status::draft
]);

$article->update([
    'title' => 'Laravel validation',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'status' => null
]); // fail: invalid status


<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Maize\FillableValidation\HasFillableValidation;

class Article extends Model implements WithoutAutoValidation
{
    use HasFillableValidation;

    protected array $rules = [
        'title' => 'required|string',
        'body' => 'required|string',
        'status' => [Rule::enum(Status::class)],
    ];
}

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Enrico De Lazzari](https://github.com/enricodelazzari)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
