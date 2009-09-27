<?php
set_include_path( realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '..'
                          . DIRECTORY_SEPARATOR . 'library' )
                . PATH_SEPARATOR . get_include_path( ) );

if ( !defined( 'PHPUnit_MAIN_METHOD' ) )
{

    define( 'PHPUnit_MAIN_METHOD', 'AllTests::main' );

}

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'PhotoViewer/AllTests.php';

class AllTests
{

    public static function main( )
    {

        PHPUnit_TextUI_TestRunner::run( self::suite( ) );

    }

    public static function suite( )
    {

        $suite = new PHPUnit_Framework_TestSuite( 'PhotoViewer' );

        $suite->addTest( PhotoViewer_AllTests::suite( ) );

        return $suite;

    }

}

if ( PHPUnit_MAIN_METHOD == 'AllTests::main' )
{

    AllTests::main( );

}