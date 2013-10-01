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

	/**
	 * Check for change to publish then break the post up into chunks
	 *
	 * @since 0.1
	 */
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

		$ap_tags = array('AuttoPromo', 'auttopromo', 'AUTTOPROMO');

		if (has_tag( $ap_tags, $post )) {
			//has the tag lets do some stuff
		}

		// TODO chop text & create new post
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

	/**
	 * Returns max length a chunk can have given # of total posts
	 * @param  integer $text_len total length of the post
	 * @param  integer $max_len  starting value for max length of chunks
	 * @param  integer $n        driver of loop; number of digits in total count
	 * @return integer           max string length each chunk can have to fit counts
	 *
	 * @since 0.1
	 */
	function max_len( $text_len, $max_len = 136, $n = 1 ) {
		if ( $text_len < $max_len )
			return $max_len;
		if ( $text_len/$max_len > $n )
			return max_len( $text_len, $max_len-2, $n*10 );
		else
			return $max_len;
	}

	/**
	 * Returns an array containing the different chunks
	 * @param  string   $text     original post content
	 * @param  integer $max_len  max lengh of each chunk
	 * @return array             the different chunks
	 *
	 * @since 0.1
	 */
	function chop_text($text,$max_len) {
		return explode("\n", wordwrap($text, $max_len, "\n"));
	}

	/**
	 * Returns an array that adds chunks counts to each chunk
	 * @param  array   $array     the chunks
	 * @param  integer $how_many  total number of chunks
	 * @return array              the different chunks to send
	 *
	 * @since 0.1
	 */
	function append_counts($array,$how_many) {
		$chunks_to_send = array();
		$counter=1;
		foreach ($array as $value) {
			$chunks_to_send[]= "$value $counter/$how_many";
		    $counter++;
		}
		return $chunks_to_send;
	}

	/**
	 * Takes a post text and returns an array of chunks ready for tweeting or posting
	 * @param  string $raw_post  The post you want to explode
	 * @return array 			 the different chunks for tweeting/posting
	 *
	 * @since 0.1
	 */
	function parse_post ($raw_post) {
		$chunk_length=max_len( strlen($raw_post));
		$chunk_count=count(chop_text($raw_post,$chunk_length));
		return append_counts(chop_text($raw_post,$chunk_length),$chunk_count);

	}

}

global $auttopromo;
$auttopromo = new AuttoPromo();

