<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

// default typoscript
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/main', 'default config');


t3lib_div::loadTCA('tx_czsimplecal_domain_model_event');

/* 
 * basic setup
 */

// add a tab for this extension on domain_model_event records
t3lib_extMgm::addToAllTCAtypes(
	'tx_czsimplecal_domain_model_event',
	'--div--;LLL:EXT:cz_simple_cal_sma/Resources/Private/Language/locallang_db.xml:tx_czsimplecal_domain_model_event.tab_socialmedia'
);

// add descriptions to domain models
t3lib_extMgm::addLLrefForTCAdescr('tx_czsimplecal_domain_model_event', 'EXT:cz_simple_cal_sma/Resources/Private/Language/locallang_csh_tx_czsimplecal_domain_model_event.xml');

if(!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['cz_simple_cal_sma']) {
	
	// if: the update button was not hit
	
	$message = t3lib_div::makeInstance(
	    't3lib_FlashMessage',
	    'Please hit the "UPDATE" botton on the extension '.$_EXTKEY.' in the extension manager.',
	    '',
	    t3lib_FlashMessage::INFO
	);
	t3lib_FlashMessageQueue::addMessage($message);
} else {
	$config = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['cz_simple_cal_sma']);
	
	
	if($config['enableTwitterHashtags']) {
		// if: enableTwitterHashtags 
		t3lib_extMgm::addTCAcolumns(
			'tx_czsimplecal_domain_model_event',
			array(
				'tx_czsimplecalsma_twitter_hashtags' => array(
					'exclude' => 1,
					'label'   => 'LLL:EXT:cz_simple_cal_sma/Resources/Private/Language/locallang_db.xml:tx_czsimplecal_domain_model_event.tx_czsimplecalsma_twitter_hashtags',
					'config'  => array(
						'type' => 'input',
						'size' => 30,
						'max'  => 255,
						'eval' => 'trim'
					)
				),
			),
			false
		);
		
		t3lib_extMgm::addToAllTCAtypes(
			'tx_czsimplecal_domain_model_event',
			'tx_czsimplecalsma_twitter_hashtags'
		);
	}
	
	if($config['enableFlickrTags']) {
		//if: enabledFlickrTags
		t3lib_extMgm::addTCAcolumns(
			'tx_czsimplecal_domain_model_event',
			array(
				'tx_czsimplecalsma_flickr_tags' => array(
					'exclude' => 1,
					'label'   => 'LLL:EXT:cz_simple_cal_sma/Resources/Private/Language/locallang_db.xml:tx_czsimplecal_domain_model_event.tx_czsimplecalsma_flickr_tags',
					'config'  => array(
						'type' => 'input',
						'size' => 30,
						'max'  => 255,
						'eval' => 'trim'
					)
				),
			),
			false
		);
		
		t3lib_extMgm::addToAllTCAtypes(
			'tx_czsimplecal_domain_model_event',
			'tx_czsimplecalsma_flickr_tags'
		);
	}
}
	
	



?>