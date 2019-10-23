<?php

namespace Middleware;

class AuthMiddleware
{

    public static function makeToken($payloadData)
    {

        $max_time = 60 * 60 * 12; // token is valid for 12 hours
        $csrf_token = Session::get('csrf_token');
        $stored_time = Session::get('csrf_token_time');

        if ($max_time + $stored_time <= time() || empty($csrf_token)) {
            Session::set('csrf_token', bin2hex(random_bytes(64)));
            Session::set('csrf_token_time', time());
        }

        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // Create token payload as a JSON string
        $payload = $payloadData;

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'EA9F61CB-1163-4102-AC5F-474D924BE4C2-PRE3', true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        return $jwt;
    }

    public static function verifyToken(string $jwt): bool
    {
        list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $jwt);

        $dataEncoded = "$headerEncoded.$payloadEncoded";

        $signature = self::base64UrlDecode($signatureEncoded);

        $rawSignature = hash_hmac('sha256', $dataEncoded, 'EA9F61CB-1163-4102-AC5F-474D924BE4C2-PRE3', true);

        return hash_equals($rawSignature, $signature);
    }

    public static function base64UrlDecode(string $data): string
    {
        $urlUnsafeData = strtr($data, '-_', '+/');

        $paddedData = str_pad($urlUnsafeData, strlen($data) % 4, '=', STR_PAD_RIGHT);

        return base64_decode($paddedData);
    }

    public static function getJwt()
    {
        return Session::get('token');
    }


}
