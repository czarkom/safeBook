@extends('app')

@section('content')
    <div class="flex justify-center">
        <div class=" w-1/3 mt-16">
            <div class="text-center font-bold text-2xl mt-4">
                <span>Safebook - resetowanie hasła</span>
            </div>
            <form method="POST" action="/reset-password">
                @csrf
                <div class="mt-4">
                    <div class="rounded-t border bg-gray-200 px-4 py-3">
                        Uzupełnij dane
                    </div>
                    <div class="border-l border-r bg-white p-4">
                        <label class="label" for="email">Email</label>
                        <input id="email"
                               class="input"
                               type="text"
                               placeholder="janusz.kowalski@gmail.com"
                               name="email"
                        >
                        <label class="label" for="password">Nowe hasło</label>
                        <input id="password"
                               class="input"
                               type="password"
                               placeholder="******"
                               name="password"
                        >
                        <label class="label" for="password_confirmation">Powtórz nowe hasło</label>
                        <input id="password_confirmation"
                               class="input"
                               type="password"
                               placeholder="******"
                               name="password_confirmation"
                        >
                        <input type="hidden" name="token" value="{{ $token }}">
                    </div>
                    <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                        <button type="submit" class="button button-primary">
                            Resetuj hasło
                            <i class="fas fa-trash-restore-alt ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


