<?php

namespace Gmedia\CoreSite\Fusion;

use Neos\Flow\Annotations as Flow;
use Neos\Fusion\FusionObjects\AbstractFusionObject;

class StylesImplementation extends AbstractFusionObject {
    public function evaluate() {
		$property = $this->tsValue('property');
		$value = $this->tsValue('value');
		return $property.":".$value.";";
    }
}
	
?>