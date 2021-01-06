<?php

namespace App\Http\Controllers;

use App\Models\UserTable;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        return "[{\"id\":1,\"name\":\"Pavel\",\"email\":\"pavel@test.com\",\"email_verified_at\":\"2020-12-24 15:46:54\",\"password\":\"12341234\",\"remember_token\":\"sdfwewe2d\",\"created_at\":\"2020-12-24T15:47:01.000000Z\",\"updated_at\":\"2020-12-24T15:47:05.000000Z\"},{\"id\":2,\"name\":\"Kirill\",\"email\":\"sdfsd\",\"email_verified_at\":null,\"password\":\"3434345345\",\"remember_token\":\"fgfg\",\"created_at\":null,\"updated_at\":null}]";
    }
}
