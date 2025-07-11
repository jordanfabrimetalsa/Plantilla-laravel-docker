<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class ChatController extends Controller
{
    public function __invoke(Request $request): string
    {

        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer " . env('HF_TOKEN'), 
                "Content-Type" => "application/json"
            ])->post(env('HF_URL'), [
                "model" => "deepseek-chat", // o el modelo que estés usando
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $request->post('content')
                    ]
                ],
                "temperature" => 0.7,
                "max_tokens" => 1024
            ])->json();
            
            if (isset($response['generated_text'])) {
                return $response['generated_text'];
            }
            
            if (isset($response['error'])) {
                return "Error de DeepSeek (HuggingFace): " . $response['error'];
            }
            
            return "No se pudo obtener respuesta del modelo.";
            
        } catch (Throwable $e) {
            return "Error: " . $e->getMessage();
        }
    }
}