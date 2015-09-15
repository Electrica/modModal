<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modModal $modModal */
$modModal = $modx->getService('modmodal', 'modModal', $modx->getOption('modmodal_core_path', null, $modx->getOption('core_path') . 'components/modmodal/') . 'model/modmodal/');
$modx->lexicon->load('modmodal:default');

// handle request
$corePath = $modx->getOption('modmodal_core_path', null, $modx->getOption('core_path') . 'components/modmodal/');
$path = $modx->getOption('processorsPath', $modModal->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));