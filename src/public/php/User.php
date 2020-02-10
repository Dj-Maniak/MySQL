<?php


class User
{
    public $HTTP_USER_AGENT;

    final public function __construct(string $HTTP_USER_AGENT)
    {
        $this->HTTP_USER_AGENT = $HTTP_USER_AGENT;

        if (stristr($HTTP_USER_AGENT, 'android') !== FALSE) {
            header("Location: https://www.google.com/");
            die;

        } else if (stristr($HTTP_USER_AGENT, 'mac') !== FALSE) {
            header("Location: https://www.apple.com/");
            die;

        } else { ?>

            <h1>Версия для ПК не поддерживается!!!</h1>
        <? }

    }
}

$user = new User($_SERVER['HTTP_USER_AGENT']);