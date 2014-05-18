<?php
/**
 * Remote Service Display module for ZPanelX (uses XMWS)
 * Written by Bobby Allen, 05/04/2012. 
 */

require_once 'lib/xmwsclient.class.php';

$service_status = new xmwsclient();
$service_status->InitRequest($apiurl, 'services', 'GetServiceStatus', $apikey);
$response_array = $service_status->XMLDataToArray($service_status->Request($service_status->BuildRequest()));
if ($response_array['xmws']['response'] != '1101') {
    die("API Error: " . $response_array['xmws']['content']);
}

/**
 * We have to manually check the DNS port at present as DNS is not currently part of the standard port array in the service webservice class (will add in ZPX 1.0.1) 
 */
$dns_status = new xmwsclient();
$dns_status->InitRequest($apiurl, 'services', 'GetPortStatus', $apikey);
$dns_status->SetRequestData("<port>53</port>");
$dnsresponse_array = $dns_status->XMLDataToArray($dns_status->Request($dns_status->BuildRequest()));
if ($dnsresponse_array['xmws']['response'] != '1101') {
    die("API Error: " . $response_array['xmws']['content']);
}
?>
