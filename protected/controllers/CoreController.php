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

        $this->render('apps', [
            'models'    => $models,
            'pages'     => $pages,
            'character' => Yii::app()->user->character
        ]);
    }

    public function actionApp($id)
    {
        if (Yii::app()->user->isGuest || !Yii::app()->user->character->isCeo) throw new CHttpException(403);
        $app = Application::model()->findByPk($id);
        if (!$app) throw new CHttpException(404);
        if ($app->corporationID != Yii::app()->user->character->corporationID) throw new CHttpException(403);

        $apiKeyValidator = new EveXMLAPIKeyValidator($app->keyID, $app->vCode);
        $keyInfo = false;
        if ($apiKeyValidator->validate()) {
            $account = new EveXMLAccount($app->keyID, $app->vCode);
            if ($account) {
                $keyInfo = $account->apiKeyInfo();
            }
        }

        $this->render('app', [
            'validator' => $apiKeyValidator,
            'keyInfo'   => $keyInfo,
            'app'       => $app,
        ]);
    }

    public function actionPilot($id, $type = 'Sheet')
    {
        if (!Yii::app()->user->character->isCeo) throw new CHttpException(403);
        $app = Application::model()->findByAttributes([
            'characterID' => $id,
            'corporationID' => Yii::app()->user->character->corporationID
        ]);
        if (!$app) throw new CHttpException(404);

        $character = new EveXMLCharacter($app->keyID, $app->vCode, $app->characterID);

        $data = [];
        switch ($type) {
            case 'Sheet':
                $data['sheet'] = $character->getSheet();
                break;
            case 'Blueprints':
                $data['blueprints'] = $character->getBlueprints();
                break;
            case 'Bookmarks':
                $data['bookmarks'] = $character->getBookmarks();
                break;
            case 'Chats':
                $data['chats'] = $character->getChatChannels();
                break;
            case 'Events':
                $data['events'] = $character->getCalendarEvents();
                break;
            case 'Contacts':
                $data['contacts'] = $character->getContactList();
                break;
            default:
                throw new CHttpException(404);
                break;
        }

        $this->render("pilot{$type}", array_merge($data, [
            'app' => $app
        ]));
    }

}
