<?php
/**
 * IndexController Class Definition
 *
 */
require_once( 'Zend/Controller/Action.php' );

/**
 * The Index controller only has one page - the home page. The home page can
 * only be displayed once the user is logged in, otherwise it should redirect
 * to the login page in the Auth controller.
 *
 * @author Alex Mace <alex@hollytree.co.uk>
 * @package Controllers
 */
class IndexController extends Zend_Controller_Action
{

    /**
     * Shows the home page.
     */
    public function indexAction( )
    {

        $flickr = new Zend_Service_Flickr( '66e1e5ee7ead5b8cf97582ac9d8de9f9' );

        $result = $flickr->tagSearch( 'alexmace', array( 'user_id' => '63463886@N00' ) );

        // Setup an array to hold the image urls that we want to pass to the
        // view
        $images = array( );

        foreach( $result as $image ) {

            if ( isset( $image->Large ) ) {
                $images[] = $image->Large->uri;
            }

        }

        $this->view->images = $images;

    }

}
