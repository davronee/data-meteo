<?php

namespace App\Services;

use App\Models\User;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserCreateService
{
    public const REPUBLIC_CODE = 17;

    public function createUser($user_data)
    {
        DB::transaction(function () use ($user_data) {
            // generate oneid_template
            $login = $this->generateLogin($user_data['region_id'], $user_data['district_id'], $user_data['position_code']);

            // create the user
            $user = new User();
            $user->name = $login;
            $user->password = $user_data['password'];
            $user->email = $user_data['email'];

            if(!is_null($user_data['region_id']) && $user_data['region_id'] != 17)
                $user->region_id = $user_data['region_id'];

            if(!is_null($user_data['district_id']))
                $user->district_id = $user_data['district_id'];

            if(!is_null($user_data['station_id']))
                $user->station_id = $user_data['station_id'];

            $user->position_id = Position::where('code', $user_data['position_code'])->pluck('id')->first();

            $user->save();

            // assign roles and permissions
            $user->syncRoles($user_data['roles']);

            if(isset($user_data['permissions']))
                $user->syncPermissions($user_data['permissions']);
        });
    }

    public function generateLogin($region_id, $district_id, $position_code)
    {
        $login_part = sprintf('%s-%s', $position_code, $this->loginRegionPart($region_id, $district_id));
        $last_sequence = User::where('name', 'like', $login_part . '%')->count();
        $current_sequence = $last_sequence + 1;
        $login = $login_part . '-' . with_zero($current_sequence, 3);

        return $login;
    }

    public function loginRegionPart($region_id, $district_id)
    {
        if(!is_null($district_id)) return $district_id;
        if(!is_null($region_id)) return $region_id;

        return self::REPUBLIC_CODE;
    }
}
