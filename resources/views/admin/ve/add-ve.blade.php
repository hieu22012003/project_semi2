@section("title")
    Thêm vé
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm vé</h1>
                    <a href="{{url("/admin/ve/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm vé</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm vé</h3>
                </div>
                <form role="form" method="post" action="{{url("/admin/ve/create")}}" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID Khách hàng</label>
                            <select name="idkh" class="form-control">
                                @foreach($users as $item)
                                    <option @if(old("idkh") == $item->id) selected @endif value="{{$item->id}}">{{$item->id}}</option>
                                @endforeach
                            </select>
                            @error("idkh")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ID Chuyến bay	</label>
                            <select name="idchuyenbay" class="form-control">
                                @foreach($chuyenbay as $item)
                                    <option @if(old("idchuyenbay") == $item->idchuyenbay) selected @endif value="{{$item->idchuyenbay}}">{{$item->idchuyenbay}}</option>
                                @endforeach
                            </select>
                            @error("idchuyenbay")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ngày Đặt Vé</label>
                            <input type="date" class="form-control" name="ngaydatve" id="ngaydatve" value="{{old("ngaydatve")}}" placeholder="Ngày đặt">
                            @error("ngaydatve")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="trangthai" class="form-control">
                                <option value="Selectoption">Select Option</option>
                                <option value="Waitting">Waitting</option>
                                <option value="Hired">Hired</option>
                                <option value="Done">Done</option>
                            </select>
                            @error("trangthai")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ghế thường</label>
                            <input type="text" class="form-control" name="ghethuong" id="ghethuong" value="{{old("ghethuong")}}" placeholder="Ghế thường">
                            @error("ghethuong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ghế vip</label>
                            <input type="text" class="form-control" name="ghevip" id="ghevip" value="{{old("ghevip")}}" placeholder="Ghế vip">
                            @error("ghevip")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" class="form-control" name="tongtien" id="tongtien" value="{{old("tongtien")}}" placeholder="Tồng tiền">
                            @error("tongtien")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
