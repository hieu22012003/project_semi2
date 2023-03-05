<?php

namespace App\Http\Controllers;

use App\Models\ChuyenBay;
use App\Models\MayBay;
use App\Models\SanBay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChuyenBayController extends Controller
{
    //
    public function all(Request $request){
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

        return view ("admin.chuyenbay.list-chuyenbay",[
            "chuyenbay" => $chuyenbay,
            "sanbay" => $sanbay
        ]);
    }

    public function all1(Request $request){
        $result = DB::select("SELECT cb.idchuyenbay,
CASE
	WHEN `temp`.ghethuongUsed IS NULL THEN mb.ghethuong
   	ELSE mb.ghethuong- `temp`.ghethuongUsed
END as `ghethuongEmpty`,
CASE
	WHEN `temp`.ghevipUsed IS NULL THEN mb.ghevip
   	ELSE mb.ghevip - `temp`.ghevipUsed
END as `ghevipEmpty`
FROM `chuyenbay` cb
left JOIN maybay mb on mb.idmaybay = cb.idmaybay
left JOIN (
    SELECT cb.idchuyenbay, SUM(hd.ghethuong) as `ghethuongUsed`, SUM(hd.ghevip) as `ghevipUsed` FROM `chuyenbay` cb
    left JOIN hoadon hd on hd.idchuyenbay = cb.idchuyenbay
    WHERE hd.trangthai LIKE 'DONE'
    GROUP BY cb.idchuyenbay
) `temp` on `temp`.idchuyenbay = cb.idchuyenbay
WHERE (`temp`.ghethuongUsed < mb.ghethuong OR `temp`.ghevipUsed < mb.ghevip OR `temp`.ghethuongUsed IS NULL OR `temp`.ghevipUsed IS NULL )
GROUP BY cb.idchuyenbay, ghevipEmpty, ghethuongEmpty
");
//      dd(array_map(function ($value) {
//          return $value->idchuyenbay;
//      }, $result));
        $chuyenbays =  ChuyenBay::all()->whereIn('idchuyenbay', array_map(function ($value) {
            return $value->idchuyenbay;
        }, $result))->toArray();
        $result = json_decode(json_encode($result),true);
        for($i=0 ;$i< count($result);$i++){
            $chuyenbays[$i]['ghethuongEmpty'] = $result[$i]['ghethuongEmpty'];
            $chuyenbays[$i]['ghevipEmpty'] = $result[$i]['ghevipEmpty'];
        }
//        $finalResult = array_map(function ($chuyenbay) use ($result) {
//            dd($chuyenbay, $result);
//            $a = array_search($chuyenbay['idchuyenbay'], array_column($result, ''));
//            dd($a);
//        }, $chuyenbays);

        return view("admin.users.test",[
            'chuyenbays' => $chuyenbays
        ]);
    }
    public function form(){
        $maybay = MayBay::all();
        $sanbay = SanBay::all();
        return view("admin.chuyenbay.add-chuyenbay",[
            'maybay' => $maybay,
            'sanbay' => $sanbay
        ]);
    }
    public function create(Request $request){
        $request ->validate([
            'idmaybay' => 'required',
            'ngaydi' => 'required',
//            'ngayden' => 'date_format:H:i|after:ngaydi',
            'ngayden'=> 'different:ngaydi',
            'tansuat' => 'required',
            'soluong' =>'integer',
            'giavethuong' => 'integer',
            'giavevip' => 'integer',
            'quangduong' => 'integer',
            'sanbaydi' => 'required',
            'sanbayden' => 'different:sanbaydi',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'different'=>"Phải khác trường ở trên",
            'integer'=>"Phải là số",
        ]);
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $month = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $giodi = (int)substr($request->get('ngaydi'),0,2);
        $phutdi = (int)substr($request->get('ngaydi'),3,2);
        $gioden = (int)substr($request->get('ngayden'),0,2);
        $phutden = (int)substr($request->get('ngayden'),3,2);
        $ngaydi = Carbon::create($year,$month,$day,$giodi,$phutdi,00);
        $ngayden = Carbon::create($year,$month,$day,$gioden,$phutden,00);
        $tansuat = $request->get('tansuat');
        if($request->get('ngayden')>$request->get('ngaydi')) {
            for ($i = 0; $i < $request->get('soluong'); $i++) {
                ChuyenBay::create([
                    "idmaybay" => $request->get("idmaybay"),
                    "ngaydi" => $ngaydi,
                    "ngayden" => $ngayden,
                    "trangthai" => "xác nhận",
                    "giavethuong" => $request->get("giavethuong"),
                    "giavevip" => $request->get("giavevip"),
                    "quangduong" => $request->get("quangduong"),
                    "sanbaydi" => $request->get("sanbaydi"),
                    "sanbayden" => $request->get("sanbayden"),
                ]);
                $ngaydi = $ngaydi->addDays($tansuat);
                $ngayden = $ngayden->addDays($tansuat);
            }
        }else if($request->get('ngayden')<$request->get('ngaydi')){
            $ngayden = $ngayden->addDays(1);
            for ($i = 0; $i < $request->get('soluong'); $i++) {
                ChuyenBay::create([
                    "idmaybay" => $request->get("idmaybay"),
                    "ngaydi" => $ngaydi,
                    "ngayden" => $ngayden,
                    "trangthai" => "xác nhận",
                    "giavethuong" => $request->get("giavethuong"),
                    "giavevip" => $request->get("giavevip"),
                    "quangduong" => $request->get("quangduong"),
                    "sanbaydi" => $request->get("sanbaydi"),
                    "sanbayden" => $request->get("sanbayden"),
                ]);
                $ngaydi = $ngaydi->addDays($tansuat);
                $ngayden = $ngayden->addDays($tansuat);
            }
        }

        return redirect()->to("/chuyenbay/list");
    }
    public function edit($idchuyenbay){
        $chuyenbay = ChuyenBay::find($idchuyenbay);
        $maybay = MayBay::all();
        $sanbay = SanBay::all();
        return view('admin.chuyenbay.edit-chuyenbay',[
            'chuyenbay'=> $chuyenbay,
            'maybay' => $maybay,
            'sanbay' => $sanbay
        ]);
    }
    public function update(Request  $request,$idchuyenbay){
        $request ->validate([
            'idmaybay' => 'required',
            'ngaydi' => 'required',
            'ngayden' => 'required|date|after:ngaydi',
            'trangthai' => 'required',
            'giavethuong' => 'integer',
            'giavevip' => 'integer',
            'quangduong' => 'integer',
            'sanbaydi' => 'required',
            'sanbayden' => 'different:sanbaydi',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'different'=>"Phải khác trường ở trên",
            'integer'=>"Phải là số",
        ]);
        $chuyenbay = ChuyenBay::find($idchuyenbay);
        $chuyenbay -> update([
            "idmaybay"=>$request->get("idmaybay"),
            "ngaydi"=>$request->get("ngaydi"),
            "ngayden"=>$request->get("ngayden"),
            "trangthai"=>$request->get("trangthai"),
            "giavethuong"=>$request->get("giavethuong"),
            "giavevip"=>$request->get("giavevip"),
            "quangduong"=>$request->get("quangduong"),
            "sanbaydi"=>$request->get("sanbaydi"),
            "sanbayden"=>$request->get("sanbayden"),

        ]);
        return redirect()->to("/chuyenbay/list")->with("success","Cập nhật chuyến bay thành công");
    }
    public function delete($idchuyenbay){
        try {
            $chuyenbay = ChuyenBay::find($idchuyenbay);
            $chuyenbay -> delete();
            return redirect()->to("/chuyenbay/list")->with("success","Xóa chuyển bay thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }

    }
}
