<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function index() {
        $contacts = Contact::paginate(7);
        return view('layouts.contacts.index', ['contacts'=>$contacts]);
    }

    public function show (Contact $contact) {
        return view('layouts.contacts.show',['contact'=>$contact]);
    }
    public function edit(Request $request, Contact $contact)
    {
        $data = [
          'status'=>$request->status,
        ];
       DB::beginTransaction();
       try {
        $contact->update($data);
        DB::commit();
        return back()->with('success', 'Đã cập nhật trạng thái thành công');
       } catch (\Exception $e){
        Log::error($e->getMessage());
        DB::rollBack();
        return back()->with('error','Cập nhật trạng thái thất bại');
       }
    }
}
