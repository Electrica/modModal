<?php

/**
 * Class simplemodalMainController
 */
abstract class simplemodalMainController extends modExtraManagerController {
	/** @var simplemodal $simplemodal */
	public $simplemodal;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('simplemodal_core_path', null, $this->modx->getOption('core_path') . 'components/simplemodal/');
		require_once $corePath . 'model/simplemodal/simplemodal.class.php';

		$this->simplemodal = new simplemodal($this->modx);

		$this->modx->regClientCSS($this->simplemodal->config['cssUrl'] . 'mgr/main.css');
		$this->modx->regClientStartupScript($this->simplemodal->config['jsUrl'] . 'mgr/simplemodal.js');
		$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
		Ext.onReady(function() {
			simplemodal.config = ' . $this->modx->toJSON($this->simplemodal->config) . ';
			simplemodal.config.connector_url = "' . $this->simplemodal->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('simplemodal:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends simplemodalMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}