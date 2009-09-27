<?php
/**
 * Programmes Class Definition
 *
 */

/**
 * This is the model that holds the logic for accessing programmes
 *
 * @author Alex Mace <alex@hollytree.co.uk>
 * @package Models
 */
class Programmes extends Zend_Db_Table_Abstract
{

    /**
     * The name of the associated table
     *
     * @var string
     */
    protected $_name = 'programmes';

    /**
     * Gets the complete upcoming schedule.
     *
     * @return array
     */
    public function getSchedule( )
    {

        // Get a select to query the database with. Turn off integrity checking
        // because we're going to join to other tables.
        $select = $this->select( )->setIntegrityCheck( false );

        // Need to get the following fields from the database for each entry in
        // the schedule: programmeId, title, synopsis, channelId, start,
        // duration.
        $select->from( 'programmes', 
                       array( 'programmeId', 'title', 'synopsis' ) )
               ->join( 'broadcasts',
                       'broadcasts.programmeId=programmes.programmeId',
                       array( 'channelId', 'start', 'duration' ) );
        

        return $this->fetchAll( $select )->toArray( );

    }

    /**
     * Saves the details of the broadcast for the given programme
     *
     * @param string $programmeId
     * @param string $channelId
     * @param string $start
     * @param string $duration
     */
    public function store( $programmeId, $title, $synopsis )
    {

        // Set the data we're going to pass to the database.
        $data = array( 'programmeId' => $programmeId,
                       'title'       => $title,
                       'synopsis'    => $synopsis );

        // Save it to the database
        $this->insert( $data );

    }

    /**
     * Removes all of the entries in the table
     */
    public function removeAll( )
    {

        $this->delete( '' );

    }

}