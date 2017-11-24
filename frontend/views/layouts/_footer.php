<?php

use yii\helpers\Url;

?>
      <footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Контакты</h5>
              <p class="grey-text text-lighten-4">677008 г Якутск</p>
              <p class="grey-text text-lighten-4">т. 736836</p>
              <p class="grey-text text-lighten-4"><?= Yii::$app->params['supportEmail'] ?></p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a target="_blank" class="grey-text text-lighten-3" href="http://resume.admin14.ru">Резюме</a></li>
                <li><a target="_blank" class="grey-text text-lighten-3" href="http://pmp.admin14.ru">Система управления проектами</a></li>
                <li><a target="_blank" class="grey-text text-lighten-3" href="http://vote.admin14.ru">Система проведения опросов</a></li>
                <li><a target="_blank" class="grey-text text-lighten-3" href="http://admin14.business.site/">Сайт в Google - Разработка сайтов</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2017 <?= Yii::$app->name ?>
          <a class="grey-text text-lighten-4 right" href="<?= Url::home(); ?>">Главная</a>
          </div>
        </div>
      </footer>