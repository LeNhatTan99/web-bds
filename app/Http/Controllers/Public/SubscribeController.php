<?php

namespace App\Http\Controllers\Public;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\SubscribeEmail;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:subscribes'],
        ]);
    }

    public function subscribe(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = [
            'email'=>$request->email,
        ];
        DB::beginTransaction();
        try{
            $subscribe = Subscribe::create($data);
            DB::commit();
            event(new SubscribeEmail($subscribe));
            return back()->with('success',"Đăng ký nhận tin tức thành công");
        } catch(\Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error',"Đăng ký nhận tin thất bại");
        }
    }




}
