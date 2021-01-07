<?php


namespace App\Services;


use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;

class MessageService
{
    protected $cipher = 'aes-256-cbc-hmac-sha256';

    public function getPublicMessages(){
        return Message::with('user')->where('is_public', true)->get();
    }

    public function getUserSentMessages(User $user){
        return $user->messages()->get();
    }

    public function saveMessage(MessageRequest $message){
        $user = $message->user();

        $user->messages()->create($message->only([
            'content',
        ]));
    }

    public function getSharedMessages(User $user){
        return 'dupa';
    }

    public function saveEncryptedMessage(MessageRequest $request){
        $user = $request->user();

        $message = $request->only([
            'content',
            'file',
            'password',
            'is_encrypted'
        ]);

        $message['content'] = openssl_encrypt($message['content'], $this->cipher, $message['password'], 0, "safetyisreallyok");
        $message['password'] = bcrypt($message['password']);
        $message['is_encrypted'] = 1;
        $user->messages()->create($message);
    }
}
