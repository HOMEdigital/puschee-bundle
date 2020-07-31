<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:50
 */

#-- add backend modules ------------------------------------------------------------------------------------------------
array_insert($GLOBALS['BE_MOD']['content'], 3 ,[
    'pushee' => [
        'tables' => ['tl_pushee'],
        #'table' => ['TableWizard', 'importTable'],
        #'list' => ['ListWizard', 'importList'],
        'callback' => 'Home\PusheeBundle\Resources\contao\modules\PusheeBeModule',
    ],
]);

#-- add frontend modules -----------------------------------------------------------------------------------------------
array_insert($GLOBALS['FE_MOD'], 2, array
(
    'pushee' => array
    (
        'mod_pushee' => 'Home\PusheeBundle\Resources\contao\modules\PusheeModule'
    ),
));

#-- add models ---------------------------------------------------------------------------------------------------------
$GLOBALS['TL_MODELS']['tl_pushee'] = 'Home\PusheeBundle\Resources\contao\models\PusheeModel';
