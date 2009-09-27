<?php

if ( !defined( 'PHPUnit_MAIN_METHOD' ) )
{

    define( 'PHPUnit_MAIN_METHOD', 'PhotoViewer_AllTests::main' );

}

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'PhotoViewer/Layout/AllTests.php';
require_once 'PhotoViewer/Service/AllTests.php';

class PhotoViewer_AllTests
{

    public static function main( )
    {

        PHPUnit_TextUI_TestRunner::run( self::suite( ) );

    }

    public static function suite( )
    {

        $suite = new PHPUnit_Framework_TestSuite( 'Photo Viewer Library' );

        $suite->addTest( PhotoViewer_Layout_AllTests::suite( ) );
        $suite->addTest( PhotoViewer_Service_AllTests::suite( ) );

        return $suite;

    }

}

if ( PHPUnit_MAIN_METHOD == 'PhotoViewer_AllTests::main' )
{

    PhotoViewer_AllTests::main( );

}
