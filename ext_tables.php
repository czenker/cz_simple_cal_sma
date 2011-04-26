<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');


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
	'tx_czsimplecalsma_twitter_hashtags,tx_czsimplecalsma_flickr_tags'
);



?>