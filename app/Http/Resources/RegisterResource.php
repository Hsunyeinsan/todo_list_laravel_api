<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{

    public string $token;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct($resource,string $token)
    {
        parent::__construct($resource);
        $this->token=$token;
    }
    

    public function toArray(Request $request): array
    {
        return [
            "token"=>$this->token,
            "user"=>[
                "id"=>$this->id,
                "name"=>$this->name,
                "email"=>$this->email,
                "created_at"=>$this->created_at,
                "updated_at"=>$this->updated_at
            ]
        ];
    }
}
