<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    private function randomPassword()
    {
        $arr = ['a', 'z', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'q', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'w', 'x', 'c', 'v', 'b', 'n', 'A', 'Z', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'Q', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'W', 'X', 'C', 'V', 'B', 'N', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $iterate = rand(8, 15);
        $password = '';

        for ($i = 0; $i < $iterate; $i++) {
            $rand = rand(0, count($arr) - 1);

            $password = $password.$arr[$rand];
        }

        return $password;
    }

    public function handle(String $email)
    {
        //$password = $this->randomPassword();

        $password = 'Azerty123';

        $user = User::create([
            'name' => 'user',
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return $user;
    }
}