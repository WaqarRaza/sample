<?php namespace App\Http\Repositories;

use App\Models\User;


class UserRepository {

    public function find($name) {
        return User::firstWhere('name', $name);
    }


    public function findByEmail($email) {
        return User::firstWhere('email', $email);
    }

}