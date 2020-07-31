<?php

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;

try{
    $dca = new Helper\DcaHelper('tl_pushee');
    $dca
        #-- Config ---
        ->addConfig('liste')
        #-- List ---
        ->addList('base')
        #-- Sorting --------------------------------------------------------------------------------------------------------
        ->addSorting('liste')
        #-- Fields ---
        ->addField('id', 'id')
        ->addField('tstamp', 'tstamp')
        ->addField('name', 'name')
        ->addField('published', 'published')
        ->addField('alias','alias')
        ->addField('text', 'token')
    ;

}catch(\Exception $e){
    var_dump($e);
}
