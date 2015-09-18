<?php

switch ($modx->event->name) {

    case('OnWebPageInit'):

        if($modx->getOption('modmodal_active')){

            $modx->regClientCSS($modx->getOption('modmodal_core_path', $config, $modx->getOption('core_path')) . 'components/modmodal/css/web/jquery.arcticmodal-0.3.css');
        }

        break;

}