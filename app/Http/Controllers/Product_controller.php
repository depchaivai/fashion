<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Product;
use App\Models\Thuonghieu;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    public function index(){
        $allp = Product::with(['thiscate','thisth'])->get();
        return view('dashboard.product',["allp"=>$allp]);
    }
    public function editview($id){
        $myp = Product::find($id);
        $allth = Thuonghieu::where('cate',$myp->cate)->get();
        $all_cate = Cate::where('parent',0)->get();
        return view('dashboard.editnewproduct',["all_cate"=>$all_cate,"allth"=>$allth,"thisp"=>$myp]);
    }
    public function addnewindex(){
        $all_cate = Cate::where('parent',0)->get();
        return view('dashboard.addnewproduct',["all_cate"=>$all_cate]);
    }
    public function store_product_interface(Request $request){
        if(!$request->file('productIMG')){
            return redirect()->route('product.add')->with('imgerr','chưa thêm ảnh');
        }
        $file = $request->file('productIMG');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/images'), $filename);
        $newPI = new Product;
        $newPI->cate = $request->cate;
        $newPI->name = $request->name;
        $newPI->des = $request->des;
        $newPI->th = $request->th;
        $newPI->image = $filename;
        $newPI->save();
        return redirect()->route('product.index');
    }
    public function edit_product_interface(Request $request,$id){
        $editp = Product::find($id);
        if($request->file('productIMG')){
            $file = $request->file('productIMG');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $editp->image = $filename;
        }
        
        $editp->cate = $request->cate;
        $editp->name = $request->name;
        $editp->des = $request->des;
        $editp->th = $request->th;
        $editp->save();
        return redirect()->route('product.index');
    }
    public function getProductByText($text){
        $mysearch = Product::where('name','LIKE',"%{$text}%")->with('thiscate','thisth')->take(10)->get();
        return $mysearch;
    }
    public function getHomepage(){
        $newps = Product::has('allsalling')->with('allsalling')->take(10)->get()->map(function($newps){
            $newps->setRelation('allsalling', $newps->allsalling->take(1));
            return $newps;
        });
        return view('welcome',[ "newps" => $newps ]);
        // return $newps;
    }
    public function detail($id){
        $thisp = Product::with('allsalling','thiscate','thisth')->find($id);
        $listSize = $thisp->allsalling->unique('size')->toArray();
        $onlySize = array_map(function($item){
            return $item['size'];
        },$listSize);
        return view('detail',["thisp"=>$thisp,"listSize"=>$onlySize]);
    }
}
