<?php
namespace App\Actions;

use App\Models\User;

class UsersListAction{
    public function execute(){
        return User::count();
    }
}