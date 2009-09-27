<?php

if ( !defined( 'PHPUnit_MAIN_METHOD' ) )
{

    define( 'PHPUnit_MAIN_METHOD', 'PhotoViewer_Service_AllTests::main' );

}

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'PhotoViewer/Service/FlickrTest.php';
require_once 'PhotoViewer/Service/Flickr/AllTests.php';

class PhotoViewer_Service_AllTests
{

    public static function main( )
    {

        PHPUnit_TextUI_TestRunner::run( self::suite( ) );

    }

    public static function suite( )
    {

        $suite = new PHPUnit_Framework_TestSuite( 'Photo Viewer Library Service' );

        $suite->addTest( PhotoViewer_Service_Flickr_AllTests::suite( ) );
        $suite->addTestSuite( 'PhotoViewer_Service_FlickrTest' );

        return $suite;

    }

}

if ( PHPUnit_MAIN_METHOD == 'PhotoViewer_Service_AllTests::main' )
{

    PhotoViewer_Form_AllTests::main( );

}