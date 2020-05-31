<?php

require_once 'UnitTest.php';
require_once 'services/implementation/RegexService.php';

class RegexTest extends UnitTest
{
	protected function setup()
	{
        $this->addTest("No service code",     $this->noService());
        $this->addTest("No service input",    $this->noCode());
        $this->addTest("Executable Service",  $this->executableService());
        $this->addTest("Default True",        $this->defaultInputTrue());
        $this->addTest("Default False",       $this->defaultInputFalse());
        $this->addTest("Match True",          $this->matchInputTrue());
        $this->addTest("Match False",         $this->matchInputFalse());
        $this->addTest("Match All True",      $this->matchAllInputTrue());
        $this->addTest("Match All False",     $this->matchAllInputFalse());
        $this->addTest("Without Replacement", $this->replaceWithOutReplacement());
        $this->addTest("Replacement True",    $this->replaceInputTrue());
        $this->addTest("Replacement False",   $this->replaceInputFalse());
	}

    private function executeService($service_code, $input)
    {
        $service = new RegexService(1, 'regex', 'description', $service_code);
        try {
            $response = $service->executeService($input);
        }
        catch(UnexecutableService $exception){
        	return "UnexecutableService";
        }
        return $response;
    }

    private function noService()
    {
    	$result = $this->executeService('','{"input":"something"}');
    	return $result == "UnexecutableService";
    }

    private function noCode()
    {
        $result = $this->executeService('{}','{}');
    	return $result == "UnexecutableService";
    }

    private function executableService()
    {
        $result = $this->executeService('{}','{"input":"hello world"}');
    	return $result == '{"success":true}';
    }

    private function defaultInputTrue()
    {
    	$result = $this->executeService('{"regex":"/hello/"}', '{"input": "hello world"}');
    	return $result == '{"success":true}';
    }

    private function defaultInputFalse()
    {
    	$result = $this->executeService('{"regex":"/hello/"}', '{"input": "world"}');
    	return $result == '{"success":false}';
    }

    private function matchInputTrue()
    {
    	$result = $this->executeService('{"regex-type":"match", "regex":"/hello/"}', '{"input": "hello world"}');
    	return $result == '{"success":true,"output":["hello"]}';
    }

    private function matchInputFalse()
    {
    	$result = $this->executeService('{"regex-type":"match", "regex":"/hello/"}', '{"input": "world"}');
    	return $result == '{"success":false,"output":[]}';
    }

    private function matchAllInputTrue()
    {
    	$result = $this->executeService('{"regex-type":"match-all", "regex":"/hello/"}', '{"input": "hello world, hello you"}');
    	return $result == '{"success":true,"output":[["hello","hello"]]}';
    }

    private function matchAllInputFalse()
    {
    	$result = $this->executeService('{"regex-type":"match-all", "regex":"/hello/"}', '{"input": "world"}');
    	return $result == '{"success":false,"output":[[]]}';
    }

    private function replaceWithOutReplacement()
    {
        $result = $this->executeService('{"regex-type":"replace", "regex":"/world/"}', '{"input": "hello world"}');
    	return $result == 'UnexecutableService';
    }

    private function replaceInputTrue()
    {
        $result = $this->executeService(
        	'{"regex-type":"replace", "regex":"/world/"}',
        	'{"input": "hello world", "replacement":"you"}');
    	return $result == '{"success":true,"output":"hello you"}';
    }

    private function replaceInputFalse()
    {
        $result = $this->executeService(
        	'{"regex-type":"replace", "regex":"/world/"}',
        	'{"input": "hello you", "replacement":"world"}');
    	return $result == '{"success":false,"output":"hello you"}';
    }
}

$test = new RegexTest;
$test->__invoke();