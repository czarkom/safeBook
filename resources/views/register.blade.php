@extends('app')

@section('content')
<div class="flex justify-center">
    <div class=" w-1/3 mt-16">
        <div class="text-center font-bold text-2xl mt-4">
            <span>Safebook - rejestracja</span>
        </div>
        <form method="POST" action="/register">
            @csrf
            <div class="mt-4">
                <div class="rounded-t border bg-gray-200 px-4 py-3">
                    Uzupełnij wymagane dane
                </div>
                <div class="border-l border-r bg-white p-4">
                    @if ($errors->any())
                        <div class="border-2 m-2 p-2 rounded-xl border-red-800 bg-red-500">
                            <span>Popraw błędy w formularzu</span>
                        </div>
                    @endif
                    <label class="label font-semibold" for="name">Imię</label>
                    <input id="name"
                           class="input"
                           type="text"
                           placeholder="Janusz"
                           name="first_name"
                    >
                    @error('first_name')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
                    <label class="label mt-4 font-semibold" for="surname">Nazwisko</label>
                    <input id="surname"
                           class="input"
                           type="text"
                           placeholder="Kowalski"
                           name="last_name">
                    @error('last_name')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
                    <label class="label mt-4 font-semibold" for="email">Adres e-mail</label>
                    <input id="email"
                           class="input"
                           type="text"
                           placeholder="john.doe@example.com"
                           name="email"
                    >
                    @error('email')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
                    <label class="label mt-4" for="password">
                        <span class="font-semibold">
                            Hasło
                        </span>
                        (musi zawierać co najmniej 1 dużą, 1 małą literę, 1 cyfrę oraz 1 znak specjalny (!$#%@&^))
                    </label>
                    <input id="password"
                           class="input"
                           type="password"
                           placeholder="********"
                           name="password"
                    >
                    @error('password')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
                    <label class="label mt-4 font-semibold" for="password_repeat">Powtórz hasło</label>
                    <input id="password_repeat"
                           class="input"
                           type="password"
                           placeholder="********"
                           name="password_repeat"
                    >
                    @error('password_repeat')
                        <div class="mt-1 text-red-500 font-medium mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                    <button type="submit" class="button button-primary">Zarejestruj</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

