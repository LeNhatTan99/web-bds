<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
   public function create(Request $request) {
$data = [
    'content'=>$request->content,
    'post_id'=>$request->post_id,
    'user_id'=> auth()->user()->id,
];
DB::beginTransaction();
try{
   $comment = Comment::create($data);
    DB::commit();
    return back();
}
catch (\Exception $e){
    Log::error($e->getMessage());
    return back()->with('error','Bình luận bài viết không thành công');
} }


}
