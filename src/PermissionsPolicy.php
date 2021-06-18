<?php

declare( strict_types = 1 );
namespace WaughJ\PermissionsPolicy;

class PermissionsPolicy
{
    static public function setPolicies( array $policies = [] ) : void
    {
        header( self::createPolicies( $policies ) );
    }

    static public function createPolicies( array $policies = [] ) : string
    {
        return 'permissions-policy: ' . implode
        (
            ', ',
            array_map
            (
                function( string $name ) use ( $policies ) : string
                {
                    $policyValue = '()';
                    if ( array_key_exists( $name, $policies ) )
                    {
                        if ( is_array( $policies[ $name ] ) )
                        {
                            $policyValue = '(' . implode( ' ', array_map( [ self::class, 'format' ], $policies[ $name ] ) ) . ')';
                        }
                        else if ( $policies[ $name ] === '*' || $policies[ $name ] === true )
                        {
                            $policyValue = '*';
                        }
						else if ( is_string( $policies[ $name ] ) && $policies[ $name ] )
						{
							$policyValue = self::format( $policies[ $name ] );
						}
                    }
                    return "$name=$policyValue";
                },
                self::VALID_POLICIES
            )
        );
    }

	static private function format( string $policy ) : string
	{
		return ( $policy ) === 'self' ? $policy : '"' . ( string )( $policy ) . '"';
	}

	private const VALID_POLICIES =
    [
		"accelerometer",
		"autoplay",
		"camera",
		"document-domain",
		"encrypted-media",
		"fullscreen",
		"geolocation",
		"gyroscope",
		"magnetometer",
		"microphone",
		"midi",
		"payment",
		"picture-in-picture",
		"sync-xhr",
		"usb",
		"xr-spatial-tracking"
	];
}
