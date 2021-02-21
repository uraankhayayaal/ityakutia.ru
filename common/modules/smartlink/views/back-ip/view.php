<?php

use yii\widgets\DetailView;

$this->title = $model->ip;
?>
<div class="banner-view">
    <div class="row">
        <div class="col s12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'ip',
                    'success',
                    'message',
                    'type',
                    'continent',
                    'continent_code',
                    'country',
                    'country_code',
                    'country_flag',
                    'country_capital',
                    'country_phone',
                    'country_neighbours',
                    'region',
                    'city',
                    'latitude',
                    'longitude',
                    'asn',
                    'org',
                    'isp',
                    'timezone',
                    'timezone_name',
                    'timezone_dstOffset',
                    'timezone_gmtOffset',
                    'timezone_gmt',
                    'currency',
                    'currency_code',
                    'currency_symbol',
                    'currency_rates',
                    'currency_plural',
                    'created_at',
                    'updated_at',
                ],
            ]); ?>
		</div>
	</div>
</div>
