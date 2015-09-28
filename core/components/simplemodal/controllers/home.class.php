<?php

/**
 * The home manager controller for simpleModal.
 *
 */
class simpleModalHomeManagerController extends simpleModalMainController {
	/* @var simpleModal $simpleModal */
	public $simpleModal;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('simplemodal');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->simpleModal->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->simpleModal->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->simpleModal->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->simpleModal->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->simpleModal->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->simpleModal->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->simpleModal->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "simplemodal-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->simpleModal->config['templatesPath'] . 'home.tpl';
	}
}