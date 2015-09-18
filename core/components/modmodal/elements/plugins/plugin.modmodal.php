<?php

switch ($modx->event->name) {

    case('OnWebPagePrerender'):


        if($modx->getOption('modmodal_active')){

            $id = $modx->resourceIdentifier;

            if($modx->getOption('modmodal_include_jquery')){
                $modx->regClientScript($modx->getOption('assets_url') . 'components/modmodal/js/web/jquery-1.11.3.min.js');
            }
            $modx->regClientCSS($modx->getOption('assets_url') . 'components/modmodal/css/web/jquery.arcticmodal-0.3.css');

            $html = $modx->getChunk($modx->getOption('modmodal_chunk'));

            if(strpos($modx->resource->_output, '</body>') !== false){
                $modx->resource->_output = preg_replace("/(<\/body>)/i", $html . "\n\\1", $modx->resource->_output, true);
            }

        }

        break;

    default:
        break;

}