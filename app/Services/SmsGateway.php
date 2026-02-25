<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsGateway
{
    public function send(string $phone, string $message): bool
    {
        $endpoint = config('services.sms.endpoint');
        $token = config('services.sms.token');
        $sender = config('services.sms.sender');

        if (!$endpoint || !$token) {
            Log::info('SMS fallback (not configured)', [
                'phone' => $phone,
                'message' => $message,
            ]);
            return true;
        }

        try {
            $response = Http::timeout(10)
                ->withToken($token)
                ->post($endpoint, [
                    'to' => $phone,
                    'from' => $sender,
                    'message' => $message,
                ]);

            if ($response->successful()) {
                return true;
            }

            Log::warning('SMS request failed', [
                'phone' => $phone,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            Log::error('SMS send exception', [
                'phone' => $phone,
                'error' => $e->getMessage(),
            ]);
        }

        return false;
    }
}

