<?php

namespace App\Http\Controllers\Public;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function contactProduct(Request $request) {

        $data = [
            'product_id'=>$request->product_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'content'=>$request->content,
        ];
       DB::beginTransaction();
       try {
        $contact= Contact::create($data);
        DB::commit();
        return back()->with('success', 'Đã gửi thông tin liên hệ');
       } catch (\Exception $e){
        Log::error($e->getMessage());
        DB::rollBack();
        return back()->with('error','Gửi thông tin liên hệ thất bại xin vui lòng thử lại');
       }

    }
    
}
