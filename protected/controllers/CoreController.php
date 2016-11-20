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

}
