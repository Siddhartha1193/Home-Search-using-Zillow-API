<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$zwsid = config.Zid1;
$zwsid2 = config.Zid2;
error_reporting(E_ALL ^ E_WARNING);
$fmr = "&status=recentlySold&zws-id=$zwsid2&geocodes=true";
$fmr2 = "&status=forRent&zws-id=$zwsid2&geocodes=true";

$url1 = "http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=$zwsid"; //GetDeepSearchResulstAPI
$url2 = "http://www.zillow.com/webservice/GetUpdatedPropertyDetails.htm?zws-id=$zwsid"; //GzetUpdatedPropertyDetailsAPI
$url3 = "http://www.zillow.com/webservice/GetDeepComps.htm?zws-id=$zwsid"; //Get Comparables API
$url4= "http://www.zillow.com/webservice/FMRWidget.htm?region="; // Get ForSale Homes API
if (!date_default_timezone_get('date.timezone')) {
    // insert here the default timezone
    date_default_timezone_set('America/San_Francisco');
}
?>
