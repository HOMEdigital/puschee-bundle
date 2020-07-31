<?php


namespace Home\PusheeBundle\Resources\contao\modules;


use Contao\BackendModule;
use Contao\Model\Collection;
use Contao\ModuleModel;
use Home\PusheeBundle\Resources\contao\models\PusheeModel;

class PusheeBeModule extends BackendModule
{
    /**
     * @var string
     */
    protected $strTemplate = 'mod_be_pushee';

    /**
     * Generate module
     */
    protected function compile()
    {
        $GLOBALS['TL_JAVASCRIPT'][] = '/assets/jquery/js/jquery.min.js|static';
        $serverKey = false;
        $token = false;

        $feModule = ModuleModel::findBy(array(
            ModuleModel::getTable() . '.type = "mod_pushee"'
        ), null);

        if($feModule instanceof Collection){
            $row = $feModule->row();
            $serverKey = $row['serverKey'];
        }

        $tokenModel = PusheeModel::findAll();
        if($tokenModel instanceof Collection){
            $tokenArr = $tokenModel->fetchAll();
            if(is_array($tokenArr) && count($tokenArr) > 0){
                foreach ($tokenArr as $row){
                    $token[] = $row['token'];
                }
            }
        }

        $this->Template->serverKey = $serverKey;
        $this->Template->token = $token;
    }

}
