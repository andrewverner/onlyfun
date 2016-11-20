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

                <?php $this->widget('CLinkPager', array(
                    'pages' => $pages,
                )) ?>

                <?php if ($models) { ?>
                    <table class="table table-hover">
                    <?php foreach ($models as $model) : ?>
                        <tr>
                            <td><?php echo $model->id ?></td>
                            <td><?php echo $model->datetime ?></td>
                            <td><?php echo $model->email ?></td>
                            <td><?php echo $model->keyID ?></td>
                            <td><?php echo $model->vCode ?></td>
                            <td>
                                <?php echo CHtml::link('Details', Yii::app()->createUrl("core/app/{$model->id}"),[
                                    'class' => 'btn btn-primary'
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
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
