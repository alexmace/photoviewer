<?php

require_once 'PHPUnit/Framework.php';
require_once 'PhotoViewer/Service/Flickr/Location.php';

class PhotoViewer_Service_Flickr_LocationTest extends PHPUnit_Framework_TestCase
{

    public function testConstructor( )
    {

        $dom = new DOMDocument( );
        $dom->loadXML( '<location latitude="52.184322" longitude="-2.205634" accuracy="16" context="0" place_id="2ba9LmmdAJ0Tkw" woeid="41117">
		<locality place_id="2ba9LmmdAJ0Tkw" woeid="41117">Worcester</locality>
		<county place_id="pk4Gh3eYA5qv0FmsRQ" woeid="12602192">Worcestershire</county>
		<region place_id="pn4MsiGbBZlXeplyXg" woeid="24554868">England</region>
		<country place_id="DevLebebApj4RVbtaQ" woeid="23424975">United Kingdom</country>
	</location>' );

        $xpath = new DOMXPath($dom);

        $location = new PhotoViewer_Service_Flickr_Location( $xpath->query('//location')->item(0) );

        $this->assertAttributeEquals( 16, 'accuracy', $location );
        $this->assertAttributeEquals( 52.184322, 'latitude', $location );
        $this->assertAttributeEquals( -2.205634, 'longitude', $location );

    }

}