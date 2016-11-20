<?php
/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 18:26
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
            <?php echo $form->passwordField($model, 'passwd1', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('user', 'Password')
            ]); ?>
            <?php echo $form->error($model, 'passwd1', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group">
            <?php echo $form->passwordField($model, 'passwd2', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('user', 'Confirm password')
            ]); ?>
            <?php echo $form->error($model, 'passwd2', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group">
            <?php echo $form->textField($model, 'email', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('user', 'Email')
            ]); ?>
            <?php echo $form->error($model, 'email', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group buttons">
            <input type="submit" value="<?php echo Yii::t('form', 'Registration') ?>" class="btn btn-primary">
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
