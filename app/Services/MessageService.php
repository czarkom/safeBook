<?php


namespace App\Services;


use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;

class MessageService
{
    public function getPublicMessages(){
        return Message::with('user')->where('is_public', true)->get();
    }

    public function getUserSentMessages(User $user){
        return $user->messages()->get();
    }

    public function saveMessage(MessageRequest $message){
        dump($message['author_id']);

        $user = $message->user();

        $user->messages()->create($message->only([
            'content',
        ]));
    }

    public function getSharedMessages(User $user){
        return 'dupa';
    }

    public function getLastLogins(User $user){
        return 'dupa';
    }

    public function saveEncryptedMessage(Message $message){

    }
}
