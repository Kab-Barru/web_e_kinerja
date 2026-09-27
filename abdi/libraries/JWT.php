<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Native JWT (JSON Web Token) Implementation for CodeIgniter 3
 * Support HS256 algorithm with Zero External Dependencies
 */
class JWT
{
    private $CI;
    private $secret_key;
    private $algorithm;
    private $issuer;
    private $audience;
    private $ttl;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('jwt', TRUE, TRUE);

        $this->secret_key = $this->CI->config->item('jwt_secret_key', 'jwt') ?: 'default_barru_secret_key_2026';
        $this->algorithm  = $this->CI->config->item('jwt_algorithm', 'jwt') ?: 'HS256';
        $this->issuer     = $this->CI->config->item('jwt_issuer', 'jwt') ?: 'e-kinerja.barrukab.go.id';
        $this->audience   = $this->CI->config->item('jwt_audience', 'jwt') ?: 'e-kinerja-client';
        $this->ttl        = (int) ($this->CI->config->item('jwt_ttl', 'jwt') ?: 86400 * 7);
    }

    /**
     * Generate JWT Token for user data
     *
     * @param array $customClaims
     * @return string
     */
    public function generate_token(array $customClaims = [])
    {
        $now = time();
        $payload = array_merge([
            'iss' => $this->issuer,
            'aud' => $this->audience,
            'iat' => $now,
            'nbf' => $now,
            'exp' => $now + $this->ttl,
        ], $customClaims);

        return $this->encode($payload, $this->secret_key, $this->algorithm);
    }

    /**
     * Encode array payload into JWT string
     *
     * @param array $payload
     * @param string $key
     * @param string $algo
     * @return string
     */
    public function encode(array $payload, $key = null, $algo = 'HS256')
    {
        $key = $key ?: $this->secret_key;
        $header = ['typ' => 'JWT', 'alg' => $algo];

        $segments = [];
        $segments[] = $this->base64url_encode(json_encode($header));
        $segments[] = $this->base64url_encode(json_encode($payload));

        $signing_input = implode('.', $segments);
        $signature = $this->sign($signing_input, $key, $algo);
        $segments[] = $this->base64url_encode($signature);

        return implode('.', $segments);
    }

    /**
     * Decode and validate JWT string
     *
     * @param string $jwt
     * @param string|null $key
     * @return object
     * @throws Exception
     */
    public function decode($jwt, $key = null)
    {
        $key = $key ?: $this->secret_key;

        if (empty($jwt)) {
            throw new Exception('Token tidak ditemukan.', 401);
        }

        $parts = explode('.', $jwt);
        if (count($parts) !== 3) {
            throw new Exception('Format token tidak valid.', 401);
        }

        list($headb64, $bodyb64, $cryptob64) = $parts;

        $header = json_decode($this->base64url_decode($headb64));
        if (empty($header) || empty($header->alg)) {
            throw new Exception('Header token tidak valid.', 401);
        }

        if ($header->alg !== $this->algorithm) {
            throw new Exception('Algoritma enkripsi token tidak didukung.', 401);
        }

        $payload = json_decode($this->base64url_decode($bodyb64));
        if (empty($payload)) {
            throw new Exception('Payload token kosong atau korup.', 401);
        }

        $sig = $this->base64url_decode($cryptob64);
        if (!$this->verify("$headb64.$bodyb64", $sig, $key, $header->alg)) {
            throw new Exception('Tanda tangan (signature) token tidak valid.', 401);
        }

        $now = time();
        if (isset($payload->nbf) && $payload->nbf > $now) {
            throw new Exception('Token belum dapat digunakan.', 401);
        }

        if (isset($payload->iat) && $payload->iat > $now + 60) {
            throw new Exception('Waktu pembuatan token tidak valid.', 401);
        }

        if (isset($payload->exp) && $now >= $payload->exp) {
            throw new Exception('Token autentikasi telah kedaluwarsa. Silakan login kembali.', 401);
        }

        return $payload;
    }

    /**
     * Create HMAC signature
     */
    private function sign($msg, $key, $algo = 'HS256')
    {
        $hash_map = [
            'HS256' => 'sha256',
            'HS384' => 'sha384',
            'HS512' => 'sha512'
        ];

        if (!isset($hash_map[$algo])) {
            throw new Exception("Algoritma hash $algo tidak didukung.");
        }

        return hash_hmac($hash_map[$algo], $msg, $key, true);
    }

    /**
     * Verify signature using constant-time comparison
     */
    private function verify($msg, $signature, $key, $algo = 'HS256')
    {
        $expected = $this->sign($msg, $key, $algo);
        return hash_equals($signature, $expected);
    }

    /**
     * Base64URL encode
     */
    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /**
     * Base64URL decode
     */
    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
