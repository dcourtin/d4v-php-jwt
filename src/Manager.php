<?php

namespace D4v\JWT;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Manager
{
    protected $issuer;
    protected $secret;
    protected $algo;
    protected $payload = [];

    public function __construct()
    {
        $this->issuer = config('d4v-jwt.issuer');
        $this->secret = config('d4v-jwt.secret');
        $this->algo = config('d4v-jwt.algo', 'HS256');
        $this->ttl = config('d4v-jwt.ttl', '600');

        $this->payload = [
            'iss' => $this->issuer,
            'iat' => time(),
            'exp' => time() + $this->ttl
        ];
    }

    /**
     * Encode the payload
     */
    public function encode($payload, $keyId = null, $headers = [])
    {
        foreach ($this->payload as $key => $value) {
            if(!isset($payload[$key])){
                $payload[$key] = $value;
            }
        }

        return JWT::encode(
            $payload,
            $this->secret,
            $this->algo,
            $keyId,
            $headers
        );
    }

    /**
     *  Decode the token and restore the payload
     */
    public function decode($token, $publicKey = null)
    {
        $secret = $this->publicKey ?? $this->secret;

        return JWT::decode(
            $token,
            new Key($secret, $this->algo)
        );
    }
}
