<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::query()->create([
            'first_name'          => 'Maciej',
            'last_name'           => 'Czarkowski',
            'email'               => 'maciej@czarkowski.pl',
            'password'            => 'password',
            'password_changed_at' => now(),
        ]);


        $user = User::query()->create([
            'first_name'          => 'Tomasz',
            'last_name'           => 'Duszyn',
            'email'               => 'tomasz@duszyn.pl',
            'password'            => 'password',
            'password_changed_at' => now(),
        ]);

        $user = User::query()->create([
            'first_name'          => 'Bartosz',
            'last_name'           => 'Chaber',
            'email'               => 'bchaber@od.pl',
            'password'            => 'password',
            'password_changed_at' => now(),
        ]);

        $user = User::query()->create([
            'first_name'          => 'Kamil',
            'last_name'           => 'Klient',
            'email'               => 'klient@klient.pl',
            'password'            => 'password',
            'password_changed_at' => now(),
        ]);


        $user = User::query()->create([
            'first_name'          => 'Grzegorz',
            'last_name'           => 'Polak',
            'email'               => 'polska@stronk.pl',
            'password'            => 'password',
            'password_changed_at' => now(),
        ]);
    }
}
