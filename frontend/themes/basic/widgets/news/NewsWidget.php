<?php

namespace frontend\themes\basic\widgets\news;

use ityakutia\blog\models\Article;
use yii\bootstrap4\Widget;

class NewsWidget extends Widget
{
    public $count = 3;

    public $direction = 'col';

    public function run()
    {
        $model = Article::find()
            ->where([
                'is_publish' => true,
            ])
            ->orderBy([
                'created_at' => SORT_DESC,
            ])
            ->limit($this->count)
            ->all();

        return $this->render('index_' . $this->direction, [
            'model' => $model,
        ]);
    }
}
