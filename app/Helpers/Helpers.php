<?php

   function encryption($encryption_key, $data, $cipher, $iv_size, $iv)

    {

        return $encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv); 

    }


    function decryption($encryption_key, $encrypted_data, $cipher, $iv_size, $iv)
    {
        //Decrypt data 
        return $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv); 

    }

    





