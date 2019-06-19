<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getUserList(){
        $users = User::all();
        echo "<pre>";print_r($users);exit;
        return $users;
    }
}
