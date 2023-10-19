<?php
namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\UsersImportResource;

class UsersImportAction{
    public function execute(){
        $response = Http::get("https://randomuser.me/api/?results=5000")->json();
        if(isset($response["error"])){
            return ["error" => $response["error"]];
        }else{
            $result = $response["results"];
        }

        $update_count = 0;
        $create_count = 0;

        $collection = (UsersImportResource::collection(collect($result)))->resolve();
        $created_at = $collection[0]["created_at"];
        $updated_at = now();

        $users = User::upsert($collection, ["first_name", "last_name"], ["email", "age", "updated_at" => $updated_at]);

        $all_count = User::where("created_at", '=', $created_at)
            ->orWhere("updated_at", '=', $updated_at)->get();
        $create_count = $all_count->where("created_at", '=', $created_at)->count();
        $update_count =$all_count->where("updated_at", '=', $updated_at)->count();

        return [
            "all_count" => User::count(),
            "create_count" => $create_count, 
            "update_count" => $update_count
        ];
    }
}