Permissions Policy
=========================

Module for easily setting web page’s permissions policy.

## Use

Just call static method “setPolicies” with associative array with valid policy types. Policy types not set will default to empty (disabled).

Call “createPolicies” to return header string rather than setting header, which can be used for testing purposes before setting header.

## Example

    use WaughJ\PermissionsPolicy\PermissionsPolicy;

    PermissionsPolicy::setPolicies
    ([
        'accelerometer' => 'self',
        'autoplay' => 'https://www.jaimeson-waugh.com',
        'camera' => [ 'self' ],
        'geolocation' => [ 'self', 'https://www.jaimeson-waugh.com' ],
        'gyroscope' => true,
        'fullscreen' => '*'
    ]);

    /*
        Will set header 'permissions-policy: permissions-policy: accelerometer=self,
        autoplay=(), camera=(self), document-domain=(), encrypted-media=(),
        fullscreen=*, geolocation=(self "https://www.jaimeson-waugh.com"),
        gyroscope=*, magnetometer=(), microphone=(), midi=(), payment=(),
        picture-in-picture=(), sync-xhr=(), usb=(), xr-spatial-tracking=()'
    */

## Changelog

### 0.1.0
* Initial Version