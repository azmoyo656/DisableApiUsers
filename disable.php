<?php 

/**
* Plugin Name: Disable Api Users
* Plugin URI: https://github.com/azmoyo656/DisableApiUsers
* Description: With this plugin you will be able to protect the users of the wordpress api, now you will be able to secure this part in a simple way
* Version: 3.6.9
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Luis Fernando Rendón Leal
* Author URI: https://github.com/azmoyo656/DisableApiUsers
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: my-basics-plugin
* Domain Path: /languages
*/


function ApiDisableUsers($endpoints) {
	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}

	return $endpoints;
}
add_filter( 'rest_endpoints', 'ApiDisableUsers' );