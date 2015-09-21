<?php

$id = $modx->resourceIdentifier;
$delay = $modx->getOption('modmodal_delay') ? $modx->getOption('modmodal_delay') : 5000;
$event = $modx->event->name;

if($event == 'OnWebPageInit' || $event == 'OnWebPagePrerender'){

    if($modx->getOption('modmodal_active')){

        if($modx->getOption('modmodal_id') == $id){
            if($modx->getOption('modmodal_include_jquery')){
                $modx->regClientScript($modx->getOption('assets_url') . 'components/modmodal/js/web/jquery-1.11.3.min.js');
            }


            $modx->regClientCSS($modx->getOption('assets_url') . 'components/modmodal/css/web/jquery.arcticmodal-0.3.css');
            $modx->regClientCSS($modx->getOption('modmodal_themes'));
            $modx->regClientScript($modx->getOption('assets_url') . 'components/modmodal/js/web/jquery.arcticmodal-0.3.min.js');

            $main_js = file_get_contents($modx->getOption('assets_path') . 'components/modmodal/js/web/main.js');
            $main_js = str_replace('delay_time', $delay, $main_js);
            $modx->regClientHTMLBlock('<script>' . $main_js . '</script>');

            $html = $modx->getChunk($modx->getOption('modmodal_chunk'));

            $modx->parser->processElementTags('', $html, true, false, '[[', ']]', array(), 10);
            $modx->parser->processElementTags('', $html, true, true, '[[', ']]', array(), 10);

            if(strpos($modx->resource->_output, '</body>') !== false){
                $modx->resource->_output = preg_replace("/(<\/body>)/i", $html . "\n\\1", $modx->resource->_output, true);
            }
        }
    }

}