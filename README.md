# geo-ip middleware
Geo IP PSR-7 middleware

Recognize location by IP from ServerRequest attribute and set `geoip_address_collection` attribute with `\Geocoder\Model\AddressCollection` instance.

Works great with [akrabat/rka-ip-address-middleware](https://github.com/akrabat/rka-ip-address-middleware).