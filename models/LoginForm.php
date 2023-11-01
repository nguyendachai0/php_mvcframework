<?php

namespace app\models;

use thecodeholic\phpmvc\Model;
use app\models\User;
use thecodeholic\phpmvc\Application;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';


    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }
    public function login()
    {

        $user = (new User())->findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email address');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }
}
