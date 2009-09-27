<?php

/**
 * Layout Controller Plugin that controls what layout is used on different
 * pages. The default layout is 'common.phtml'
 *
 */
class PhotoViewer_Layout_Controller_Plugin_Layout extends Zend_Layout_Controller_Plugin_Layout {

    /**
     * Gets called before the Action Controller is dispatched and sets up the
     * layouts to use.
     *
     * @param Zend_Controller_Request_Abstract $request
     */
    public function preDispatch( Zend_Controller_Request_Abstract $request )
    {
        
        if ( $request->getControllerName( ) == 'auth' )
        {

            // If it is the auth controller, use the basic layout as we just
            // want to show a login box.
            $this->getLayout( )->setLayout( 'basic' );

        }
        else if ( ( ( $request->getControllerName( ) == 'data' ) &&
                    ( $request->getActionName( ) == 'upload' ) ) ||
                  ( ( $request->getControllerName( ) == 'data' ) &&
                    ( ( $request->getActionName( ) == 'range' ) ||
                      ( $request->getActionName( ) == 'stats' ) ) &&
                    ( $request->isPost( ) ) &&
                    ( isset( $_POST['format'] ) ) &&
                    ( $_POST['format'] == 'csv' ) ) ) {
        
            // Anything that does result in an HTML page should use this empty
            // layout. This will just output whatever is given to the view. At
            // the moment the pages that use this are:
            // /data/upload - for handling AJAX/Flash file uploads
            // /data/range - but only for CSV downloads
            $this->getLayout( )->setLayout( 'empty' );
        
        }

    }

}