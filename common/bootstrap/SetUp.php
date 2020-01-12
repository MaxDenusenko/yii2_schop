<?php


namespace common\bootstrap;


use frontend\controllers\cabinet\NetworkController;
use shop\services\auth\EmailVerification;
use shop\services\auth\PasswordResetService;
use shop\services\auth\SignupService;
use shop\services\contact\ContactService;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\di\Instance;
use yii\mail\MailerInterface;

class SetUp implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(MailerInterface::class, function () use($app) {
            return $app->mailer;
        });

        $container->setSingleton(PasswordResetService::class, [], [
            [$app->params['supportEmail'] => $app->name . ' robot'],
            $app->name,
        ]);

        $container->setSingleton(ContactService::class, [], [
            $app->params['supportEmail'],
            $app->params['adminEmail'],
        ]);

        $container->setSingleton(SignupService::class, [], [
            [$app->params['supportEmail'] => $app->name . ' robot'],
            $app->name,
        ]);

        $container->setSingleton(EmailVerification::class, [], [
            [$app->params['supportEmail'] => $app->name . ' robot'],
            $app->name,
        ]);

    }
}
