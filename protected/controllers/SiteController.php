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
        ], [
            'order' => 'keyID, characterName ASC'
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
        Yii::app()->user->setState('character', new WebCharacter($character, $isCeo));

        $this->redirect(Yii::app()->createUrl('core'));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionReg()
    {
        $formModel = new RegForm();

        if ($data = Yii::app()->request->getPost('RegForm')) {
            $formModel->setAttributes($data);
            if ($formModel->validate()) {
                $model = new User();
                $model->setAttributes([
                    'username' => $formModel->username,
                    'password' => md5($formModel->passwd1),
                    'email' => $formModel->email
                ]);
                $model->save();

                $this->redirect(Yii::app()->createUrl('complete'));
            }
        }

        $this->render('reg', ['model' => $formModel]);
    }

    public function actionComplete()
    {
        $this->render('complete');
    }

    public function actionApp()
    {
        $formModel = new ApplicationForm();

        if ($data = Yii::app()->request->getPost('ApplicationForm')) {
            $formModel->setAttributes($data);
            if ($formModel->validate()) {
                $accessValidator = new EveXMLAPIKeyValidator($formModel->keyID, $formModel->vCode);
                if ($accessValidator->validate()) {
                    $model = Application::model()->findByAttributes([
                        'keyID' => $formModel->keyID,
                        'vCode' => $formModel->vCode
                    ]);

                    if (!$model) $model = new Application();
                    $model->setAttributes([
                        'keyID' => $formModel->keyID,
                        'vCode' => $formModel->vCode,
                        'email' => $formModel->email,
                        'datetime' => new CDbExpression('NOW()'),
                        'status' => 0,
                        'corporationID' => 98320999
                    ]);
                    $model->save();

                    $this->redirect('cya');
                } else {
                    $formModel->addError('keyID', 'API key is not full');
                }
            }
        }

        $this->render('app', ['formModel' => $formModel]);
    }

    public function actionCya()
    {
        $this->render('cya');
    }

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
