<?php


namespace Home\PusheeBundle\Controller;

use Home\PusheeBundle\Resources\contao\models\PusheeModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PusheeController extends Controller
{
    /**
     *
     * @Route("/pushee/addToken", name="pushee_add_token")
     *
     * @return JsonResponse
     */
    public function addToken()
    {
        $this->container->get('contao.framework')->initialize();

        $token = $_POST["token"];
        $result = PusheeModel::saveToken($token);

        return new JsonResponse($result);
    }

    /**
     *
     * @Route("/pushee/removeToken", name="pushee_remove_token")
     *
     * @return JsonResponse
     */
    public function removeToken()
    {
        $this->container->get('contao.framework')->initialize();

        $result = [];
        $tokenArr = $_POST["token"];

        if(is_array($tokenArr) && count($tokenArr) > 0){
            foreach ($tokenArr as $token){
                $result[] = PusheeModel::removeToken($token);
            }
        }

        return new JsonResponse($result);
    }
}
