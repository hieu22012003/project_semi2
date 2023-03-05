<?php

namespace App\Http\Controllers;

use App\Models\Sanbay;
use App\Models\Hoadon;
use App\Models\Chuyenbay;
use App\Models\User;
use App\Models\Ve;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("usersPage\index");
    }

    public function about()
    {
        return view("usersPage\about");
    }

    public function blog()
    {
        return view("usersPage\blog");
    }

    public function blogDetail()
    {
        return view("usersPage\blog-detail");
    }

    public function book()
    {
        return view("usersPage\book");
    }

//    public function listChuyenbay(Request  $request){
//        $paratenchuyenbay = $request->get("tenchuyenbay");
//        $chuyenbay = Chuyenbay::Tenchuyenbay($paratenchuyenbay)
//            ->with("maybay")
////            ->with("sanbay1")->with("sanbay2")
//            ->simplePaginate(10);
//        return view ("usersPage.index",[
//            "chuyenbay"=>$chuyenbay
//        ]);
//    }
    public function listChuyenbay(Request $request)
    {
        $sanbay = SanBay::all();
        $sanbaydi = $request->get('sanbaydi');
        $sanbayden = $request->get('sanbayden');
        $ngaydi = $request->get('ngaydi');
        $ngayden = $request->get('ngayden');
        $trangthai = $request->get('trangthai');
        $chuyenbay = ChuyenBay::Sanbaydi($sanbaydi)
            ->Sanbayden($sanbayden)
            ->Ngaydi($ngaydi)
            ->Ngayden($ngayden)
            ->Trangthai($trangthai)
            ->with("maybay")
            ->simplePaginate(10);

        return view("usersPage.index", [
            "chuyenbay" => $chuyenbay,
            "sanbay" => $sanbay
        ]);
    }

    public function checkinOnline()
    {
        return view("usersPage\check-in-online");
    }

    public function contact()
    {
        return view("usersPage\contact");
    }

    public function login()
    {
        return view("usersPage\login");
    }

    public function payment()
    {
        return view("usersPage\payment");
    }
    public function form($idchuyenbay){
        $chuyenbay = ChuyenBay::find($idchuyenbay);
        return view("usersPage.contract",[
            "chuyenbay"=>$chuyenbay,
        ]);
    }

    public function contract1 (Request $request){
        $users = User::all();
        $ghethuong = $request->get("ghethuong");
        $ghevip = $request->get("ghevip");
        $ngaydi = $request->get("ngaydi");
        $ngayden = $request->get("ngayden");
        $noidi = SanBay::find($request->get("sanbaydi"));
        $noiden = SanBay::find($request->get("sanbayden"));
        $giavethuong = $request->get("giavethuong");
        $giavevip = $request->get("giavevip");
        $total = ($ghethuong*$giavethuong)+($ghevip*$giavevip);
        return view("usersPage.contract1",[
            "users"=>$users,
            "total"=>$total,
            "idchuyenbay"=>$request->get("idchuyenbay"),
            'ghethuong'=>$ghethuong,
            'ghevip'=>$ghevip,
            'ngaydi'=>$ngaydi,
            'ngayden'=>$ngayden,
            'noidi'=>$noidi,
            'noiden'=>$noiden,
        ]);
    }

    public function contract(Request  $request){
        $ngaydatve = Carbon::now('Asia/Ho_Chi_Minh');
//        $request ->validate([
//            'idkh'=>'required|string',
//            'idchuyenbay' => 'required',
//            'ngaydatve' => 'required',
//            'ghethuong' => 'required',
//            'ghevip' => 'required',
//            'tongtien' => 'required',
//
//        ],[
//            'required'=>"Vui lòng nhập thông tin"
//        ]);

        Ve::create([
            "idkh"=>$request->get("sdt"),
            "idchuyenbay"=>$request->get("idchuyenbay"),
            "ngaydatve"=>$ngaydatve,
            "trangthai"=>"Chờ xác nhận !!!",
            "ghethuong"=>$request->get("ghethuong"),
            'ghevip' => $request->get("ghevip"),
            'tongtien' => $request->get("tongtien"),
        ]);
        return redirect()->to("/usersPage/index");
    }
    public function promotion(){
        return view("usersPage\promotion");
    }
    public function register(){
        return view("usersPage.register");
    }
}
