<?php

namespace App\Http\Controllers;

use App\Models\ChuyenBay;
use App\Models\ve;
use App\Models\User;
use Illuminate\Http\Request;

class VeController extends  Controller
{
    public function all(Request  $request){
    $users = User::all();
    $chuyenbay = Chuyenbay::all();
    $paraID = $request->get("idkh");
    $ve= Ve::ID($paraID)->simplePaginate(10);
    return view ("admin.ve.list-ve",[
        "ve"=>$ve,
        "users"=>$users,
        "chuyenbay"=>$chuyenbay
    ]);
}
    public function form(){
    $users = User::all();
    $chuyenbay = Chuyenbay::all();
    return view("admin.ve.add-ve",[
        "users" =>$users,
        "chuyenbay"=>$chuyenbay
    ]);

}

    public function create(Request  $request){
    $request ->validate([
        'idkh'=>'required|string',
        'idchuyenbay' => 'required',
        'ngaydatve' => 'required',
        'trangthai' => 'required',
        'ghethuong' => 'required',
        'ghevip'=>'required',
        'tongtien' => 'required',

    ],[
        'required'=>"Vui lòng nhập thông tin"
    ]);
    Ve::create([
        "idkh"=>$request->get("idkh"),
        "idchuyenbay"=>$request->get("idchuyenbay"),
        "ngaydatve"=>$request->get("ngaydatve"),
        "trangthai"=>$request->get("trangthai"),
        "ghethuong"=>$request->get("ghethuong"),
        'ghevip' => $request->get("ghevip"),
        'tongtien' => $request->get("tongtien"),
    ]);
    return redirect()->to("/ve/list");
}
    public function edit($id){
    $ve = Ve::find($id);
    return view('admin.ve.edit-ve',[
        've'=> $ve
    ]);
}
    public  function update(Request $request, $id){
    $ve = Ve::find($id);
    $ve -> update([
        "trangthai"=>$request->get("trangthai"),
    ]);
    return redirect()->to("/ve/list")->with("success","Cập nhật hóa đơn thành công");
}
    public function delete($id){
    try {
        $ve = Ve::find($id);
        $ve->delete();
        return redirect()->to("/ve/list")->with("success","Xóa hóa đơn thành công");
    }catch (\Exception $e){
        return redirect()->back()->with("error","Không thể xóa");
    }



}
}
