<?php

/**
 * Get an Item
 */
class modalWindowGetProcessor extends modObjectGetProcessor {
	public $objectType = 'modalWindow';
	public $classKey = 'modalWindow';
	public $languageTopics = array('simplemodal:default');
	//public $permission = 'view';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return mixed
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		return parent::process();
	}

}
return 'modalWindowGetProcessor';
