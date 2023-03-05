<?php

namespace App\Http\Controllers;

use App\Models\MayBay;

use Illuminate\Http\Request;

class MayBayController extends Controller
{
    //
    public function all(Request  $request){
        $parahangmaybay = $request->get("hangmaybay");
        $paratenmaybay= $request->get("tenmaybay");
        $maybay = MayBay::Hangmaybay($parahangmaybay)->Tenmaybay($paratenmaybay)->simplePaginate(10);
        return view ("admin.maybay.list-maybay",[
            "maybay" => $maybay
        ]);
    }
    public function form(){
        return view("admin.maybay.add-maybay");
    }
    public function create(Request $request){
        $request ->validate([
            'hangmaybay' => 'required',
            'tenmaybay' => 'required',
            'ghethuong' => 'integer',
            'ghevip' => 'integer',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'integer'=>"Vui lòng số"
        ]);
        MayBay::create([
            "hangmaybay"=>$request->get("hangmaybay"),
            "tenmaybay"=>$request->get("tenmaybay"),
            "ghethuong"=>$request->get("ghethuong"),
            "ghevip"=>$request->get("ghevip"),
        ]);
        return redirect()->to("/maybay/list");
    }
    public function edit($idmaybay){
        $maybay = MayBay::find($idmaybay);;
        return view('admin.maybay.edit-maybay',[
            'maybay'=> $maybay
        ]);
    }
    public function update(Request  $request,$idmaybay){
        $maybay = MayBay::find($idmaybay);
        $request ->validate([
            'hangmaybay' => 'required',
            'tenmaybay' => 'required',
            'ghethuong' => 'integer',
            'ghevip' => 'integer',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'integer'=>"Vui lòng số"
        ]);
        $maybay -> update([
            "hangmaybay"=>$request->get("hangmaybay"),
            "tenmaybay"=>$request->get("tenmaybay"),
            "ghethuong"=>$request->get("ghethuong"),
            "ghevip"=>$request->get("ghevip"),

        ]);
        return redirect()->to("/maybay/list")->with("success","Cập nhật máy bay thành công");
    }
    public function delete($idmaybay){
        try {
            $maybay = MayBay::find($idmaybay);
            $maybay -> delete();
            return redirect()->to("/maybay/list")->with("success","Xóa hóa đơn thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }

    }
}
