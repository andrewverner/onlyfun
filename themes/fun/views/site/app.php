<?php
/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 20:28
 */
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
    <?php /*echo CHtml::link(Yii::t('ilnk', 'Add API-key'), 'javascript:void(0);', [
            'class' => 'btn btn-primary',
            'data-toggle' => 'modal',
            'data-target' => '#addAPImodal',
            'data-keyboard' => false,
            'data-backdrop' => false
        ])*/ ?>

    <div class="api-key-form">

        <div class="title">Send an application</div>

        <?php $form=$this->beginWidget('CActiveForm', [
            'id'                    => 'add-api-key-form',
            'enableAjaxValidation'  => false,
        ]); ?>

        <?php #echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->textField($formModel, 'keyID', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('form', 'keyID')
            ]); ?>
            <?php echo $form->error($formModel, 'keyID', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group">
            <?php echo $form->textField($formModel, 'vCode', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('form', 'vCode')
            ]); ?>
            <?php echo $form->error($formModel, 'vCode', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group">
            <?php echo $form->textField($formModel, 'email', [
                'class'         => 'form-control',
                'placeholder'   => Yii::t('form', 'Email')
            ]); ?>
            <?php echo $form->error($formModel, 'email', [
                'class' => 'alert alert-danger'
            ]); ?>
        </div>

        <div class="form-group buttons">
            <input type="submit" value="<?php echo Yii::t('form', 'Send application') ?>" class="btn btn-primary">
        </div>

        <?php $this->endWidget(); ?>
    </div>

</div>

