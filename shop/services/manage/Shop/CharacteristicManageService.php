<?php


namespace shop\services\manage\Shop;


use shop\entities\Shop\Characteristic;
use shop\forms\manage\Shop\CharacteristicForm;
use shop\repositories\Shop\CharacteristicRepository;

class CharacteristicManageService
{
    private $characteristic;

    public function __construct(CharacteristicRepository $characteristic)
    {
        $this->characteristic = $characteristic;
    }

    public function create(CharacteristicForm $form): Characteristic
    {
        $characteristic = Characteristic::create(
            $form->name,
            $form->type,
            $form->required,
            $form->default,
            $form->variants,
            $form->sort
        );
        $this->characteristic->save($characteristic);
        return  $characteristic;
    }

    public function edit($id, CharacteristicForm $form): void
    {
        $characteristic = $this->characteristic->get($id);
        $characteristic->edit(
            $form->name,
            $form->type,
            $form->required,
            $form->default,
            $form->variants,
            $form->sort
        );
        $this->characteristic->save($characteristic);
    }

    public function remove($id): void
    {
        $characteristic = $this->characteristic->get($id);
        $this->characteristic->remove($characteristic);
    }
}
