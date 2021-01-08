<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\User;
use App\Services\MessageService;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request, MessageService $messageService, UserService $userService)
    {
        $currentUser = $request->user();

        $publicMessages = $messageService->getPublicMessages();
        $sent = $messageService->getUserSentMessages($currentUser, false, $request);
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
}
