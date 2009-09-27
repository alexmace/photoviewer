<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Flickr
 *
 * @author alex
 */
class PhotoViewer_Service_Flickr extends Zend_Service_Flickr {
    
    /**
     * Returns Flickr location details for the given photo ID
     *
     * @param  string $id the NSID
     * @return PhotoViewer_Service_Flickr_Location
     * @throws Zend_Service_Exception
     */
    public function getImageLocation( $id ) {
        static $method = 'flickr.photos.geo.getLocation';

        if (empty($id)) {
            /**
             * @see Zend_Service_Exception
             */
            require_once 'Zend/Service/Exception.php';
            throw new Zend_Service_Exception('You must supply a photo ID');
        }

        $options = array('api_key' => $this->apiKey, 'method' => $method, 'photo_id' => $id);

        $restClient = $this->getRestClient();
        $restClient->getHttpClient()->resetParameters();
        $response = $restClient->restGet('/services/rest/', $options);

        $dom = new DOMDocument();
        $dom->loadXML($response->getBody());
        $xpath = new DOMXPath($dom);
        self::_checkErrors($dom);
        $retval = array();
        /**
         * @see Zend_Service_Flickr_Location
         */
        require_once 'PhotoViewer/Service/Flickr/Location.php';

        return new PhotoViewer_Service_Flickr_Location($xpath->query('//location')->item(0));
    }

}
?>
