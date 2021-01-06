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
                <div class="rounded-xl border-8">
                    <img src="/images/safeBook_logo.jpg">
                </div>
                <div class="text-center font-bold text-2xl mt-4">
                    <span>Safebook - your safe space! <i class="fas fa-user-shield"></i></span>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }} dupa</span>
                @endif
                <form method="POST" action="/api/login">
                    @csrf
                    <div class="mt-4">
                        <div class="rounded-t border bg-gray-200 px-4 py-3">
                            Logowanie
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
                        </div>
                        <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                            <button type="submit" class="button button-primary">Zaloguj</button>
                            <div class="button button-primary bg-blue-800">
                                <a href="{{ url('/register') }}">Zarejestruj się</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
