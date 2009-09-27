<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Geo
 *
 * @author alex
 */
class PhotoViewer_Service_Flickr_Location {

    /**
     * The accuracy level of the GPS fix
     *
     * @var int
     */
    public $accuracy;

    /**
     * Position in degrees north(positive)/south(negative) of the equator
     *
     * @var float
     */
    public $latitude;

    /**
     * Position in degrees east(positive)/west(negative) of the equator
     *
     * @var float
     */
    public $longitude;

    /**
     * Parse given Flickr Location element
     *
     * @param  DOMElement $location
     * @return void
     */
    public function __construct(DOMElement $location)
    {
        $this->accuracy  = (int) $location->getAttribute('accuracy');
        $this->latitude  = (float) $location->getAttribute('latitude');
        $this->longitude = (float) $location->getAttribute('longitude');
    }

}
?>
