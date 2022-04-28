<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class Cate_controller extends Controller
{
    public function getView(){
        $allCate = Cate::all();
        return view('dashboard.cate',['all_cate'=>$allCate]);
    }
    public function store(Request $request){
        $newCate = new Cate;
        $newCate->name = $request->name;
        $newCate->parent = $request->parent;
        $newCate->slug=vn_to_str($request->name);
        $newCate->save();
        return ["response"=>["success"=>true]];
    }
    public function delete($id){
        Cate::destroy($id);
        return ["response"=>["success"=>true]];
    }
    public function update(Request $request,$id){
        $cate = Cate::find($id);
        $cate->name = $request->name;
        $cate->slug = vn_to_str($request->name);
        $cate->parent = $request->parent;
        $cate->save();
        return ["response"=>["success"=>true]];
    }

}
