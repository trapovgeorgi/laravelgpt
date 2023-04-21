<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class ChatController extends Controller
{
    public function chat($messages)
    {
        $open_ai_key = env('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'temperature' => 0.5,
            'max_tokens' => 2048,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        $res = json_decode($chat);
        return $res->choices[0]->message;
    }

    public function index()
    {
        return view("welcome");
    }

    public function store(Request $request)
    {
        if (!session("conversation")) {
            session(['conversation' => [
                [
                    "role" => "system",
                    "content" => "You are a helpful assistant."
                ],
            ]]);
        }

        $conversation = session("conversation");
        $conversation[] = [
            "role" => "user",
            "content" => $request->message
        ];
        $conversation[] = (array) $this->chat($conversation);
        session(['conversation' => $conversation]);
        return back();
    }

    public function destroy(Request $request)
    {
        session()->flush();
        return back();
    }
}
