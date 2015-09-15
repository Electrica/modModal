<?php

/**
 * Enable an Item
 */
class modModalItemEnableProcessor extends modObjectProcessor {
	public $objectType = 'modModalItem';
	public $classKey = 'modModalItem';
	public $languageTopics = array('modmodal');
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
			return $this->failure($this->modx->lexicon('modmodal_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var modModalItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('modmodal_item_err_nf'));
			}

			$object->set('active', true);
			$object->save();
		}

		return $this->success();
	}

}

return 'modModalItemEnableProcessor';
