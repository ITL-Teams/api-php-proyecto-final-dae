<?php $GLOBALS['page_name'] = 'docs'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Regex Documentation</title>

	<?php require_once 'views/layouts/header.php'; ?>
	<style type="text/css">
		.content{
			padding-left: 5%;
			text-align: left;
			padding-top: 20px;
			border: 4px solid;
			border-radius: 5px;
			border-color: #028b63;
			background-color: #d6f0eb;
		}
		.estructura{
			font-family: Arial;
			font-size: 16px;
			font-style: bold;
		}
	</style>
</head>
<body>
	<?php require_once 'views/layouts/navbar.php'; ?>
	
	<div class="container mt-4">
		<div class="content">
			<p class="title bold">
				<img src="<?= "$GLOBALS[assets]/img/regex.png" ?>" style="border-radius: 15px" width="100px"> Regex
			</p>	
			<p class="paragraph">
			Regex (Regular Expression) is a sequence of characters that make up a pattern
			search. They are mainly used to search for string patterns
			character or substitution operations.
			</p>
			<p  class="paragraph">
			Its most obvious utility is the description of a set of strings for a specific function, being useful in text editors and other computer applications to search and manipulate texts.
			</p>
			<p  class="paragraph">
			Numerous text editors and other tools use regular expressions to find and replace patterns in text. For example, tools provided by Unix distributions (including the sed editor and grep filter) popularized the concept of regular expression among non-programmer users, although it was already familiar to programmers.
			</p>
			<p  class="paragraph">
			Initially, this recognition of strings was programmed for each application without any mechanism inherent to the programming language, but over time the use of regular expressions has been incorporated to facilitate the detection of certain strings. For example, Perl has a powerful regular expression engine directly embedded in its syntax. Other languages ​​have incorporated it as specific functions without incorporating it into their syntax.
			</p>
			<hr>
			<div class="estructura">
				<p class="title" style="text-align: left"> How to create regex a service?</p>
				<h3>The Owner:</h3>
				<strong>optional_param:</strong> regex-type<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>values:</strong> boolean, match, match-all, replace<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>default:</strong> boolean<br><br>


				<strong>optional_param:</strong> regex<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>value:</strong> regex expression<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>default:</strong> /.+/<br><br>

				<b>Example:</b><br>
				<p >		
				{<br>
					&nbsp;&nbsp;&nbsp;&nbsp;
				    "regex-type": "replace",<br>
				    &nbsp;&nbsp;&nbsp;&nbsp;
				    "regex": "/bad_word/"<br>
				}<br>
				</p>
				<hr>
				<h3>The Client:</h3>
				<strong>required_param:</strong> input<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>value:</strong> A string<br><br>
			
				<p><strong>Note: </strong>In case of use a <b>regex-type = replace</b> you must provide a replacement string</p>

				<strong>required_param (just in replace):</strong> replacement<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<strong>value:</strong> A string<br><br>

				<b>Following the example above:</b><br>
				<p >
				{<br>
					&nbsp;&nbsp;&nbsp;&nbsp;
					"service": "regexTest",<br>
					&nbsp;&nbsp;&nbsp;&nbsp;
					"input": "Hey you bad_word, you are a pice of bad_word.",<br>
					&nbsp;&nbsp;&nbsp;&nbsp;
					"replacement": "---"<br>
				}<br><br>
				</p>
				<b>The API response is similar to this:</b><br>
				<p>
				{<br>
					&nbsp;&nbsp;&nbsp;&nbsp;
					"success": true,<br>
					&nbsp;&nbsp;&nbsp;&nbsp;
					"output": "Hey you ---, you are a pice of ---."<br>
				}<br><hr><br>
				
				<b>Response Explanation</b><br>
				</p>
				<b>success:</b> returns true if there is a match in the regular expression. <br>

				<b>output:</b><br>
				That depends on regex-type, these are the responses you can get.
				<ul>
					<li><b>When boolean: </b>No output parameter</li>
					<li><b>When match: </b>Returns an array that contains one match</li>
					<li><b>When match-all: </b>Returns an array containing other arrays with multiple matches</li>
					<li><b>When replace: </b>Returns the input with the replacement value that matches with regex</li>
				</ul>
				
				<hr>
				<p class="title" style="text-align: left">
					Test Code
				</p>
				<div class="algo" style="background-color: white; width: 95%; border-radius: 20px">
				<pre>
					<code style="">
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
					</code>
				</pre>
				</div>	
			</div>	
		</div>	
	</div>
</body>
</html>