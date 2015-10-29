<?php
/**
 * @var modx $modx
 */

if(!$modx->getOption('simplemodal_active')){return;}

$event = $modx->event->name;
$id = $modx->resourceIdentifier;
$simpleModal = $modx->getService('simplemodal', 'simpleModal', $modx->getOption('simplemodal_core_path',null,$modx->getOption('core_path').'components/simplemodal/') . 'model/simplemodal/',$scriptProperties);
/**
 * @var simpleModal $simpleModal
 */

if($event == 'OnWebPageInit' || $event == 'OnWebPagePrerender'){

    $data = $simpleModal->getResourceId($id);

    if($data){
        if($modx->getOption('simplemodal_include_jquery')){
            $modx->regClientScript($modx->getOption('assets_url') . 'components/simplemodal/js/web/jquery-1.11.3.min.js');
        }

        $modx->regClientCSS($modx->getOption('assets_url') . 'components/simplemodal/css/web/jquery.arcticmodal-0.3.css');
        $modx->regClientCSS($modx->getOption('simplemodal_themes'));
        $modx->regClientScript($modx->getOption('assets_url') . 'components/simplemodal/js/web/jquery.arcticmodal-0.3.min.js');
        //$modx->regClientScript($modx->getOption('assets_url') . 'components/simplemodal/js/web/main.js');

        /**
         * @TODO сделать кнопку "Больше не показывать"
         * $modx->regClientScript($modx->getOption('assets_url') . 'components/simplemodal/js/web/custom.js');
         */

        $main_js = file_get_contents($modx->getOption('assets_path') . 'components/simplemodal/js/web/main.js');
        $main_js = str_replace('delay_time', $data['time_delay'], $main_js);
        $modx->regClientHTMLBlock('<script>' . $main_js . '</script>');

        $html = $modx->getChunk($data['chunk']);

        $modx->parser->processElementTags('', $html, true, false, '[[', ']]', array(), 10);
        $modx->parser->processElementTags('', $html, true, true, '[[', ']]', array(), 10);

        if(strpos($modx->resource->_output, '</body>') !== false && !$_COOKIE['simplemodal-' . $modx->resourceIdentifier]){
            $modx->resource->_output = preg_replace("/(<\/body>)/i", $html . "\n\\1", $modx->resource->_output, true);
            setcookie('simplemodal-' . $modx->resourceIdentifier, true, time() + $data['coockie']);
        }
    }
}