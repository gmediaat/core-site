<?php

namespace Gmedia\CoreSite\TypoScript;

use Neos\Flow\Annotations as Flow;
use Neos\TypoScript\TypoScriptObjects\AbstractTypoScriptObject;

class StylesImplementation extends AbstractTypoScriptObject {
    public function evaluate() {
		$property = $this->tsValue('property');
		$value = $this->tsValue('value');
		return $property.":".$value.";";
    }
}
	
?>