<?php

declare( strict_types = 1 );

use PHPUnit\Framework\TestCase;
use WaughJ\PermissionsPolicy\PermissionsPolicy;

class PermissionsPolicyTest extends TestCase
{
	public function testBasic() : void
	{
		$policies = PermissionsPolicy::createPolicies();
		$this->assertEquals
		(
			'permissions-policy: accelerometer=(), autoplay=(), camera=(), document-domain=(), encrypted-media=(), fullscreen=(), geolocation=(), gyroscope=(), magnetometer=(), microphone=(), midi=(), payment=(), picture-in-picture=(), sync-xhr=(), usb=(), xr-spatial-tracking=()',
			$policies
		);
	}

	public function testMain() : void
	{
		$policies = PermissionsPolicy::createPolicies([ 'accelerometer' => 'self', 'autoplay' => 'https://www.jaimeson-waugh.com', 'camera' => [ 'self' ], 'geolocation' => [ 'self', 'https://www.jaimeson-waugh.com' ], 'gyroscope' => true, 'fullscreen' => '*' ]);
		$this->assertEquals
		(
			'permissions-policy: accelerometer=self, autoplay="https://www.jaimeson-waugh.com", camera=(self), document-domain=(), encrypted-media=(), fullscreen=*, geolocation=(self "https://www.jaimeson-waugh.com"), gyroscope=*, magnetometer=(), microphone=(), midi=(), payment=(), picture-in-picture=(), sync-xhr=(), usb=(), xr-spatial-tracking=()',
			$policies
		);
	}
}
