<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function decryptMessage(Request $request, MessageService $messageService, UserService $userService){
        $currentUser = $request->user();

        $publicMessages = $messageService->getPublicMessages();
        $sent = $messageService->getUserSentMessages($currentUser, true, $request);
        $shared = $messageService->getSharedMessages($currentUser);
        $lastLogins = $userService->getLastLogins($currentUser);
        $users = User::query()->get();

        return view('dashboard', [
            'publicMessages' => $publicMessages,
            'sent' => $sent,
            'shared' => $shared,
            'lastLogins' => $lastLogins,
            'users' => $users,
        ]);
    }

    public function downloadFile($id, Request $request){
        $message = Message::find($id);
        return Storage::download('files_uploaded/'.$message->file_hash, $message->filename);
    }
}
