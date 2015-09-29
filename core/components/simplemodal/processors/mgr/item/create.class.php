<?php

/**
 * Create an Item
 */
<<<<<<< HEAD
class modalWindowCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'modalWindow';
	public $classKey = 'modalWindow';
=======
class simpleModalItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'simpleModalItem';
	public $classKey = 'simpleModalItem';
>>>>>>> origin/master
	public $languageTopics = array('simplemodal');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));
		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('simplemodal_item_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
			$this->modx->error->addField('name', $this->modx->lexicon('simplemodal_item_err_ae'));
		}

		return parent::beforeSet();
	}

}

<<<<<<< HEAD
return 'modalWindowCreateProcessor';
=======
return 'simpleModalItemCreateProcessor';
>>>>>>> origin/master
