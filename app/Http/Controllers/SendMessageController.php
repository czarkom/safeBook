<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function __invoke(MessageRequest $request, MessageService $messageService){
        if( $request->get('is_encrypted')){
            $messageService->saveEncryptedMessage($request);
        } else {
            $messageService->saveMessage($request);
        };
        return redirect('dashboard');
    }
}