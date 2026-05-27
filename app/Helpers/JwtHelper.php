<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;

class JwtHelper
{
    // private static $secret_key = 'RamseyRameyForJWT2024!@#$';
    private static $secret_key = 'MySecretKeyForJWT2024!@#$';
    private static $algorithm = 'HS256';
    // private static $expiry_time = 7200;
    private static $expiry_time = 3600;

    public static function generateToken($user)
    {
        $payload = [
            'user_id' => $user->id,
            // 'mymails' => $user->email,
            'email' => $user->email,
            'name' => $user->name,
            'iat' => time(),
            'exp' => time() + self::$expiry_time
        ];

        return JWT::encode($payload, self::$secret_key, self::$algorithm);
    }

    public static function verifyToken($token)
    {
        try {
            $decoded = JWT::decode($token, new Key(self::$secret_key, self::$algorithm));
            return User::find($decoded->user_id);
        } catch (\Exception $e) {
            return null;
        }
    }
}