<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersImportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "first_name" => $this["name"]["first"],
            "last_name" => $this["name"]["last"],
            "email" => $this["email"],
            "age" => $this["dob"]["age"],
            "created_at" => Carbon::now()->toDateTimeString()
        ];
    }
}
