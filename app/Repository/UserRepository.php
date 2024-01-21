<?php 
namespace App\Repository;

use App\Models\User;

class UserRepository {
    public static function listUsers() {
        $users = User::all();
        return $users;
    }
}


?>