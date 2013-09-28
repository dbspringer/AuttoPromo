<?php

/**
 * This special set of admin pages are run if the user hasn't installed Jetpack.
 */
class AuttoPromo_No_Jetpack {

	/**
	 * Instantiate admin code
	 *
	 * @since 0.1
	 */
	function __construct() {
		add_action( 'admin_menu', array( &$this, 'add_options_page' ) );
	}

	/**
	 * Add the options page to settings admin menu
	 *
	 * @since 0.1
	 */
	function add_options_page() {
		add_options_page(
			'AuttoPromo',
			'AuttoPromo',
			'manage_options',
			'auttopromo',
			array( &$this, 'options_page' )
		);
	}

	/**
	 * Code for the options page
	 *
	 * @since 0.1
	 */
	function options_page() {
		$settings = __( 'AuttoPromo Settings', 'auttopromo' );
		$install_jp = admin_url( 'plugin-install.php?tab=search&type=term&s=Jetpack+by+WordPress.com&plugin-search-input=Search+Plugins' );
		$link = "<a href='$install_jp'>";
		$notice = sprintf(
			__( 'AuttoPromo requires %sJetpack%s to be installed and activated at this time.', 'auttopromo' ),
		$link, '</a>' );
		echo <<<HTML
		<div class="wrap">
			<div id="icon-options-general" class="icon32"><br></div>
			<h2>$settings</h2>
			<p>$notice</p>
		</div>
HTML;
	}
}

new AuttoPromo_No_Jetpack();
