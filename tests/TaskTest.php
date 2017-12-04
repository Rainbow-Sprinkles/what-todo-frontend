<?php
use PHPUnit\Framework\TestCase;

/**
 * This unit test plan is to test against Task entity model.
 * It basically includes the following tests:
 * 1) the assignment of each member properties with reasonable test inputs and
 *    expected outputs.
 */
class TaskTest extends TestCase
{
    private $CI;

    protected function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('task');
    }
    
    /**
     * unit test for priority
     */
    public function testPriority(){
        //invalid value should not change its default value
        $this->CI->task->priority = 4;//greater
        $this->assertNull($this->CI->task->priority, 'test >= 4');
        
        //invalid value type should not change its default value
        $this->CI->task->priority = 'text';
        $this->assertNull($this->CI->task->priority, 'test non-integer');
        
        //valid value
        $this->CI->task->priority = 3;
        $this->assertEquals(3, $this->CI->task->priority);
        
    }
    
    /**
     * unit test for size
     */
    public function testSize(){
        //invalid value should not change its default value
        $this->CI->task->size = 4;//greater
        $this->assertNull($this->CI->task->size, 'test >= 4');
        
        //invalid value type should not change its default value
        $this->CI->task->size = 'text';
        $this->assertNull($this->CI->task->size, 'test non-integer');
        
        //valid value
        $this->CI->task->size = 3;
        $this->assertEquals(3, $this->CI->task->size);
    }
    
    /**
     * unit test for group
     */
    public function testGroup(){
        //invalid value should not change its default value
        $this->CI->task->group = 5;//greater
        $this->assertNull($this->CI->task->group, 'test >= 5');
        
        //invalid value type should not change its default value
        $this->CI->task->group = 'text';
        $this->assertNull($this->CI->task->group, 'test non-integer');
        
        //valid value
        $this->CI->task->group = 4;
        $this->assertEquals(4, $this->CI->task->group);
    }

    /**
     * unit test for status
     * there is no rule for status. Hence, test case for status not provided.
     */
}
?>