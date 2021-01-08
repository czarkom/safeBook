@extends('app')

@section('content')
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
                {{ auth()->user()->first_name.' '.auth()->user()->last_name }}
            </div>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="button button-small button-primary bg-gray-600">
                    Wyloguj <i class="ml-2 fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="flex">
        <div class="w-1/3">
            <div class="py-2 px-2">
                <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                    Ostatnie logowania
                </div>
                <div class="border-l border-r bg-white p-4">
                    @foreach($lastLogins as $attempt)
                        <div class="my-2">
                            <strong>Adres IP: </strong>{{$attempt->ip_address}} <strong>Data: </strong>{{$attempt->created_at}}
                        </div>
                    @endforeach
                </div>
                <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                    <div class="button button-primary">
                        <a href="{{ url('/resetPassword') }}">Resetuj hasło</a>
                    </div>
                </div>
            </div>
            <div class="py-2 px-2">
                <form action="/sendMessage" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                        Dodaj nową notatkę
                    </div>
                    <div class="border-l border-r bg-white px-4 py-2">
                        <label class="label" for="content">Treść</label>
                        <input id="content"
                               class="input h-10"
                               type="text"
                               placeholder="Lorem ipsum gipsum"
                               name="content"
                        >
                        <div class="my-2 border-2 rounded p-2 bg-gray-100">
                            <div class="mb-2">
                                Wybierz użytkowników
                            </div>
                            <select class="w-full rounded-lg" multiple name="user[]">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2 flex label">
                            <span>Dodaj plik</span>
                            <div class="ml-2">
                                <i class="fas fa-folder-plus"></i> :
                            </div>
                        </div>
                        <input type="file" class="label" name="file">
                        <div>
                            <div class="flex mt-4">
                                <label class="label" for="is_encrypted">Wiadomość szyfrowana</label>
                                <input type="checkbox" class="mx-2" id="is_encrypted" name="is_encrypted">
                            </div>
                            <label class="label mt-2" for="password">Wprowadź hasło jeśli wiadomość ma być zabezpieczona</label>
                            <input id="password"
                                   class="input"
                                   type="password"
                                   placeholder="********"
                                   name="password"
                            >
                        </div>
                    </div>
                    <div class="rounded-b border bg-gray-200 px-4 py-2 text-right flex justify-end">
                        <button type="submit" class="button button-primary">Wyślij</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/3">
            <div>
                <div class="py-2 px-2">
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
                <div class="py-2 px-2">
                    <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                        Moje notatki
                    </div>
                    <div class="border-l border-r bg-white px-4 py-2">
                        @if(count($sent)==0)
                            <div class="font-gray-800">
                                Brak wiadomości
                            </div>
                        @endif
                        @foreach ($sent as $message)
                            <div class="my-2 border-2 rounded-lg bg-gray-100">
                                <div class="bg-gray-200 w-full p-2 font-bold">
                                    {{$message->created_at}}
                                </div>
                                <div class="p-2 break-words">
                                    {{$message->content}}
                                </div>
                                @if($message['decrypted'])
                                    <div class="bg-gray-200 text-green-500 font-bold p-2">
                                        Odszyfrowano
                                    </div>
                                @endif
                                @if($message['is_encrypted'])
                                    <div class="bg-gray-200 w-full p-2">
                                        <form action="/decryptMessage" method="POST">
                                            @csrf
                                            <span>Wiadomość zaszyfrowana, wpisz hasło:</span>
                                            <div class="flex items-center mt-2">
                                                <input id="content"
                                                       class="input h-10 mr-2 w-1/2"
                                                       type="password"
                                                       placeholder="*******"
                                                       name="message_password"
                                                >
                                                <input type="hidden" name="id" value="{{$message->id}}">
                                                <button type="submit" class="button button-primary">Odszyfruj mnie</button>
                                            </div>
                                            @if($message['wrong_password'])
                                                <div class="text-red-500 font-bold">
                                                    Błędne hasło!
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 py-2 px-2">
            <div class="rounded-t border bg-gray-200 px-4 py-3 font-bold">
                Notatki publiczne
            </div>
            <div class="border-l border-r bg-white px-4 py-2">
                @if(count($publicMessages)==0)
                    <div class="font-gray-800">
                        Brak wiadomości
                    </div>
                @endif
                @foreach ($publicMessages as $message)
                    <div class="my-2 border-2 rounded-lg bg-gray-100">
                        <div class="bg-gray-200 w-full p-2 font-bold">
                            {{$message->user->first_name}} {{$message->user->last_name}} ({{$message->user->email}})
                        </div>
                        <div class="p-2 break-words">
                            {{$message->content}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection



