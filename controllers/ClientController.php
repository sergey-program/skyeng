<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\models\Client;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * Class ClientController
 *
 * @package app\controllers
 */
class ClientController extends AbstractController
{
    public $defaultAction = 'list';

    /**
     * @return string
     */
    public function actionList()
    {
        $query = Client::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $this->render('list', ['dataProvider' => $dataProvider]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $client = new Client();
        $client->inviterID = 1; // we know that adminID is 1

        if ($this->isPost() && $client->load($this->post())) {
            if ($client->save()) {
                return $this->redirect(['list']);
            }
        }

        return $this->render('create', ['client' => $client]);
    }

    /**
     * @param int $id
     *
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $client = $this->loadClient($id);

        if ($this->isPost() && $client->load($this->post())) {
            if ($client->save()) {
                return $this->redirect(['list']);
            }
        }

        return $this->render('update', ['client' => $client]);
    }

    /**
     * @param int $id
     *
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        $client = $this->loadClient($id, false);
        if ($client) {
            $client->delete();
        }

        return $this->redirect(['list']);
    }

    /**
     * @param int  $id
     * @param bool $exception
     *
     * @return null|Client
     * @throws NotFoundHttpException
     */
    public function loadClient($id, $exception = true)
    {
        $model = Client::findOne($id);

        if (!$model && $exception) {
            throw new NotFoundHttpException('Client not found.');
        }

        return $model;
    }
}