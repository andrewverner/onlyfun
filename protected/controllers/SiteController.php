<?php

class SiteController extends Controller
{

    public function actionIndex()
    {
        $model = new LoginForm();

        if ($data = Yii::app()->request->getPost('LoginForm')) {
            $model->setAttributes($data);
            if ($model->validate()) {
                if ($model->login()) {
                    $this->redirect(Yii::app()->createUrl('select'));
                }
                else
                    $model->addError('username', 'Invalid username');
            }
        }

        $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionSelect()
    {
        if (Yii::app()->user->isGuest) $this->redirect(Yii::app()->createUrl('login'));

        $apiKeyForm = new AddAPIKeyForm();
        if ($data = Yii::app()->request->getPost('AddAPIKeyForm')) {
            $apiKeyForm->setAttributes($data);

            if ($apiKeyForm->validate()) {
                $apiKeyForm->execute();
            }
        }

        $models = Character::model()->findAllByAttributes([
            'userID' => Yii::app()->user->id
        ]);

        $this->render('select', [
            'models'    => $models,
            'formModel' => $apiKeyForm
        ]);
    }

    public function actionCharacter($id)
    {
        $model = Character::model()->findByAttributes([
            'characterID' => $id
        ]);

        if (!$model) throw new CHttpException(404, 'Not found');

        $isCeo = false;
        $character = new EveXMLPublicCharacterInfo($id);
        if ($character) {
            $corporation = new EveXMLPublicCorporationSheet($character->corporationID);
            if ($corporation) {
                $isCeo = ($corporation->ceoID == $id);
            }
        }
        Yii::app()->user->setState('character', new WebCharacter($id, $isCeo));

        $this->redirect(Yii::app()->createUrl('core'));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
