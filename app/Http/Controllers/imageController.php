<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image 

class imageController extends Controller

{
    public function index()
    {
     $images = Image::all();//レコード取得
     return view('image.index',compact('images')); //一覧表示
     }

    public function form()
    {
    return view('image.form')//投稿フォーム表示
    }

    public function store()//保存のためなのでstorestoreだろ～
    {
        //画像の処理
        $image = $request->file('image');//file()で受け取る
        if($request->hasFile('image') && $image->isValid()){//画像があるないで条件分岐
            $image = $image->getClientOriginalName();//storeAsで指定する画像名を作成
        }else{
            return;

    Image::create([
      'image' => $request->file('image')->storeAs('public/images',$image),
     ]);
//storage/app/public/images(imagesは作られる)に保存

    return redirect(/images);//保存処理後一覧ページに飛ばす

    }


