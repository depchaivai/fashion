<?php

namespace App\Http\Controllers;

use App\Models\Saleproduct;
use Illuminate\Http\Request;

class Saleproduct_controller extends Controller
{
    public function index(){
        $allsale = Saleproduct::with('thisproduct.thiscate','thisproduct.thisth')->get();
        return view('dashboard.saleproduct',["allsalep"=>$allsale]);
    }
    public function addview(){
        return view('dashboard.addsaleproduct');
    }
    public function store(Request $request){
        $newsalep = new Saleproduct;
        $newsalep->product_id = $request->product_id;
        $newsalep->size = $request->size;
        $newsalep->color = $request->color;
        $newsalep->price = $request->price;
        $newsalep->count = $request->count;
        $newsalep->save();
        return redirect()->route('saleproduct.index');
    }
    public function editview($id){
        $salep = Saleproduct::with('thisproduct.thiscate','thisproduct.thisth')->find($id);
        return view('dashboard.editsaleproduct',["thisp"=>$salep]);
    }
    public function update(Request $request,$id){
        $newsalep = Saleproduct::find($id);
        $newsalep->size = $request->size;
        $newsalep->color = $request->color;
        $newsalep->price = $request->price;
        $newsalep->count = $request->count;
        $newsalep->save();
        return redirect()->route('saleproduct.index');
    }
}
