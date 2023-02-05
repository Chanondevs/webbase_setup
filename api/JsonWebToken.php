<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JsonWebToken {

    public static function encode(array $payload, string $key){
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }
    
    /**
     * /
     * @param mixed $encode
     * @param mixed $key
     * @return array|string
     */
    public static function decode($encode, $key){
        try {
            $decoded = JWT::decode($encode, new Key($key, 'HS256'));
            $response = array(
                'status' => 'success',
                'message' => 'verify key success',
                'data' => $decoded
            );
            return $response;
        } catch (Exception $e){
            if ($e->getMessage() == "Signature verification failed"){
                $response = array(
                    'status' => 'error',
                    'message' => 'verify key failed'
                );
                return $response;
            } else if ($e->getMessage() == "Wrong number of segments"){
                $response = array(
                    'status' => 'error',
                    'message' => 'Unable to decrypt because the encryption is invalid.'
                );
                return $response;
            } else if ($e->getMessage() == "Expired token"){
                $response = array(
                    'status' => 'error',
                    'message' => 'encryption Expired token'
                );
                return $response;
            } else if ($e->getMessage() == "Syntax error, malformed JSON"){
                $response = array(
                    'status' => 'error',
                    'message' => 'Syntax error, malformed JSON'
                );
                return $response;
            }
            return $e->getMessage();
        }
    }

    public static function encrypt_decrypt($str,$action)
    {
        $key = 'my_openssl_KEY';
        $iv_key = 'my_iv_KEY';
        $method="AES-256-CBC";
        $iv=substr(md5($iv_key),0,16);
        $output="";

        if($action=="encrypt")
        {
            $output=openssl_encrypt($str, $method,$key,0,$iv);
        }
        else if($action=="decrypt")
        {
            $output=openssl_decrypt($str, $method,$key,0,$iv);
        }

        return $output;
    }

    public static function genKey($text){
        $key = md5($text);
        return $key;
    }

}

?>