<?php

$settings = array();

$tmp = array(
	'id' => array(
		'xtype' => 'textfield',
		'value' => '',
		'area' => 'modmodal_main',
	),
	'chunk' => array(
		'xtype' => 'textfield',
		'value' => 'tpl.modmodal',
		'area' => 'modmodal_main'
	),
	'active' => array(
		'xtype' => 'combo-boolean',
		'value' => false,
		'area' => 'modmodal_main'
	),
	'include_jquery' => array(
		'xtype' => 'combo-boolean',
		'value' => false,
		'area' => 'modmodal_main'
	),
	'themes' => array(
		'xtype' => 'textfield',
		'value' => '{assets_url}components/modmodal/css/web/themes/simple.css',
		'area' => 'modmodal_main'
	),
	'delay' => array(
		'xtype' => 'textfield',
		'value' => '',
		'area' => 'modmodal_main'
	)
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'modmodal_' . $k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	), '', true, true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
