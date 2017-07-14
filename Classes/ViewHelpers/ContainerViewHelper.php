<?php

namespace Gmedia\CoreSite\ViewHelpers;

use Neos\Flow\Annotations as Flow;
use Neos\Fluid\Core\ViewHelper\AbstractViewHelper;
use Neos\Fluid\Core\ViewHelper;
use Neos\Media\Domain\Model\AssetInterface;
use Neos\Media\Domain\Model\ImageInterface;
use Neos\Media\Domain\Model\ThumbnailConfiguration;
use Neos\Flow\Utility\Algorithms;

class ContainerViewHelper extends \Neos\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	/**
     * @var boolean
     */
    protected $escapeOutput = false;
	
	/**
     * @Flow\Inject
     * @var \Neos\Media\Domain\Service\ThumbnailService
     */
    protected $thumbnailService;
	
	/**
     * @Flow\Inject
     * @var \Neos\Media\Domain\Service\AssetService
     */
	protected $assetService;
	
	/*public function initializeArguments() {
		parent::initializeArguments();
		//$this->registerUniversalTagAttributes();
	}

    /**
     * Render the title and apply some magic
     *
     * @return string Translated label or source label / ID key
     * @throws \Neos\Fluid\Core\ViewHelper\Exception
     */
    public function render($layout = false, $nospacing = false, $vspacing = true, $bgcolor = "", $bgimage = NULL, $bgpos = "", $additionalClasses = "") {
	    // Create Object ID
		$uuid = Algorithms::generateUUID();
    
        if($this->getStylesString() != null) {
        	$outputStr = '<style>#node-'.$uuid.'{'.$this->getStylesString().'}</style>';
        } else {
	        $outputStr = "";
        }
        $outputStr .= '<section class="'.$this->getOuterClassString().'" id="node-'.$uuid.'">';
        $outputStr .= '<div class="'.$this->getInnerClassString().'">';
        $outputStr .= $this->renderChildren();
        $outputStr .= '</div></section>';
        return $outputStr;
    }
    
    public function getOuterClassString() {
	    $classes = array();
	    
	    $classes[] = "gc-container";
	    
	    if($this->arguments["vspacing"])
	    	$classes[] = "container-vspacing";
	    	
	    $outputStr = "";
	    foreach($classes as $class) {
		    $outputStr .= $class." ";
	    }
	    
	    return $outputStr;
    }
    
    private function getInnerClassString() {
        $classes = array();
        
        // Default Class
        //$classes[] = "gc-container";
        
        // Width Class
        if($this->arguments["layout"]) {
	        $classes[] = "container";
	    } else {
	        $classes[] = "container-fluid";
        }
        
        // Nospacing Class
        if(!$this->arguments["nospacing"])
	        $classes[] = "container-nospacing";
	        
	    // Additional Classes
	    if($this->arguments["additionalClasses"])
	    	$classes[] = $this->arguments["additionalClasses"];
	        
	    $outputStr = "";
	    foreach($classes as $class) {
		    $outputStr .= $class." ";
	    }
	    
	    return $outputStr;
	    
    }
    
    private function getStylesString() {
        $styles = array();
        
        // Background Color
        if($this->arguments["bgcolor"] != "")
        	$styles["background-color"] = $this->arguments["bgcolor"];
        
        // Background Image
        if($this->arguments["bgimage"] != NULL) {
	        $thumbnailConfiguration = new ThumbnailConfiguration(null, null, null, null, false, false);
        	$uri = $this->assetService->getThumbnailUriAndSizeForAsset($this->arguments["bgimage"], $thumbnailConfiguration)['src'];
        	$styles["background-image"] = "url(".$uri.")";
        }
        	
        // Background Image Position
        if($this->arguments["bgpos"] != "")
        	$styles["background-position"] = $this->arguments["bgpos"];
        
        if(count($styles) > 0) {
	        $outputStr = "";
	        foreach($styles as $key => $value) {
		        $outputStr .= $key.":".$value.";";
	        }
	        
	        return $outputStr;
	    }
	    
	    return null;
    }
}	
	
?>