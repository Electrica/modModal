<?php

switch ($modx->event->name) {

    case('OnWebPageInit'):

        if($modx->getOption('modmodal_active')){



            $modx->regClientCSS($modx->getOption('assets_url') . 'components/modmodal/css/web/jquery.arcticmodal-0.3.css');
        }

        break;

}