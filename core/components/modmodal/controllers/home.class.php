<?php

/**
 * The home manager controller for modModal.
 *
 */
class modModalHomeManagerController extends modModalMainController {
	/* @var modModal $modModal */
	public $modModal;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('modmodal');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->modModal->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->modModal->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->modModal->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->modModal->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->modModal->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->modModal->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->modModal->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "modmodal-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->modModal->config['templatesPath'] . 'home.tpl';
	}
}