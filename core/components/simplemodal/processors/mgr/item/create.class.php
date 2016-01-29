<?php

/**
 * Create an Item
 */
class modalWindowCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'modalWindow';
	public $classKey = 'modalWindow';
	public $languageTopics = array('simplemodal');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));
        $group = trim($this->getProperty('group'));
        $user = trim($this->getProperty('user'));

        $this->modx->log(1, $name);
        $this->modx->log(1, $group);
        $this->modx->log(1, $user);
		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('simplemodal_item_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
			$this->modx->error->addField('name', $this->modx->lexicon('simplemodal_item_err_ae'));
		}

//        if($this->modx->getCount('modalWindow', array('group' => $group)) && $this->modx->getCount('modalWindow', array('user' => $user))){
//            $this->modx->error->addField('group', $this->modx->lexicon('simplemodal_group_no_empty'));
//        }

//        if($this->modx->getCount('modalWindow', array('user' => $user))){
//            $this->modx->error->addField('user', $this->modx->lexicon('simplemodal_user_no_empty'));
//        }

		return parent::beforeSet();
	}

}
return 'modalWindowCreateProcessor';
