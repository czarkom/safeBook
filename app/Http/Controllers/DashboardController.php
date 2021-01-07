<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request, MessageService $messageService)
    {
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
