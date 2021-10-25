<?php

use ityakutia\blog\models\Article;
use ityakutia\blog\models\ArticleCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

$this->title = 'Сменить пароль';

?>
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?= $this->render('_nav'); ?>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                        <?php $form = ActiveForm::begin([
                            'errorCssClass' => 'red-text',
                        ]); ?>

                        <?= $form->field($model, 'old_password')->passwordInput() ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php

$script = <<< JS
if($success_pwd)M.toast({html: 'Ваш пароль успешно изменен!'});
JS;
$this->registerJs($script, yii\web\View::POS_READY);

?>