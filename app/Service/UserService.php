<?php 
namespace App\Service;

use App\Repository\UserRepository;

class UserService {
    public static function isVerified() {
        $users = UserRepository::listUsers();

        $verifiedUser = [];

        foreach($users as $user) {
            if($user->email_verified_at != null) {
                array_push($verifiedUser, 'User ID-'.$user->id.' sudah verified');
            } else {
                array_push($verifiedUser, 'User ID-'.$user->id.' belum verified');
            }
        }

        return $verifiedUser;
    }
}

?>