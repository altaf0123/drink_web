<?php

namespace App\Http\Traits;

trait Functions
{
    public function getUserById($id)
    {
        $data = User::find($id);
        return $data;
    }
}
