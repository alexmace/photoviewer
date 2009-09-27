<?php
/**
 * Channels Class Definition
 *
 */

/**
 * This is the model that holds the logic involved with channels
 *
 * @author Alex Mace <alex@hollytree.co.uk>
 * @package Models
 */
class Channels extends Zend_Db_Table_Abstract
{

    /**
     * The name of the associated table
     *
     * @var string
     */
    protected $_name = 'channels';
    
    /**
     * 
     * 
     * @param string $channelId 
     * @return array
     */
    public function getInfo( $channelId )
    {

        // Get a select object to query with. Turn off the integrity check
        // because we want to join to the logos table
        $select = $this->select( )->setIntegrityCheck( false );
        
        // Set the fields we want to get from the channels table and join to the
        // logos table
        $select->from( 'channels', array( 'channelId', 'name' ) )
               ->join( 'logos', 'logos.channelId=channels.channelId',
                       array( 'url' ) );

        // Set the channelId to look for and then send the query to the database
        $select->where( 'channelId = ?', $channelId );
        $result = $this->fetchAll( $select )->toArray( );

        // Set up an array to hold all of the information about the channel
        $info = array( );

        // Iterate over the results so we can assemble the info into a single
        // record
        foreach( $result as $row )
        {

            // Assign each key/value pair seperately rather than just copying
            // the array over because each record will contain a different logo
            // and we don't want to wipe out the previously processed logo.
            $info['channelId'] = $row['channelId'];
            $info['name'] = $row['name'];

            // Work out if it is the large logo or the small one and assign it
            // to the correct key.

        }

    }

    /**
     * Removes all of the entries in the table
     */
    public function removeAll( )
    {

        $this->delete( '' );

    }

    /**
     * Saves the details of the channel
     *
     * @param string $channelId
     * @param string $name
     */
    public function store( $channelId, $name )
    {

        // Set the data we're going to pass to the database.
        $data = array( 'channelId' => $channelId,
                       'name'      => $name );

        // Save it to the database
        $this->insert( $data );

    }

}