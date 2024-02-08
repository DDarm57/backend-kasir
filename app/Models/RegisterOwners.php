<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterOwners extends Model
{
    use HasFactory;
    public function saveRegister($data_users, $data_owners)
    {
        $user = User::create($data_users);

        $user_id = $user->id;
        $data_owners['user_id'] = $user_id;
        Owners::create($data_owners);

        return ["Users" => $data_users, "Owners" => $data_owners];
    }
}
