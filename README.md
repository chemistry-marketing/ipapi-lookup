# ipapi-lookup

**Perform IP lookups using the [ipapi.co](https://ipapi.co) service**

[![Latest Stable Version](https://poser.pugx.org/seymourlabs/ipapi-lookup/version.png)](https://packagist.org/packages/seymourlabs/ipapi-lookup)
[![Total Downloads](https://poser.pugx.org/seymourlabs/ipapi-lookup/d/total.png)](https://packagist.org/packages/seymourlabs/ipapi-lookup)

## Installation

This library is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "seymourlabs/ipapi-lookup": "~1.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage

Using the library;

    require('vendor/autoload.php');
    
    $client = new \Seymourlabs\ipapi\Client('8.8.8.8');
    $response = $client->request();
    
    $ip = $response->getIp();
    $city = $response->getCity();
    $region = $response->getRegion();
    $country = $response->getCountry();
    $postal = $response->getPostal();
    $latitude = $response->getLatitude();
    $longitude = $response->getLongitude();
    $timezone = $response->getTimezone();
    $asn = $response->getAsn();
    $org = $response->getOrg();

Using a paid key with the service;

    $client = new \Seymourlabs\ipapi\Client('8.8.8.8', 'myKey');