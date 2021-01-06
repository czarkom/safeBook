<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>SafeBook</title>
</head>
<body class="antialiased bg-gray-100">
<div class="w-full">
    <div class="w-full flex justify-between bg-gray-300">
        <div class="p-4 items-center font-bold text-2xl flex">
            Safebook
            <span class="ml-2">
                <i class="fas fa-user-shield"></i>
            </span>
        </div>
        <div class="flex items-center bg-gray-400 py-3 px-8">
            <div class="mr-4 inline-block font-semibold">
                Maciej Czarkowski
            </div>
            <div class="button button-small button-primary bg-gray-600">
                Wyloguj <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="w-2/3">
            <div class="flex w-full">
                <div class="p-4 w-1/2">
                    <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                        Ostatnie logowania
                    </div>
                    <div class="border-l border-r bg-white p-4">
                        <div>
                            1 ostatnie logowanie
                        </div>
                        <div>
                            2 ostatnie logowanie
                        </div>
                        <div>
                            3 ostatnie logowanie
                        </div>
                    </div>
                    <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                        <div class="button button-primary">
                            <a href="{{ url('/resetPassword') }}">Resetuj hasło</a>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-1/2 h-full">
                    <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                        Dodaj nową wiadomość
                    </div>
                    <div class="border-l border-r bg-white p-4">
                        <label class="label" for="email">Treść</label>
                        <input id="email"
                               class="input h-10"
                               type="text"
                               placeholder="Lorem ipsum gipsum"
                               name="email"
                        >
                        <div class="my-6 text-xl flex">
                            Dodaj plik
                            <div class="ml-2">
                                <i class="fas fa-folder-plus"></i>
                            </div>
                        </div>
                        <label class="label mt-2 text-sm" for="password">Wprowadź hasło jeśli wiadomość ma być zabezpieczona</label>
                        <input id="password"
                               class="input"
                               type="password"
                               placeholder="********"
                               name="password"
                        >
                    </div>
                    <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                        <button type="submit" class="button button-primary">Wyślij</button>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="p-4 w-1/2">
                    <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                        Udostępnione dla mnie
                    </div>
                    <div class="border-l border-r bg-white p-4">
                        <div>
                            Wiadomosc 1
                        </div>
                        <div>
                            Wiadomosc 2
                        </div>
                    </div>
                </div>
                <div class="p-4 w-1/2">
                    <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                        Wysłane
                    </div>
                    <div class="border-l border-r bg-white p-4">
                        <div>
                            Wiadomosc 1
                        </div>
                        <div>
                            Wiadomosc 2
                        </div>
                        <div>
                            Wiadomosc 3
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 m-4">
            <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                Wall - wiadomości publiczne
            </div>
            <div class="border-l border-r bg-white p-4">
                <div>
                    Wiadomosc 1
                </div>
                <div>
                    Wiadomosc 2
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>



