<?php


namespace shop\services\auth;


use shop\repositories\UserRepository;
use shop\forms\auth\PasswordResetRequestForm;
use shop\forms\auth\ResetPasswordForm;
use shop\entities\User\User;
use yii\base\InvalidArgumentException;
use yii\mail\MailerInterface;

class PasswordResetService
{
    private $supportEmail;
    private $appName;
    private $mailer;
    private $users;

    /**
     * PasswordResetService constructor.
     * @param $supportEmail
     * @param MailerInterface $mailer
     * @param $appName
     */
    public function __construct($supportEmail, $appName, MailerInterface $mailer, UserRepository $users)
    {
        $this->supportEmail = $supportEmail;
        $this->appName = $appName;
        $this->mailer = $mailer;
        $this->users = $users;
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @param \shop\forms\auth\PasswordResetRequestForm $form
     * @return void whether the email was send
     */
    public function request(PasswordResetRequestForm $form): void
    {
        $user = $this->users->getByEmail($form->email);
        $user->checkPasswordResetToken();
        $this->users->save($user);

        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/reset/confirm-html', 'text' => 'auth/reset/confirm-text'],
                ['user' => $user]
            )
            ->setFrom($this->supportEmail)
            ->setTo($user->email)
            ->setSubject('Account registration at ' . $this->appName)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending email error');
        }
    }

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function validateToken($token) : void
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidArgumentException('Password reset token cannot be blank.');
        }
        if (!User::findByPasswordResetToken($token)) {
            throw new InvalidArgumentException('Wrong password reset token.');
        }
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @param ResetPasswordForm $form
     * @return void if password was reset.
     */
    public function resetPassword(string $token, ResetPasswordForm $form) : void
    {
        $user = $this->users->getByPasswordResetToken($token);
        $user->resetPassword($form->password);
        $this->users->save($user);
    }
}
