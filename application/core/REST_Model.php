<?php

/**
 * REST-persisted collection.
 * ------------------------------------------------------------------------
 */
class REST_Model extends Memory_Model
{
//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------

    //where to call the REST service
    protected $rest_server = null;
    protected $rest_port = null;


    protected $data = null;


    /**
    * Constructor.
    * @param string $rest_server where to call the rest service
    * @param string $rest_port which port that is allowed for incoming request.
    *                          80 by default. 
    * @param string $keyfield  Name of the primary key field
    * @param string $entity	Entity name meaningful to the persistence
    */
    function __construct($rest_server, $rest_port = 4711, $keyfield = 'id', $entity = null)
    {
        parent::__construct();

        $this->rest_server = $rest_server;
        $this->rest_port = is_int($rest_port) ? intval($rest_port) : 4711;

        // initialize this model
        $this->initialize();
        // and populate the collection
        $this->load();
    }
    
    private function initialize(){
        // Have all the field names even if file is empty
        $this->_fields[] = 'id';
        $this->_fields[] = 'task';
        $this->_fields[] = 'priority';
        $this->_fields[] = 'size';
        $this->_fields[] = 'group';
        $this->_fields[] = 'deadline';
        $this->_fields[] = 'status';
        $this->_fields[] = 'flag';
        
        $this->rest->initialize(array('server' => $this->rest_server));
        $this->rest->option(CURLOPT_PORT, $this->rest_port);
    }

    /**
    * Load the collection state appropriately, depending on persistence choice.
    * OVER-RIDE THIS METHOD in persistence choice implementations
    */
    protected function load()
    {
        //make a RESTful READ call
        $result = $this->rest->get('/job');

        foreach ($result as $item)
        {   
            $record = new stdClass();
            $record->id = (int) $item->id;
            $record->task = (string) $item->task;
            $record->priority = (int) $item->priority;
            $record->size = (int) $item->size;
            $record->group = (int) $item->group;
            $record->deadline = (string) $item->deadline;
            $record->status = (int) $item->status;
            $record->flag = (int) $item->flag;
            $this->_data[$record->id] = $record;
        }

        // rebuild the field names if necessary
        if(count($this->_data) > 0){
            $this->_fields = array_keys((array)array_values((array)$this->_data)[0]);
        }

        // --------------------
        // rebuild the keys table
        $this->reindex();
    }
    
    // Add a record to the DB
    function add($record)
    {
        $key = $record->{$this->_keyfield};
        $retrieved = $this->rest->post('/job/' . $key, (array)$record);
        $this->load(); // refresh the data from the server in case there are changes in the db
    }
    
    // Retrieve an existing DB record as an object
    // This overrides the parent method
    function get($key, $key2 = null)
    {
        return $this->rest->get('/job/' . $key);
    }
    
    // Update a record in the DB
    // This overrides the parent method
    function update($record)
    {
        $key = $record->{$this->_keyfield};
        $retrieved = $this->rest->put('/job/' . $key, (array)$record);
        $this->load(); // refresh the data from the server in case there are changes in the db
    }
    
    // Delete a record from the DB
    // This overrides the parent method
    function delete($key, $key2 = null)
    {
        $this->rest->delete('/job/' . $key);
        $this->load(); // refresh the data from the server in case there are changes in the db
    }
}
