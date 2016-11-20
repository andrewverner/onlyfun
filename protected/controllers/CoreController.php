<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 0:45
 */

class CoreController extends Controller
{

    public function init()
    {
        if (Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl);
    }

    public function actionIndex()
    {
        $character = new EveXMLCharacterSheet(
            Yii::app()->user->character->keyID,
            Yii::app()->user->character->vCode,
            Yii::app()->user->character->characterID
        );

        $corporation = new EveXMLPublicCorporationSheet($character->corporationID);

        $this->render('index', [
            'character'     => $character,
            'corporation'   => $corporation
        ]);
    }

    public function actionApps()
    {
        if (!Yii::app()->user->character->isCeo) throw new CHttpException(403);

        $cr = new CDbCriteria();
        $cr->condition = 'corporationID = :coprID';
        $cr->params = [
            ':coprID' => Yii::app()->user->character->corporationID
        ];
        $count = Application::model()->count($cr);
        $pages = new CPagination($count);

        $pages->pageSize = 20;
        $pages->applyLimit($cr);
        $models = Application::model()->findAll($cr);

        $this->render('apps', array(
            'models' => $models,
            'pages' => $pages,
            'character' => Yii::app()->user->character
        ));
    }

    public function actionApp($id)
    {
        if (Yii::app()->user->isGuest || !Yii::app()->user->character->isCeo) throw new CHttpException(403);
        $app = Application::model()->findByPk($id);
        if (!$app) throw new CHttpException(404);
        if ($app->corporationID != Yii::app()->user->character->corporationID) throw new CHttpException(403);

        $apiKeyValidator = new EveXMLAPIKeyValidator($app->keyID, $app->vCode);
        $keyInfo = false;
        $accountStatus = false;
        if ($apiKeyValidator) {
            $account = new EveXMLAccount($app->keyID, $app->vCode);
            if ($account) {
                $keyInfo = $account->apiKeyInfo();
                $accountStatus = $account->accountStatus();
            }
        }

        $this->render('app', [
            'validator' => $apiKeyValidator,
            'keyInfo' => $keyInfo,
            'accountStatus' => $accountStatus
        ]);
    }

}
