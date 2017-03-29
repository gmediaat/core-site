<?php

namespace Gmedia\CoreSite\TypoScript;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject;

class StylesImplementation extends AbstractTypoScriptObject {
    public function evaluate() {
		$property = $this->tsValue('property');
		$value = $this->tsValue('value');
		return $property.":".$value.";";
    }
}
	
?>