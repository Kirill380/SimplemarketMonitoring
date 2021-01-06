<?php

namespace App\Http\Controllers;

use App\Models\UserTable;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        return UserTable::all();
    }
}
