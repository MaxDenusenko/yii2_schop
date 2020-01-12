<?php


namespace shop\repositories\Shop;


use shop\entities\Shop\Tag;
use shop\repositories\NotFoundException;
use Throwable;
use yii\db\StaleObjectException;

class TagRepository
{
    /**
     * @param $id
     * @return Tag
     */
    public function get($id): Tag
    {
        if (!$tag = Tag::findOne($id)) {
            throw new NotFoundException('Tag is not found');
        }
        return $tag;
    }

    public function findByName($name): ?Tag
    {
        return Tag::findOne(['name' => $name]);
    }

    /**
     * @param Tag $tag
     */
    public function save(Tag $tag): void
    {
        if (!$tag->save()) {
            throw new \RuntimeException('Saving error');
        }
    }

    /**
     * @param Tag $tag
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove(Tag $tag): void
    {
        if (!$tag->delete()) {
            throw new \RuntimeException('Removing error');
        }
    }
}
