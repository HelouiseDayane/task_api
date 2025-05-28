<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ExternalCatApiController extends Controller
{
    public function fetchCat()
    {
        try {
            $response = Http::withHeaders([
                'x-api-key' => config('services.catapi.key'),
            ])->get(config('services.catapi.url'));

            if ($response->successful()) {
                return response()->json([
                    'image' => $response->json()[0]['url'],
                    'source' => 'The Cat API'
                ]);
            }

            return response()->json([
                'error' => 'Failed to fetch cat image',
                'status' => $response->status(),
                'message' => $response->body()
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Exception occurred while calling external API',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
