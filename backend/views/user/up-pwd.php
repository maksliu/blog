<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="panel-btns">
      <a href="" class="minimize">&minus;</a>
    </div>
    <h4 class="panel-title"></h4>
    <p></p>

  </div>


      <?php $form = ActiveForm::begin([
          'id'=>'up-pwd',
          'options'=>['class'=>'form-horizontal form-bordered'],
          'fieldConfig'=>[
              'template'=>'{label}<div class="col-sm-6">{input}</div><div class="col-sm-4">{hint}{error}</div>',
              'labelOptions'=>['class'=>'col-sm-2 control-label'],
          ]
          ]) ?>
          <div class="panel-body panel-body-nopadding">
          <?= $form->field($model,'old_pwd')->passwordInput()?>
          <?= $form->field($model,'new_pwd')->passwordInput()?>
          <?= $form->field($model,'re_new_pwd')->passwordInput()?>
          </div><!-- panel-body -->
          <div class="panel-footer">
               <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                      <?= Html::submitButton( '提交',['class'=>'btn btn-primary'])?>
                  </div>
               </div>
            </div><!-- panel-footer -->
    <?php ActiveForm::end() ?>






</div><!-- panel -->
