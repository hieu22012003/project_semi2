<?php

namespace App\Http\Controllers;

use App\Models\ChamSocKhachHang;
use App\Models\LienHe;
use App\Models\User;
use Illuminate\Http\Request;
class ChamSocKhachHangController  extends Controller
{
    public function all(Request  $request){
        $paraUSER = $request->get("userid");
        $paraLIENHE = $request->get("idlienhe");
        $cskh= ChamSocKhachHang::userid($paraUSER)->IDLIENHE($paraLIENHE)->simplePaginate(10);
        return view ("admin.chamsockhachhang.list-chamsockhachhang",[
            "cskh"=>$cskh,

        ]);
    }
    public function form(){
        $users = User::all();
        $lienhe = LienHe::all();
        $cskh = chamsockhachhang::all();
        return view("admin.chamsockhachhang.add-chamsockhachhang",[
            "chamsockhachhang"=>$cskh,
            "users"=>$users,
            "lienhe"=>$lienhe
        ]);

    }
    public function create(Request  $request){
        $request ->validate([
            'userid'=>'required',
            'idlienhe' => 'required',
        ],[
            'required'=>"Vui lòng nhập thông tin"
        ]);
        chamsockhachhang::create([
            "userid"=>$request->get("userid"),
            "idlienhe"=>$request->get("idlienhe"),
        ]);
        return redirect()->to("/chamsockhachhang/list");
    }
    public function edit($userid){
        $cskh = chamsockhachhang::find($userid);
        return view('admin.cskh.edit-cskh',[
            'chamsockhachhang'=> $cskh
        ]);
    }
    public function update(Request $request, $userid ){
        $cskh = chamsockhachhang::find($userid);
        $cskh -> update([
            "userid"=>$request->get("userid"),
            "idlienhe"=>$request->get("idlienhe"),
        ]);
        return redirect()->to("/chamsockhachhang/list")->with("success","Cập nhật thành công");
    }

    public function delete($userid){
        try {
            $cskh = chamsockhachhang::find($userid);
            $cskh->delete();
            return redirect()->to("/chamsockhachhang/list")->with("success","Xóa thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }
    }
}
