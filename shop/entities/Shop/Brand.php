<?php


namespace shop\entities\Shop;


use shop\entities\behaviors\MetaBehavior;
use shop\entities\Meta;
use yii\db\ActiveRecord;
use yii\helpers\Json;

/**
 * Brand model
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property Json $meta_json
 */
class Brand extends ActiveRecord
{
    public $meta;

    /**
     * @param $name
     * @param $slug
     * @param Meta $meta
     * @return static
     */
    public static function create($name, $slug, Meta $meta): self
    {
        $brand = new static();
        $brand->name = $name;
        $brand->slug = $slug;
        $brand->meta = $meta;
        return $brand;
    }

    /**
     * @param $name
     * @param $slug
     * @param Meta $meta
     */
    public function edit($name, $slug, Meta $meta): void
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->meta = $meta;
    }

    public static function tableName()
    {
        return '{{%shop_brands}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => MetaBehavior::className(),
                'attribute' => 'meta',
                'jsonAttribute' => 'meta_json'
            ]
        ];
    }
}
