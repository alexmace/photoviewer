<?php

if ( !defined( 'PHPUnit_MAIN_METHOD' ) )
{

    define( 'PHPUnit_MAIN_METHOD', 'PhotoViewer_Layout_Controller_Plugin_AllTests::main' );

}

require_once( 'PHPUnit/Framework.php' );
require_once( 'PHPUnit/TextUI/TestRunner.php' );
require_once( 'PhotoViewer/Layout/Controller/Plugin/LayoutTest.php' );

class PhotoViewer_Layout_Controller_Plugin_AllTests
{

    public static function main( )
    {

        PHPUnit_TextUI_TestRunner::run( self::suite( ) );

    }

    public static function suite( )
    {

        $suite = new PHPUnit_Framework_TestSuite( 'Photo Viewer Library Layout Controller Plugin' );

        $suite->addTestSuite( 'PhotoViewer_Layout_Controller_Plugin_LayoutTest' );

        return $suite;

    }

}

if ( PHPUnit_MAIN_METHOD == 'PhotoViewer_Layout_Controller_Plugin_AllTests::main' )
{

    PhotoViewer_Layout_Controller_Plugin_AllTests::main( );

}