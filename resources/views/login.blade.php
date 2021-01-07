@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="w-1/4 mt-16">
        <div class="rounded-xl border-8">
            <img src="/images/safeBook_logo.jpg">
        </div>
        <div class="text-center font-bold text-2xl mt-4">
            Safebook - your safe space!<span class="ml-2"><i class="fas fa-user-shield"></i></span>
        </div>
        <form method="POST" action="/login">
            @csrf
            <div class="mt-4">
                <div class="rounded-t border bg-gray-200 px-4 py-3">
                    Logowanie
                </div>
                <div class="border-l border-r bg-white p-4">
                    @if ($errors->any())
                        <div class="border-2 m-2 p-2 rounded-xl border-red-800 bg-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('status'))
                        <div class="border-2 m-2 p-2 rounded-xl border-green-800 bg-green-500">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label class="label" for="email">Adres e-mail</label>
                    <input id="email"
                           class="input"
                           type="text"
                           placeholder="john.doe@example.com"
                           name="email"
                    >
                    @error('email')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
                    <label class="label mt-2" for="password">Hasło</label>

                    <input id="password"
                           class="input"
                           type="password"
                           placeholder="********"
                           name="password"
                    >
                    @error('password')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
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
@endsection
