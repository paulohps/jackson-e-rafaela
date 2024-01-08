<?php

use App\Models\User;
use Illuminate\Support\Facades\{Auth, Vite};

if (!function_exists('auth_user')) {
    function auth_user(): User|null
    {
        return Auth::user();
    }
}

if (!function_exists('vite_asset')) {
    function vite_asset(string $asset, string|null $buildDirectory = null): string
    {
        return Vite::asset("resources/assets/$asset", $buildDirectory);
    }
}

if (!function_exists('mask')) {
    function mask(string $value, string $mask, string $character = '#'): string
    {
        if (empty($value)) {
            return '';
        }

        $masked = '';

        $key = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] === $character) {
                if (isset($value[$key])) {
                    $masked .= $value[$key++];
                }
                continue;
            }

            if (isset($mask[$i])) {
                $masked .= $mask[$i];
            }
        }
        return $masked;
    }
}

if (!function_exists('unmask')) {

    function unmask(string|null $value, array $characters = ['.', '/', '-', ' ', ':', ',', '\\', '|', '_']): string
    {
        if (empty($value)) {
            return '';
        }

        return str_replace($characters, '', $value);
    }
}
