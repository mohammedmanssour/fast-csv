# Fast CSV

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mohammedmanssour/fast-csv.svg?style=flat-square)](https://packagist.org/packages/mohammedmanssour/fast-csv)
[![Tests](https://img.shields.io/github/actions/workflow/status/mohammedmanssour/fast-csv/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mohammedmanssour/fast-csv/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/mohammedmanssour/fast-csv.svg?style=flat-square)](https://packagist.org/packages/mohammedmanssour/fast-csv)

Fast, Memory-light, CSV Importer/Exporter that provide better testing experience

## Installation

You can install the package via composer:

```bash
composer require mohammedmanssour/fast-csv
```

## Usage

### Exporting data to csv file

```php
FastCSV::exporter()
    ->header(["One", "Two", "Three"])
    // data can be an array or any object that implements that iterator pattern
    ->data([
        ["Line 1: One", "Line 1: Two", "Line 1: Three"],
        ["Line 2: One", "Line 2: Two", "Line 2: Three"],
    ])
    ->toFile(__DIR__ . '/some.csv') // the target file
    ->export();
```

## Testing

```bash
composer test
```

## Credits

-   [Mohammed Manssour](https://github.com/mohammedmanssour)
-   [All Contributors](../../contributors)
