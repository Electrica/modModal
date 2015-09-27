<?php
// For debug
ini_set('display_errors', 1);
ini_set('error_reporting', -1);

// Load MODX config
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
	require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
	require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';
$corePath = $modx->getOption('simplemodal_core_path', null, $modx->getOption('core_path') . 'components/simplemodal/');
require_once $corePath . 'model/simplemodal/simplemodal.class.php';
$modx->simplemodal = new simplemodal($modx);
$modx->lexicon->load('simplemodal:default');
/* handle request */
$path = $modx->getOption('processorsPath', $modx->simplemodal->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));