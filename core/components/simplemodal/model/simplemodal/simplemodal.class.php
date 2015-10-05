<?php

/**
 * The base class for simpleModal.
 */
class simpleModal {
	/* @var modX $modx */
	public $modx;


	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array()) {
		$this->modx =& $modx;

		$corePath = $this->modx->getOption('simplemodal_core_path', $config, $this->modx->getOption('core_path') . 'components/simplemodal/');
		$assetsUrl = $this->modx->getOption('simplemodal_assets_url', $config, $this->modx->getOption('assets_url') . 'components/simplemodal/');
		$connectorUrl = $assetsUrl . 'connector.php';

		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'cssUrl' => $assetsUrl . 'css/',
			'jsUrl' => $assetsUrl . 'js/',
			'imagesUrl' => $assetsUrl . 'images/',
			'connectorUrl' => $connectorUrl,

			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'templatesPath' => $corePath . 'elements/templates/',
			'chunkSuffix' => '.chunk.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/',
			'processorsPath' => $corePath . 'processors/'
		), $config);

		$this->modx->addPackage('simplemodal', $this->config['modelPath']);
		$this->modx->lexicon->load('simplemodal:default');
	}

    /** @param bool|false $id */

    public function getResourceId($id = false){

        $user = $this->modx->getUser()->toArray();


        /**
         *
         *  1.Проверить наличие ресурса. Если нет то показывать везде
         *  2.Проверить наличие юзера. Если нету то показывать всем юзерам
         *  3.Проверить наличие группу. Если нет то показывать всем.
         *  4.Проверить наличие чанка. Если нет то установить чанк по умолчанию.
         *
         */

        $obj = $this->modx->getCollection('modalWindow', array(
            'active' => 1
        ));

        if(!count($obj)){
            return false;
        }

        $data = array();

        foreach($obj as $k => $v){
            if($v->resource == 0 || $v->resource == $id){
                if($v->user == 0 || $v->user == $user['id']){
                    if($v->group == 0 || $v->group == $user['primary_group']){
                        return $data[$v->resource] = $v->toArray();
                    }
                }
            }
        }
    }

}