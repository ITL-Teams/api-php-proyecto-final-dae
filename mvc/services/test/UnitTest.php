<?php

require_once 'Colors.php';

abstract class UnitTest
{
	private $tests;

	public function __construct()
	{
		$this->tests = [];
	}

	protected abstract function setup();

	public function __invoke()
    {
    	$this->setup();

      $colors = new Colors();

    	echo "\n";
        foreach ($this->tests as $test_info) {
           $test_name = $test_info[0];
           try
           {
               $test_result = $test_info[1];
           }
           catch(Exception $exception)
           {
           	   $test_result = false;
           }
           
           $test_result = $test_result ? 
               $colors->getColoredString("SUCCESS", "light_green") :
               $colors->getColoredString("FAILED", "light_red");

           $result_message  = $colors->getColoredString("Test Name:  $test_name\n", "yellow");
           $result_message .= "   Result:  $test_result\n\n";
           echo $result_message;
        }
    }

	protected function addTest($name, $test)
	{
		array_push($this->tests, [$name, $test]);
	}
}