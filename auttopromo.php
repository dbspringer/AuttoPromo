<?php
/**
 * Plugin Name: AuttoPromo
 * Plugin URI: https://github.com/dbspringer/AuttoPromo
 * Description: A brief description of the Plugin.
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Name Of The Plugin Author
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
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
define( 'AUTTOPROMO_FILE_PATH' , ADCONTROL_ROOT . '/' . basename( __FILE__ ) );
define( 'AUTTOPROMO_URL' , plugins_url( '/', __FILE__ ) );

class AuttoPromo {

}

global $auttopromo;
$auttopromo = new AuttoPromo();