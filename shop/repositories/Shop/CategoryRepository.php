<?php


namespace shop\repositories\Shop;


use shop\entities\Shop\Category;
use shop\repositories\NotFoundException;

class CategoryRepository
{
    /**
     * @param $id
     * @return Category
     */
    public function get($id): Category
    {
        if (!$category = Category::findOne($id)) {
            throw new NotFoundException('Category is not found.');
        }
        return $category;
    }

    /**
     * @param Category $category
     */
    public function save(Category $category): void
    {
        if (!$category->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    /**
     * @param Category $category
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function remove(Category $category): void
    {
        if (!$category->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}
