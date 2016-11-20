<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 18:18
 *
 * @var $model Character
 */
?>

<div class="row">

<?php if ($models) { ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
    <?php foreach ($models as $model) : ?>
        <a href="<?php echo Yii::app()->createUrl("character/{$model->characterID}") ?>">
            <div class="character-select">
                <?php echo CHtml::image($model->image(128), $model->characterName, [
                    'class' => 'img-thumbnail'
                ]) ?>
                <div><?php echo $model->characterName ?></div>
            </div>
        </a>
    <?php endforeach; ?>
    </div>
<?php } else { ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="alert alert-info">
            Вы ещё не добавили API-ключи
        </div>
    </div>

<?php } ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <?php /*echo CHtml::link(Yii::t('ilnk', 'Add API-key'), 'javascript:void(0);', [
            'class' => 'btn btn-primary',
            'data-toggle' => 'modal',
            'data-target' => '#addAPImodal',
            'data-keyboard' => false,
            'data-backdrop' => false
        ])*/ ?>

        <div class="api-key-form">

            <div class="title">Add API-key</div>

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

            <div class="form-group buttons">
                <input type="submit" value="<?php echo Yii::t('form', 'Add') ?>" class="btn btn-primary">
            </div>

            <?php $this->endWidget(); ?>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="addAPImodal" tabindex="-1" role="dialog" aria-labelledby="addAPIModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('title', 'Add API-key') ?></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
