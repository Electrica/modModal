<?php

/**
 * Class modModalMainController
 */
abstract class modModalMainController extends modExtraManagerController {
	/** @var modModal $modModal */
	public $modModal;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('modmodal_core_path', null, $this->modx->getOption('core_path') . 'components/modmodal/');
		require_once $corePath . 'model/modmodal/modmodal.class.php';

		$this->modModal = new modModal($this->modx);
		//$this->addCss($this->modModal->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->modModal->config['jsUrl'] . 'mgr/modmodal.js');
		$this->addHtml('
		<script type="text/javascript">
			modModal.config = ' . $this->modx->toJSON($this->modModal->config) . ';
			modModal.config.connector_url = "' . $this->modModal->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('modmodal:default');
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
class IndexManagerController extends modModalMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}