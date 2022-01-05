<?php


class Email{
 
    private string $email;

    public function __construct( string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            throw new \InvalidArgumentException('Invalid e-mail address');
        }
        $this->email = $email;

    }

    public function __toString()
    {
        return $this->email;
    }
}