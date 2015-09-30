<?php

/**
 * Remove an s
 */
class modalWindowRemoveProcessor extends modObjectProcessor {
	public $objectType = 'modalWindow';
	public $classKey = 'modalWindow';
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
			/** @var modalWindow $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('simplemodal__err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}
return 'modalWindowRemoveProcessor';