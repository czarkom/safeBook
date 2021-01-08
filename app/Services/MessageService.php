<?php


namespace App\Services;


use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MessageService
{
    protected $cipher = 'aes-256-cbc-hmac-sha256';

    public function getPublicMessages(){
        return Message::with('user')->where('is_public', true)->get();
    }

    public function getUserSentMessages(User $user, $withDecrypted, Request $request){
        $messages = $user->messages()->get();
        if(!$withDecrypted){
            return $messages;
        }
        $encryptedMessage = Message::query()->where('id', $request['id'])->first();
        if(!Hash::check($request['message_password'], $encryptedMessage['password'])){
            foreach ($messages as $key => $message){
                if($message['id'] == $encryptedMessage['id']){
                    $messages[$key]['wrong_password'] = true;
                }
            }
            return $messages;
        }
        $message_decrypted = openssl_decrypt($encryptedMessage['content'], $this->cipher, $request['message_password'], 0, 'safetyisreallyok');
        $messages = $user->messages()->get();
        foreach ($messages as $key => $message){
            if($message['id'] == $encryptedMessage['id']){
                $messages[$key]['content'] = $message_decrypted;
                $messages[$key]['is_encrypted'] = 0;
                $messages[$key]['decrypted'] = true;
            }
        }
        return $messages;
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
