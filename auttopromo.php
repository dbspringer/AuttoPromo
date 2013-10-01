<?php
/**
 * Plugin Name: AuttoPromo
 * Plugin URI: https://github.com/dbspringer/AuttoPromo
 * Description: This awesome plugin chooses a post for you, breaks that post into tweets, and pushes those puppies out to the world
 * Version: 0.1-alpha
 * Author: Team MOAR
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: GPL2
 *
 * GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

define( 'AUTTOPROMO_VERSION', '0.1-alpha' );
define( 'AUTTOPROMO_ROOT' , dirname( __FILE__ ) );
define( 'AUTTOPROMO_FILE_PATH' , AUTTOPROMO_ROOT . '/' . basename( __FILE__ ) );
define( 'AUTTOPROMO_URL' , plugins_url( '/', __FILE__ ) );

class AuttoPromo {

	/**
	 * Instantiate the plugin
	 *
	 * @since 0.1
	 */
	function __construct() {
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'transition_post_status', array( &$this, 'post_publish_chunks' ), 10, 3 );
	}

	/**
	 * Code to run on WordPress 'init' hook
	 *
	 * @since 0.1
	 */
	public function init() {
		// requires Jetpack for now (probably always)
		if ( ! self::check_jetpack() )
			return;
	}

	public function post_publish_chunks( $new_status, $old_status, $post ) {
		if ( $new_status == $old_status || 'publish' != $new_status )
			return;

		//Create post object
$chunked_post = array(
	'post_title'    => $post->post_title . ', chunked',
	'post_content' => wp_strip_all_tags ($post->post_content),
	'post_status' => 'publish',
    'post_date' => date('Y-m-d H:i:s'),
    'post_author' => $post->post_author,
    'post_type' => $post->post_type,
    'post_category' => array(0)
);
//insert post
wp_insert_post( $chunked_post );
	}

	/**
	 * Enforce Jetpack activated. Otherwise, load special no-jetpack admin.
	 *
	 * @return true if Jetpack is active and activated
	 *
	 * @since 0.1
	 */
	private static function check_jetpack() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'jetpack/jetpack.php' ) || ! ( Jetpack::is_active() || Jetpack::is_development_mode() ) ) {
			if ( is_admin() )
				require_once( AUTTOPROMO_ROOT . '/php/no-jetpack.php' );

			return false;
		}

		return true;
	}
}

global $auttopromo;
$auttopromo = new AuttoPromo();

