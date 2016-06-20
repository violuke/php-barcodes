# PHP Barcode
A PHP class for checking EAN8, EAN13, UPC and GTIN barcodes are valid (based on check digit).

[![Packagist](https://img.shields.io/packagist/v/violuke/php-barcodes.svg?maxAge=2592000)]()
[![Packagist](https://img.shields.io/packagist/dt/violuke/php-barcodes.svg?maxAge=2592000)]()
[![Packagist](https://img.shields.io/packagist/dm/violuke/php-barcodes.svg?maxAge=2592000)]()
[![Packagist](https://img.shields.io/packagist/l/violuke/php-barcodes.svg?maxAge=2592000)]()

https://packagist.org/packages/violuke/php-barcodes

_Note: This project currently does nothing other than have some validation functions. I expect to add additional functionality in the future._

## Installation (with composer)
```
composer require violuke/php-barcodes
```

## Usage
```
// Class instantation
$barcode = '5060411950139';
$bc_validator = new \violuke\Barcodes\BarcodeValidator($barcode);


// Check barcode is in valid format
if ($bc_validator->isValid()) {
	echo 'Valid :)';
} else {
	echo 'Invalid :(';
}


// Get the barcode type
echo 'Barcode is in format of ' . $bc_validator->getType();
// Possible formats returned are:
// (string) "GTIN" which equals constant \violuke\Barcodes\BarcodeValidator::TYPE_GTIN
// (string) "EAN-8" which equals constant \violuke\Barcodes\BarcodeValidator::TYPE_EAN_8
// (string) "EAN" which equals constant \violuke\Barcodes\BarcodeValidator::TYPE_EAN
// (string) "UPC" which equals constant \violuke\Barcodes\BarcodeValidator::TYPE_UPC
// (string) "UPC Coupon Code" which equals constant \violuke\Barcodes\BarcodeValidator::TYPE_UPC_COUPON_CODE


// Returns the barcode in GTIN-14 format
$bc_validator->->getGTIN14()


// Returns the barcode as entered
$bc_validator->->getBarcode()
```

## TODO:
* Barcode generation
* GS1-128 barcode generation and interpretation

## Credits
* The barcode validation function was based on [work by Ferry Bouwhuis](http://www.phpclasses.org/package/8560-PHP-Detect-type-and-check-EAN-and-UPC-barcodes.html).