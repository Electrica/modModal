<?php

/**
 * Class simpleModalMainController
 */
abstract class simpleModalMainController extends modExtraManagerController {
	/** @var simpleModal $simpleModal */
	public $simpleModal;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('simplemodal_core_path', null, $this->modx->getOption('core_path') . 'components/simplemodal/');
		require_once $corePath . 'model/simplemodal/simplemodal.class.php';

		$this->simpleModal = new simpleModal($this->modx);
		//$this->addCss($this->simpleModal->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->simpleModal->config['jsUrl'] . 'mgr/simplemodal.js');
		$this->addHtml('
		<script type="text/javascript">
			simpleModal.config = ' . $this->modx->toJSON($this->simpleModal->config) . ';
			simpleModal.config.connector_url = "' . $this->simpleModal->config['connectorUrl'] . '";
		</script>
		');

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
class IndexManagerController extends simpleModalMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}