<?php

/**
 * Remove an Items
 */
class simplemodalItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'simplemodalItem';
	public $classKey = 'simplemodalItem';
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
			return $this->failure($this->modx->lexicon('simplemodal_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var simplemodalItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('simplemodal_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'simplemodalItemRemoveProcessor';