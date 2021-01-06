<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>SafeBook</title>
</head>
<body class="antialiased bg-gray-100">
<div class="flex justify-center">
    <div class=" w-1/3 mt-16">
        <div class="text-center font-bold text-2xl mt-4">
            <span>Safebook - rejestracja</span>
        </div>
        <form method="POST" action="/api/login">
            @csrf
            <div class="mt-4">
                <div class="rounded-t border bg-gray-200 px-4 py-3">
                    Uzupełnij wymagane dane
                </div>
                <div class="border-l border-r bg-white p-4">
                    <label class="label" for="email">Adres e-mail</label>
                    <input id="email"
                           class="input"
                           type="text"
                           placeholder="john.doe@example.com"
                           name="email"
                    >
                    <label class="label mt-2" for="password">Hasło</label>
                    <input id="password"
                           class="input"
                           type="password"
                           placeholder="********"
                           name="password"
                    >
                    <label class="label mt-2" for="password_repeat">Powtórz hasło</label>
                    <input id="password_repeat"
                           class="input"
                           type="password"
                           placeholder="********"
                           name="password_repeat"
                    >
                </div>
                <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                    <button type="submit" class="button button-primary">Zarejestruj</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

