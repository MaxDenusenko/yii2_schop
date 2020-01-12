<?php

namespace shop\forms\auth;

use shop\entities\User\User;
use yii\base\InvalidArgumentException;
use yii\base\Model;

class VerifyEmailForm extends Model
{
    /**
     * @var string
     */
    public $token;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['token', 'string', 'max' => 255],
        ];
    }
}
