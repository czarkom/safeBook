@extends('app')

@section('content')
    <div class="flex justify-center">
        <div class=" w-1/3 mt-16">
            <div class="text-center font-bold text-2xl mt-4">
                <span>Safebook - zapomniałem hasła</span>
            </div>
            <form method="POST" action="/forgot-password">
                @csrf
                <div class="mt-4">
                    <div class="rounded-t border bg-gray-200 px-4 py-3">
                        Podaj adres email przypisany do Twojego konta w Safebook
                    </div>
                    <div class="border-l border-r bg-white p-4">
                        @if(session('status'))
                            <div class="border-2 m-2 p-2 rounded-xl border-green-800 bg-green-500">
                                {{ session('status') }}
                            </div>
                        @endif
                        <label class="label" for="old_password">Email</label>
                        <input id="old_password"
                               class="input"
                               type="text"
                               placeholder="janusz.kowalski@gmail.com"
                               name="email"
                        >
                    </div>
                    <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                        <div class="button button-primary bg-blue-800 mr-2">
                            <a href="{{ url('/login') }}">Powrót do strony logowania</a>
                        </div>
                        <button type="submit" class="button button-primary">
                            Wyślij link resetujący
                            <i class="fas fa-trash-restore-alt ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

