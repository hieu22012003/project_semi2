<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function all(Request  $request){
        $paraName = $request->get("hovaten");
        $lienhe= LienHe::Name($paraName)->simplePaginate(10);
        return view ("admin.lienhe.list-lienhe",[
            "lienhe"=>$lienhe,
        ]);
    }
    public function form(){
        $lienhe = LienHe::all();
        return view("admin.lienhe.add-lienhe",[
            "lienhe"=>$lienhe
        ]);

    }

    public function create(Request  $request){
        $request ->validate([
            'hovaten'=>'required|string',
            'email' => 'required',
            'sdt' => 'required',
            'noidung' => 'required',
        ],[
            'required'=>"Vui lòng nhập thông tin"
        ]);
        Lienhe::create([
            "hovaten"=>$request->get("hovaten"),
            "email"=>$request->get("email"),
            "sdt"=>$request->get("sdt"),
            "noidung"=>$request->get("noidung"),
        ]);
        return redirect()->to("/lienhe/list");
    }
    public function edit($id){
        $lienhe = LienHe::find($id);
        return view('admin.lienhe.edit-lienhe',[
            'lienhe'=> $lienhe
        ]);
    }
    public function update(Request $request, $id ){
        $lienhe = LienHe::find($id);
        $lienhe -> update([
            "hovaten"=>$request->get("hovaten"),
            "email"=>$request->get("email"),
            "sdt"=>$request->get("sdt"),
            "noidung"=>$request->get("noidung")
        ]);
        return redirect()->to("/lienhe/list")->with("success","Cập nhật liên hệ thành công");
    }

    public function delete($id){
        try {
            $lienhe = LienHe::find($id);
            $lienhe->delete();
            return redirect()->to("/lienhe/list")->with("success","Xóa liên hệ thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }
    }
}
