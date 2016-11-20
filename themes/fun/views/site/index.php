<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 17:39
 *
 * @var $model LoginForm
 */
?>

<div class="row text-center">
    <div class="login-form">
        <?php $form=$this->beginWidget('CActiveForm', [
            'id'                    =>'login-form-login-form',
            'enableAjaxValidation'  =>false,
        ]); ?>

        <?php #echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->textField($model, 'username', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('user', 'username')
            ]); ?>
            <?php echo $form->error($model, 'username', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group">
            <?php echo $form->passwordField($model, 'password', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('user', 'password')
            ]); ?>
            <?php echo $form->error($model, 'password', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group buttons">
            <input type="submit" value="<?php echo Yii::t('form', 'Log in') ?>" class="btn btn-primary">
        </div>

        <div>
            <?php echo CHtml::link(Yii::t('link', 'registration'), Yii::app()->createUrl('registration')) ?> |
            <?php echo CHtml::link(Yii::t('link', 'forgot password?'), Yii::app()->createUrl('remind')) ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
