<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\SubscribeEmail;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{

    public function memberSubscribe()
    {
        $members = Subscribe::paginate(10);
        return view('layouts.subscribes.index',['members'=>$members]);
    }



}
