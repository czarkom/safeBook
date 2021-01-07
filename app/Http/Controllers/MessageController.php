<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(MessageRequest $request, MessageService $messageService){
        if( $request->get('is_encrypted')){
            $messageService->saveEncryptedMessage($request);
        } else {
            $messageService->saveMessage($request);
        };
        return redirect('dashboard');
    }

    public function decryptMessage(Request $request, MessageService $messageService){
        $currentUser = $request->user();

        $publicMessages = $messageService->getPublicMessages();
        $sent = $messageService->getUserSentMessages($currentUser);
        $shared = $messageService->getSharedMessages($currentUser);
        $lastLogins = $messageService->getLastLogins($currentUser);

        return view('dashboard', [
            'publicMessages' => $publicMessages,
            'sent' => $sent,
            'shared' => $shared,
            'lastLogins' => $lastLogins,
        ]);
    }
}
