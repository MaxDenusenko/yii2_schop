<?php


namespace shop\services\auth;

use shop\repositories\UserRepository;
use Yii;
use shop\entities\User\User;
use shop\forms\auth\SignupForm;
use yii\mail\MailerInterface;

class SignupService
{
    private $supportEmail;
    private $appName;
    private $mailer;
    private $users;

    /**
     * PasswordResetService constructor.
     * @param $supportEmail
     * @param $appName
     * @param MailerInterface $mailer
     * @param UserRepository $users
     */
    public function __construct($supportEmail, $appName, MailerInterface $mailer, UserRepository $users)
    {
        $this->supportEmail = $supportEmail;
        $this->appName = $appName;
        $this->mailer = $mailer;
        $this->users = $users;
    }

    /**
     * @param SignupForm $form
     * @return User
     */
    public function signup(SignupForm $form): User {

        $user = User::signup(
            $form->username,
            $form->email,
            $form->password
        );
        $this->users->save($user);
        $this->sendEmail($user);

        return $user;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return void whether the email was sent
     */
    private function sendEmail($user): void
    {
        $send = $this->mailer
            ->compose(
                ['html' => 'auth/signup/confirm-html', 'text' => 'auth/signup/confirm-text'],
                ['user' => $user]
            )
            ->setFrom($this->supportEmail)
            ->setTo($user->email)
            ->setSubject('Account registration at ' . $this->appName)
            ->send();

        if (!$send) {
            throw new \RuntimeException('Sorry, we are unable to send verify token for the provided email address.');
        }
    }
}
