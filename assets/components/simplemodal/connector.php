<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var simpleModal $simpleModal */
$simpleModal = $modx->getService('simplemodal', 'simpleModal', $modx->getOption('simplemodal_core_path', null, $modx->getOption('core_path') . 'components/simplemodal/') . 'model/simplemodal/');
$modx->lexicon->load('simplemodal:default');

// handle request
$corePath = $modx->getOption('simplemodal_core_path', null, $modx->getOption('core_path') . 'components/simplemodal/');
$path = $modx->getOption('processorsPath', $simpleModal->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));