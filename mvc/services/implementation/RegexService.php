<?php

require_once 'services/abstract-service.php';

class RegexService extends AbstractService
{
    private $DEFAULT_REGEX_TYPE = 'boolean';
    private $MATCH_TYPE         = 'match';
    private $MATCH_ALL_TYPE     = 'match-all';
    private $REPLACE_TYPE       = 'replace';
    private $DEFAULT_REGEX      = '/.+/';

    public function executeService($input)
    {
        try
        {
            $code  = $this->decode($this->getCode());
            $input = $this->decode($input);    
        }
    	catch(NotJsonException $exception)
        {
            throw new UnexecutableService();
        }

    	$regex_type  = $this->getRegexType($code);
    	$regex       = $this->getRegex($code);

        try {
            $string  = $this->getString($input);
        }
        catch(NotInputFoundException $exception) {
            throw new UnexecutableService();
        }

        $response['success'] = preg_match($regex, $string);
        settype($response['success'], 'boolean');
        switch($regex_type)
        {
            case $this->MATCH_TYPE:
                preg_match($regex, $string, $result);
                $response['output'] = $result;
                break;

            case $this->MATCH_ALL_TYPE:
                preg_match_all($regex, $string, $result);
                $response['output'] = $result;
                break;

            case $this->REPLACE_TYPE:
                try {
                    $replacement = $this->getReplacement($input);
                }
                catch(NotInputFoundException $exception) {
                	throw new UnexecutableService();
                }
                
                $string = preg_replace($regex, $replacement, $string);
                $response['output'] = $string;
                break;
        }

        $response = $this->encode($response);
        return $response;
    }

    private function getRegexType($code)
    {
        if(!isset($code['regex-type']))
        	return $this->DEFAULT_REGEX_TYPE;
        
        return $code['regex-type'];
    }

    private function getRegex($code)
    {
        if(!isset($code['regex']))
        	return $this->DEFAULT_REGEX;
        
        return $code['regex'];
    }

    private function getString($input)
    {
        if(!isset($input['input']))
        	throw new NotInputFoundException();
        
        return $input['input'];
    }

    private function getReplacement($input)
    {
        if(!isset($input['replacement']))
        	throw new NotInputFoundException();
        
        return $input['replacement'];
    }
}