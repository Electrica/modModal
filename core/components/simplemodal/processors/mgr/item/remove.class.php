<?php

/**
 * Remove an s
 */
<<<<<<< HEAD
class modalWindowRemoveProcessor extends modObjectProcessor {
	public $objectType = 'modalWindow';
	public $classKey = 'modalWindow';
=======
class simpleModalItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'simpleModalItem';
	public $classKey = 'simpleModalItem';
>>>>>>> origin/master
	public $languageTopics = array('simplemodal');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('simplemodal__err_ns'));
		}

		foreach ($ids as $id) {
<<<<<<< HEAD
			/** @var modalWindow $object */
=======
			/** @var simpleModalItem $object */
>>>>>>> origin/master
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('simplemodal__err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

<<<<<<< HEAD
return 'modalWindowRemoveProcessor';
=======
return 'simpleModalItemRemoveProcessor';
>>>>>>> origin/master
