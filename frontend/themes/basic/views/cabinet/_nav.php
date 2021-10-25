<?php

use yii\helpers\Url;

?>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Профиль</h4>
                                <ul class="list cat-list">
                                    <li class="<?= (Yii::$app->controller->id == "cabinet" && Yii::$app->controller->action->id == "index") ? 'active' : '' ?>"><a href="<?= Url::to(['/cabinet/index']); ?>" class="d-flex"><p>Личные данные</p></a></li>
                                    <li class="<?= (Yii::$app->controller->id == "cabinet" && Yii::$app->controller->action->id == "change") ? 'active' : '' ?>"><a href="<?= Url::to(['/cabinet/change']); ?>" class="d-flex"><p>Сменить пароль</p></a></li>
                                    <li class="<?= (Yii::$app->controller->module->id == "smartlink" && Yii::$app->controller->id == "front-bio") ? 'active' : '' ?>"><a href="<?= Url::to(['/smartlink/front-bio/index']); ?>" class="d-flex"><p>Biolink</p></a></li>
                                    <li class="<?= (Yii::$app->controller->module->id == "smartlink" && Yii::$app->controller->id == "front-smart") ? 'active' : '' ?>"><a href="<?= Url::to(['/smartlink/front-smart/index']); ?>" class="d-flex"><p>Smartlink</p></a></li>
                                    <li><a href="<?= Url::to(['/site/logout']); ?>" class="d-flex" data-method="post"><p>Выйти</p></a></li>
                                </ul>
                            </aside>