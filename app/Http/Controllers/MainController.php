<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\UsersListAction;
use App\Actions\UsersImportAction;
use App\Http\Resources\UsersImportResource;

class MainController extends Controller
{
    public function index(UsersListAction $action){
        return view("main", ["users" => $action->execute()]);
    }

    public function usersImport(UsersImportAction $action){
        return response()->json([
            "data" => $action->execute()
        ]);
    }
}
