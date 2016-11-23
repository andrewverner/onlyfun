<?php
/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 21:54
 *
 * @var $model Application
 */
?>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 no-padding">
        <?php $this->renderPartial('//core/leftPanel', ['character' => $character]) ?>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Applications</h3>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <?php if ($models) { ?>
                    <?php $this->widget('CLinkPager', array(
                        'pages' => $pages,
                    )) ?>

                    <div class="row">
                        <?php foreach ($models as $model) : ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 text-center">
                            <?php echo CHtml::link(CHtml::image(
                                EveHelper::image($model->characterID, 128),
                                $model->character->characterName,
                                [
                                    'class' => 'img-thumbnail'
                                ]
                            ), Yii::app()->createUrl("pilot/{$model->characterID}")); ?><br />
                            <?php echo $model->character->characterName ?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <?php $this->widget('CLinkPager', array(
                        'pages' => $pages,
                    )) ?>
                <?php } else { ?>
                    <div class="alert alert-info">
                        No applications
                    </div>
                <?php } ?>

                <?php $this->widget('CLinkPager', array(
                    'pages' => $pages,
                )) ?>

            </div>
        </div>
    </div>
</div>
