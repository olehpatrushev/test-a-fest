<?php

namespace app\components;

use app\models\GeoItem;
use yii\base\Widget;
use yii\helpers\Html;

class GeoItemWidget extends Widget
{
    public GeoItem $geoItem;

    public function init()
    {
        parent::init();
        if ($this->geoItem === null) {
            throw new \RuntimeException("\"geoItem\" property must be set");
        }
    }

    public function run()
    {
        return "<option value=\"{$this->geoItem->id}\" data-parent-id=\"{$this->geoItem->parent_id}\">"
            . Html::encode($this->geoItem->name)
            . "</option>";
    }
}