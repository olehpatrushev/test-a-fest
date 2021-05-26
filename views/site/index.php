<?php

/* @var $this yii\web\View */
/* @var $countries \app\models\GeoItem[] */
/* @var $states \app\models\GeoItem[] */
/* @var $localities \app\models\GeoItem[] */

$this->title = 'Test A Fest!';
?>
<div class="site-content">
    <div class="row">
        <div class="col-lg-4">
            <select id="country_geo_selector" class="form-control geo-selector" aria-label="Country selector">
                <?php foreach ($countries as $country) : ?>
                    <?= \app\components\GeoItemWidget::widget(['geoItem' => $country]) ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg-4">
            <select id="state_geo_selector" class="form-control geo-selector" aria-label="State selector">
                <?php foreach ($states as $state) : ?>
                    <?= \app\components\GeoItemWidget::widget(['geoItem' => $state]) ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg-4">
            <select id="locality_geo_selector" class="form-control geo-selector" aria-label="Locality selector">
                <?php foreach ($localities as $locality) : ?>
                    <?= \app\components\GeoItemWidget::widget(['geoItem' => $locality]) ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>