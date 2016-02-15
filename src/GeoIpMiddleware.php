<?php

namespace PhpMiddleware\GeoIp;

use Geocoder\Geocoder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GeoIpMiddleware
{
    const REQUEST_ATTRIBUTE = 'geoip_address_collection';

    private $ipAttributeName;
    private $geocoder;

    public function __construct(Geocoder $geocoder, $ipAttributeName)
    {
        $this->geocoder = $geocoder;
        $this->ipAttributeName = $ipAttributeName;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $ip = (string) $request->getAttribute($this->ipAttributeName);

        if (!empty($ip)) {
            $addressCollection = $this->geocoder->geocode($id);
            $request = $request->withAttribute(self::REQUEST_ATTRIBUTE, $addressCollection);
        }

        return $next($request, $response);
    }
}
