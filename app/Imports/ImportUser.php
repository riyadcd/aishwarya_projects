<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row[0]);
        $user = User::all();
        foreach($user as $users)
        {
            if($users->name == $row[1])
            {
                $users->country = $row[13];
                $users->save();
            }
        }
        
        // dd($row[2]);
        // return new User([
            // 'name' => $row[1],
            // 'email' => $row[1],
            // 'password' => bcrypt($row[2]),
        // ]);
    }
}
