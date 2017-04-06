<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->registerJs("
    $(document).on('submit', '#add-custom-service-form', function() {
        var form = $(this);
        var data = $(form).serialize();
        data = data+'&ajax=1';

        jQuery.post($(form).attr('action'), data,
            function(json) {
                if(json.result == 'success') {
                    $('#add-custom-service-form input[type=text]').val('');
                    pistol88.cart.addElement('\\\backend\\\widgets\\\customService\\\models\\\Custom', json.id, 1, json.price, [], '" . $addToCart . "');
                }
                else {
                    console.log(json.errors);
                }

                return true;

            }, 'json');

        return false;
    });
");

 ?>
<div class="custom-service-form" data-role="custom-service-form-container">
    <?php $form = ActiveForm::begin(['action' => Url::toRoute(['/custom-service/buy']), 'options' => ['enctype' => 'multipart/form-data'],'id' => 'add-custom-service-form']); ?>
        <?php if(Yii::$app->session->hasFlash('customServiceBuy')) { ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('customServiceBuy') ?>
            </div>
            <script type="text/javascript">if (typeof pistol88 != "undefined" && pistol88) { pistol88.createorder.updateCart(); }</script>
        <?php } ?>
        <div class="row">
            <div class="col-md-8"><?php echo $form->field($customServiceModel, 'name')->textInput() ?></div>
            <div class="col-md-4"><?php echo $form->field($customServiceModel, 'price')->textInput() ?></div>
        </div>
        <?php echo Html::submitButton('В корзину', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>
