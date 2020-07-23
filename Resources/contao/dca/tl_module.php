<?php

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;

try{
$dca = new Helper\DcaHelper('tl_module');
$dca
    ->addField('text', 'apiKey')
    ->addField('text', 'authDomain')
    ->addField('text', 'databaseURL')
    ->addField('text', 'projectId')
    ->addField('text', 'storageBucket')
    ->addField('text', 'messagingSenderId')
    ->addField('text', 'appId')
    ->addField('text', 'measurementId')

    ->copyPalette('default', 'mod_pushee')
    ->addPaletteGroup('mod_pushee',[
        'apiKey',
        'authDomain',
        'databaseURL',
        'projectId',
        'storageBucket',
        'messagingSenderId',
        'appId',
        'measurementId'
    ], 'mod_pushee')

;

}catch(\Exception $e){
var_dump($e);
}
