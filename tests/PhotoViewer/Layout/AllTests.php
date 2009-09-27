<?php

if ( !defined( 'PHPUnit_MAIN_METHOD' ) )
{

    define( 'PHPUnit_MAIN_METHOD', 'PhotoViewer_Layout_AllTests::main' );

}

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'PhotoViewer/Layout/Controller/AllTests.php';

class PhotoViewer_Layout_AllTests
{

    public static function main( )
    {

        PHPUnit_TextUI_TestRunner::run( self::suite( ) );

    }

    public static function suite( )
    {

        $suite = new PHPUnit_Framework_TestSuite( 'Photo Viewer Library Layout' );

        $suite->addTest( PhotoViewer_Layout_Controller_AllTests::suite( ) );

        return $suite;

    }

}

if ( PHPUnit_MAIN_METHOD == 'PhotoViewer_Layout_AllTests::main' )
{

    PhotoViewer_Layout_AllTests::main( );

}