<?php

/**
 * Disable an Item
 */
<<<<<<< HEAD
class simpleModalDisableProcessor extends modObjectProcessor {
	public $objectType = 'simpleModal';
	public $classKey = 'modalWindow';
=======
class simpleModalItemDisableProcessor extends modObjectProcessor {
	public $objectType = 'simpleModalItem';
	public $classKey = 'simpleModalItem';
>>>>>>> origin/master
	public $languageTopics = array('simplemodal');
	//public $permission = 'save';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('simplemodal_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var simpleModalItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('simplemodal_item_err_nf'));
			}

			$object->set('active', false);
			$object->save();
		}

		return $this->success();
	}

}

<<<<<<< HEAD
return 'simpleModalDisableProcessor';
=======
return 'simpleModalItemDisableProcessor';
>>>>>>> origin/master
