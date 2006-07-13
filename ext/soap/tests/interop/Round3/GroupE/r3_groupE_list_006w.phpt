--TEST--
SOAP Interop Round3 GroupE List 006 (php/wsdl): echoLinkedList (cyclic)
--SKIPIF--
<?php require_once('skipif.inc'); die("skip cyclic stuctures are not supported yet"); ?>
--FILE--
<?php
class SOAPList {
    function SOAPList($s, $i, $c) {
        $this->varString = $s;
        $this->varInt = $i;
        $this->child = $c;
    }
}
$struct = new SOAPList('arg1',1,new SOAPList('arg2',2,new SOAPList('arg3',3,NULL)));
$struct->child->child->child = $struct->child;
$client = new SoapClient(dirname(__FILE__)."/round3_groupE_list.wsdl",array("trace"=>1,"exceptions"=>0));
$client->echoLinkedList($struct);
echo $client->__getlastrequest();
$HTTP_RAW_POST_DATA = $client->__getlastrequest();
include("round3_groupE_list.inc");
echo "ok\n";
?>
--EXPECT--
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://soapinterop.org/WSDLInteropTestRpcEnc" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns2="http://soapinterop.org/xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:echoLinkedList><param0 xsi:type="ns2:List"><varInt xsi:type="xsd:int">1</varInt><varString xsi:type="xsd:string">arg1</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">2</varInt><varString xsi:type="xsd:string">arg2</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">3</varInt><varString xsi:type="xsd:string">arg3</varString><child xsi:nil="1" xsi:type="ns2:List"/></child></child></param0></ns1:echoLinkedList></SOAP-ENV:Body></SOAP-ENV:Envelope>
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://soapinterop.org/WSDLInteropTestRpcEnc" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns2="http://soapinterop.org/xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:echoLinkedListResponse><return xsi:type="ns2:List"><varInt xsi:type="xsd:int">1</varInt><varString xsi:type="xsd:string">arg1</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">2</varInt><varString xsi:type="xsd:string">arg2</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">3</varInt><varString xsi:type="xsd:string">arg3</varString><child xsi:nil="1" xsi:type="ns2:List"/></child></child></return></ns1:echoLinkedListResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
object(stdClass)#7 (3) {
  ["varInt"]=>
  int(1)
  ["varString"]=>
  string(4) "arg1"
  ["child"]=>
  object(stdClass)#8 (3) {
    ["varInt"]=>
    int(2)
    ["varString"]=>
    string(4) "arg2"
    ["child"]=>
    object(stdClass)#9 (3) {
      ["varInt"]=>
      int(3)
      ["varString"]=>
      string(4) "arg3"
      ["child"]=>
      NULL
    }
  }
}
ok
--UEXPECT--
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://soapinterop.org/WSDLInteropTestRpcEnc" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns2="http://soapinterop.org/xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:echoLinkedList><param0 xsi:type="ns2:List"><varInt xsi:type="xsd:int">1</varInt><varString xsi:type="xsd:string">arg1</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">2</varInt><varString xsi:type="xsd:string">arg2</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">3</varInt><varString xsi:type="xsd:string">arg3</varString><child xsi:nil="1" xsi:type="ns2:List"/></child></child></param0></ns1:echoLinkedList></SOAP-ENV:Body></SOAP-ENV:Envelope>
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://soapinterop.org/WSDLInteropTestRpcEnc" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns2="http://soapinterop.org/xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:echoLinkedListResponse><return xsi:type="ns2:List"><varInt xsi:type="xsd:int">1</varInt><varString xsi:type="xsd:string">arg1</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">2</varInt><varString xsi:type="xsd:string">arg2</varString><child xsi:type="ns2:List"><varInt xsi:type="xsd:int">3</varInt><varString xsi:type="xsd:string">arg3</varString><child xsi:nil="1" xsi:type="ns2:List"/></child></child></return></ns1:echoLinkedListResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
object(stdClass)#7 (3) {
  [u"varInt"]=>
  int(1)
  [u"varString"]=>
  unicode(4) "arg1"
  [u"child"]=>
  object(stdClass)#8 (3) {
    [u"varInt"]=>
    int(2)
    [u"varString"]=>
    unicode(4) "arg2"
    [u"child"]=>
    object(stdClass)#9 (3) {
      [u"varInt"]=>
      int(3)
      [u"varString"]=>
      unicode(4) "arg3"
      [u"child"]=>
      NULL
    }
  }
}
ok
