<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 20:31
 */

class EveXMLAPIKeyValidator
{

    private $_keyID;
    private $_vCode;
    private $_accessMask;

    public $errors;

    public function __construct($keyID, $vCode)
    {
        $this->_keyID = $keyID;
        $this->_vCode = $vCode;
        $this->errors = [];
        return $this;
    }

    public function validate()
    {
        $apiKeyInfo = (new EveXMLAccount($this->_keyID, $this->_vCode))->apiKeyInfo();
        if ($apiKeyInfo) {
            $this->_accessMask = $apiKeyInfo->assessMask;

            $callList = new EveXMLCalls();
            if ($callList) {
                /**
                 * @var $call EveXMLCall
                 */
                foreach ($callList->calls as $call) {
                    if (!($call->accessMask & $apiKeyInfo->assessMask)) {
                        $this->errors[] = new ErrorObject("Can't get access to {$call->name}: {$call->description}");
                    }
                }
            }
            else
                $this->errors[] = new ErrorObject('An error occurred while getting API calls list');
        }
        else
            $this->errors[] = new ErrorObject('An error occurred while getting API key information');
        return (empty($this->errors));
    }

    public function errors()
    {
        return (!empty($this->errors));
    }

}
