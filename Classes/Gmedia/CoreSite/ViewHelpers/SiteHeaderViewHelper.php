<?php

namespace Gmedia\CoreSite\ViewHelpers;

class SiteHeaderViewHelper extends \Neos\Fluid\Core\ViewHelper\AbstractViewHelper {
        /**
         * Render the title and apply some magic
         *
         * @param string $containerClass container class
         * @param string $title title of the site header
         * @param string $lead lead text of the site header
         * @param string $leadClass class of the lead text
         * @param string $buttons html of the content section
         * @return string rendered html
         * @throws \Neos\Fluid\Core\ViewHelper\Exception
         */
        public function render($containerClass = "site-header-inner", $orientation = 0, $title = NULL, $lead = NULL, $leadClass = "lead", $buttons = NULL) {

                // Create Object ID
                
                
                $output = '<div class="'.$containerClass.'">';
				
				if($title != "" && $title != NULL) {
					$output .= '<h1>'.$title.'</h1>';
				}
				
				if($lead != "" && $lead != NULL) {
					$output .= '<p class="'.$leadClass.'">'.$lead.'</p>';
					
				}
				
				if($buttons != "" && $buttons != NULL) {
					$output .= $buttons;
				}
					
				$output .= '</div>';
				
				return $output;
        }
}	
	
?>