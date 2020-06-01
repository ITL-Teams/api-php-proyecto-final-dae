<?php $GLOBALS['page_name'] = 'regex'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Regex Documentation</title>

	<?php require_once 'views/layouts/header.php'; ?>
	<style type="text/css">
		.content{
			padding-left: 5%;
			padding-right: 5%;
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
				<img src="<?= "$GLOBALS[assets]/img/regex.png" ?>" width="100px"> Regex
			</p>	
			<p class="paragraph">
			Regex (Expresión Regular) es una secuencia de caracteres que conforma un patrón 
			de búsqueda. Se utilizan principalmente para la búsqueda de patrones de cadenas 
			de caracteres u operaciones de sustituciones.
			</p>
			<p  class="paragraph">
			Su utilidad más obvia es la de describir un conjunto de cadenas para una determinada función, resultando de utilidad en editores de texto y otras aplicaciones informáticas para buscar y manipular textos.
			</p>
			<p  class="paragraph">
			Numerosos editores de texto y otras herramientas utilizan expresiones regulares para buscar y reemplazar patrones en un texto. Por ejemplo, las herramientas proporcionadas por las distribuciones de Unix (incluyendo el editor sed y el filtro grep) popularizaron el concepto de expresión regular entre usuarios no programadores, aunque ya era familiar entre los programadores.
			</p>
			<p  class="paragraph">
			Inicialmente, este reconocimiento de cadenas se programaba para cada aplicación sin mecanismo alguno inherente al lenguaje de programación pero, con el tiempo, se ha ido incorporado el uso de expresiones regulares para facilitar programar la detección de ciertas cadenas. Por ejemplo, Perl tiene un potente motor de expresiones regulares directamente incluido en su sintaxis. Otros lenguajes lo han incorporado como funciones específicas sin incorporarlo a su sintaxis. 
			</p>
			<hr>
			<div class="estructura">
				<p class="title" style="text-align: left"> Estructura para crear servicio</p>
				Para crear servicio:<br>
				regex-type = {boolean, match, match-all, replace}<br>
				default: boolean<br>
				regex = {/regex expresion/}<br>
				default: /.+/<br><br>
				<b>Ejemplo:</b><br>
				<p style="font-style: italic">		
				{<br>
				    "regex-type": "replace"<br>
				    "regex": "/world/"<br>
				}<br>
				</p>
				<hr>
				El cliente que consume el servicio obligatorio: <br>
				input = "input string"<br>

				obligatorio si el servicio es replace:<br>
				replacement = "replacement string"<br><br>

				<b>Siguiendo el ejemplo anterior:</b><br>
				<p style="font-style: italic">
				{<br>
					"input": "Hello world",<br>
					"replacement": "Ricardo"<br>
				}<br><br>
				</p>
				<b>El resultado que regresa la API es:</b><br>
				<p style="font-style: italic">
				{<br>
					"success": true,<br>
					"output": "Hello Ricardo"<br>
				}<br>
				</p>
				<b>success</b> devuelve true si hay match en la expresión regular
				y false en caso de que no<br>

				<b>Casos para el service-type:</b><br>
				Tipo match: cuando regresa una respuesta solo regresa el success. <br>
				Tipo replace: si no hay cohincidencia entonces el output traera el string
				original del input.<br>
				Otro tipo: en el otput pondra la salida.<br>
				<hr>
				<p class="title" style="text-align: left">
					Codigo
				</p>
				<div class="algo" style="background-color: white">
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