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
	protected $txCzsimplecalsmaTwitterHashtags = null;
	
	/**
	 * a cached array of twitter hashtags
	 * @var array
	 */
	protected $txCzsimplecalsmaTwitterHashtags_ = null;
	
	/**
	 * @var string
	 */
	protected $txCzsimplecalsmaFlickrTags = null;
	
	/**
	 * a cached array of twitter hashtags
	 * @var array
	 */
	protected $txCzsimplecalsmaFlickrTags_ = null;
	
	/**
	 * get an array of twitter hashtags used for this event
	 * 
	 * @return array
	 */
	public function getTwitterHashtags() {
		if(is_null($this->txCzsimplecalsmaTwitterHashtags_)) {
			$this->buildTxCzSimpleCalSmaFlickrTags();
		}
		var_dump($this->txCzsimplecalsmaTwitterHashtags);
		return $this->txCzsimplecalsmaTwitterHashtags_;
	}
	
	/**
	 * get the first (and therefore "main") twitter hashtag
	 * 
	 * @return string|false
	 */
	public function getTwitterHashtag() {
		if(is_null($this->txCzsimplecalsmaTwitterHashtags_)) {
			$this->buildTxCzSimpleCalSmaFlickrTags();
		}
		
		return reset($this->txCzsimplecalsmaTwitterHashtags_);
	}
	
	/**
	 * build the array of flickr tags
	 * @return null
	 */
	protected function buildTxCzSimpleCalSmaFlickrTags() {
		$this->txCzsimplecalsmaTwitterHashtags_ = t3lib_div::trimExplode(',', $this->txCzsimplecalsmaTwitterHashtags, true);
		
		// make sure each tag starts with a hash ("#")
		foreach($this->txCzsimplecalsmaTwitterHashtags_ as &$hashtag) {
			if(strncmp($hashtag, '#', 1) !== 0) {
				$hashtag = '#'.$hashtag;
			}
		}
	}
	
	/**
	 * get an array of flickr
	 * 
	 * @return array
	 */
	public function getFlickrTags() {
		if(is_null($this->txCzsimplecalsmaFlickrTags_)) {
			$this->buildTxCzSimpleCalSmaTwitterHashtags();
		}
		return $this->txCzsimplecalsmaFlickrTags_;
	}
	
	/**
	 * get the first (an therefore "main") flickr tag
	 * 
	 * @return string|false
	 */
	public function getFlickrTag() {
		if(is_null($this->txCzsimplecalsmaFlickrTags_)) {
			$this->buildTxCzSimpleCalSmaTwitterHashtags();
		}
		
		return reset($this->txCzsimplecalsmaFlickrTags_);
	}
	
	/**
	 * build the array of twitter hashtags
	 * 
	 * @return null
	 */
	protected function buildTxCzSimpleCalSmaTwitterHashtags() {
		$this->txCzsimplecalsmaFlickrTags_ = t3lib_div::trimExplode(',', $this->txCzsimplecalsmaFlickrTags, true);
	}
	
	
}
?>