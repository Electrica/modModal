<?php

$settings = array();

$tmp = array(
	'id_json' => array(
		'xtype' => 'textfield',
		'value' => '[{"id":1,"chunk":"tpl.modmodal","delay":2000,"time":60}]',
		'area' => 'modmodal_main',
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
