<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The task entity class. The base class of all task instances.
 */
class Task extends CI_Model {
    private $description = NULL;//description
    private $priority = NULL;//priority: integer for low | medium | high etc
    private $size = NULL;//size: integer for small | medium | large etc
    private $group = NULL;//group: integer for house | school | work | family etc
    private $status = NULL;//status: integer for in_progress | complete etc
    
    // The magic setter for member variables.
    public function __set($key, $value) {
        // if a set* method exists for this key, 
        // use that method to insert this value. 
        // For instance, setName(...) will be invoked by $object->name = ...
        // and setLastName(...) for $object->last_name = 
        $method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
        if (method_exists($this, $method))
        {
                $this->$method($value);
                return $this;
        }

        // Otherwise, just set the property value directly.
        $this->$key = $value;
        return $this;
    }
    
    /**
     * Property Magic Getter
     * @param String $property the property to get
     * @return mixed value of the property
     */
    public function __get($property){
        if(isset($this->$property)){
            return $this->$property;
        }
        else{
            return NULL;
        }
    }
    
    public function setPriority($value){
        //validate input against Rule
        if(is_int($value) && $value < 4){
            $this->priority = $value;
        }
    }
    
    public function setSize($value){
        //validate input against Rule
        if(is_int($value) && $value < 4){
            $this->size = $value;
        }
    }
    
    public function setGroup($value){
        //validate input against Rule
        if(is_int($value) && $value < 5){
            $this->group = $value;
        }
    }    
}
?>
