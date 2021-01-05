<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>SafeBook</title>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

                <div class="flex w-full justify-center">
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/4 mt-16">
                        <div class="flex justify-center">
                            <img src="/images/safeBook_logo.jpg" class="w-1/4">
                        </div>
                        <form>
                            <Card class="mt-4">
                                <div>
                                    Logowanie
                                </div>
                                <div>
                                    <div class="bg-green-500 text-white rounded p-4 mb-4 font-medium">
                                        Konto aktywowane, zaloguj się.
                                    </div>
                                    <div class="bg-red-500 text-blue rounded p-4 mb-4 font-medium">
                                        Popraw formularz
                                    </div>
                                    <div class="bg-red-500 text-white rounded p-4 mb-4 font-medium">
                                        Nieprawidłowy adres e-mail lub hasło
                                    </div>
                                    <label class="label" for="email">Adres e-mail</label>
                                    <input id="email"
                                           class="input"
                                           type="text"
                                           placeholder="john.doe@example.com"
                                           v-model="form.email"
                                    >

                                    <label class="label mt-2" for="password">Hasło</label>
                                    <input id="password"
                                           class="input"
                                           type="password"
                                           placeholder="********"
                                    >
                                </div>
                                <div slot="footer">
                                    <button type="submit" class="button button-primary">Zaloguj</button>
                                </div>
                            </Card>
                        </form>
                    </div>
                </div>
        </div>
    </body>
</html>
