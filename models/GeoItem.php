<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geo_item".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int|null $parent_id
 *
 * @property GeoItem $parent
 * @property GeoItem[] $geoItems
 */
class GeoItem extends \yii\db\ActiveRecord
{
    const TYPE_COUNTRY = 'country';
    const TYPE_STATE = 'state';
    const TYPE_LOCALITY = 'locality';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geo_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type'], 'string'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoItem::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(GeoItem::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[GeoItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeoItems()
    {
        return $this->hasMany(GeoItem::className(), ['parent_id' => 'id']);
    }
}
