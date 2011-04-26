<?php
/**
 * adds a microformat to the head definition
 */
class Tx_CzSimpleCalSma_ViewHelpers_GetClassViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * add a microformat definition to the pages head
	 * 
	 * @param mixed $object
	 */
	public function render($object) {
		return get_class($object);
	}
}
?>