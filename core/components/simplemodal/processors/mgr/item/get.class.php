<?php

/**
 * Get an Item
 */
<<<<<<< HEAD
class simpleModalGetProcessor extends modObjectGetProcessor {
	public $objectType = 'simpleModal';
	public $classKey = 'modalWindow';
=======
class simpleModalItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'simpleModalItem';
	public $classKey = 'simpleModalItem';
>>>>>>> origin/master
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

<<<<<<< HEAD
return 'simpleModalGetProcessor';
=======
return 'simpleModalItemGetProcessor';
>>>>>>> origin/master
