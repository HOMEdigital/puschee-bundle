<?php


namespace Home\PusheeBundle\Resources\contao\models;


use Contao\Model;

class PusheeModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_pushee';

    /**
     * @param $token
     * @return Model|Model[]|Model\Collection|PusheeModel|null
     */
    public static function findByToken($token)
    {
        return self::findBy(array(
            self::getTable() . '.token = "' . $token . '"'
        ), null);
    }

    /**
     * @param $token
     * @return array
     */
    public static function saveToken($token)
    {
        #-- check if token is already in db
        $inDb = self::findByToken($token);
        if($inDb instanceof Model\Collection){
            return ["success"=>true,"note"=>"Bereits in DB"];
        }else{
            $shortToken = substr($token, 0, 20);

            $model = new PusheeModel();
            $model->__set('name', $shortToken);
            $model->__set('alias', $shortToken);
            $model->__set('tstamp', time());
            $model->__set('token', $token);
            $model->save();

            return ["success"=>true,"note"=>"In DB gespeichert"];
        }
    }

    /**
     * @param $token
     * @return bool
     */
    public static function removeToken($token)
    {
        $model = self::findByToken($token);

        if($model instanceof Model\Collection){
            $model->delete();
            return true;
        }

        return false;
    }
}
