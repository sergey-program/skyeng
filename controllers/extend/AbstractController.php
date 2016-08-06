<?php

namespace app\controllers\extend;

use app\models\User;
use yii\web\Controller;

/**
 * Class AbstractController
 *
 * @package app\controllers\extend
 */
abstract class AbstractController extends Controller
{
    public function init(){
        parent::init();
        if (\Yii::$app->user->isGuest){
            /** @var User $admin */
            $admin = User::findOne(1);
            \Yii::$app->user->login($admin);
        }
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return \Yii::$app->request->isPost;
    }

    /**
     * @param string|null $name
     * @param mixed|null  $defaultValue
     *
     * @return array|mixed
     */
    public function post($name = null, $defaultValue = null)
    {
        return \Yii::$app->request->post($name, $defaultValue);
    }

    /**
     * @param string|null $name
     * @param mixed|null  $defaultValue
     *
     * @return array|mixed
     */
    public function get($name = null, $defaultValue = null)
    {
        return \Yii::$app->request->get($name, $defaultValue);
    }

}