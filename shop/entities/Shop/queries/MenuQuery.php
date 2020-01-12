<?php


namespace shop\entities\Shop\queries;


use paulzi\nestedsets\NestedSetsQueryTrait;
use yii\db\ActiveQuery;

class MenuQuery extends ActiveQuery
{
    use NestedSetsQueryTrait;
}
