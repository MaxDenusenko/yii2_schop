<?php


namespace shop\entities\Shop\Product;


use yii\db\ActiveRecord;

class RelatedAssignment extends ActiveRecord
{
    public static function create($relatedId): self
    {
        $assignment = new static();
        $assignment->related_id = $relatedId;
        return $assignment;
    }

    public function isForRelated($id): bool
    {
        return $this->related_id == $id;
    }

    public static function tableName()
    {
        return '{{%shop_related_assignment}}';
    }
}
