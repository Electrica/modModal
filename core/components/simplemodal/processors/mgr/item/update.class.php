<?php

/**
 * Update an Item
 */
class modalWindowUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'modalWindow';
	public $classKey = 'modalWindow';
	public $languageTopics = array('simplemodal');
	//public $permission = 'save';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return bool|string
	 */
	public function beforeSave() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id');
		$name = trim($this->getProperty('name'));
        $user = trim($this->getProperty('user'));
        $group = trim($this->getProperty('group'));
		if (empty($id)) {
			return $this->modx->lexicon('simplemodal_item_err_ns');
		}

		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('simplemodal_item_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name, 'id:!=' => $id))) {
			$this->modx->error->addField('name', $this->modx->lexicon('simplemodal_item_err_ae'));
		}

//        if($this->modx->getCount('modalWindow', array('user' => $user, 'id:!=' => $id))){
//            $this->modx->error->addField('user', $this->modx->lexicon('simplemodal_user_no_empty'));
//        }

        if($this->modx->getCount('modalWindow', array('group' => $group, 'id:!=' => $id))){

            if($this->modx->getCount('modalWindow', array('user' => $user))){
                $this->modx->error->addField('group', $this->modx->lexicon('simplemodal_group_no_empty'));
            }
        }


		return parent::beforeSet();
	}
}

return 'modalWindowUpdateProcessor';
