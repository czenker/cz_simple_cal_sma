<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Christian Zenker <christian.zenker@599media.de>, 599media GmbH
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * extend the Event Domain Model for some tags
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_CzSimpleCalSma_Domain_Model_Event extends Tx_CzSimpleCal_Domain_Model_Event {

	/**
	 * @var string
	 */
	protected $tx_czsimplecalsma_twitter_hashtags = null;
	
	/**
	 * @var string
	 */
	protected $tx_czsimplecalsma_flickr_tags = null;
	
	public function getTwitterHashtags() {
		return 'hashtags';
	}
	
	public function getFlickrTags() {
		return 'flickrtags';
	}
	
	
}
?>