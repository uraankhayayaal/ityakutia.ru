<?php

$this->title = 'Новая умная ссылка';
?>

		<section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?= $this->render('@frontend/themes/basic/views/cabinet/_nav'); ?>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">

							<?= $this->render('_form', [
								'model' => $model,
							]) ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
