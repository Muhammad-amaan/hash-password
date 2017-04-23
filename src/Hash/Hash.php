<?php

namespace Hash;

class Hash{

    public function make($password)
    {
        /**
         * Note that the salt here is randomly generated.
         * Never use a static salt or one that is not randomly generated.
         *
         * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
         */
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        password_hash($password, PASSWORD_BCRYPT, $options);
        return true;
    }

    public function check($text, $hash)
    {
        // See the password_hash() example to see where this came from.;

        if (password_verify($text, $hash))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}