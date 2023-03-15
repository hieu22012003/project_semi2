@section("title")
    Sửa Chuyển Bay
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sửa Chuyển Bay</h1>
                    <a href="{{url("/chuyenbay/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active"> Sửa chuyến bay</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit chuyến bay</h3>
                </div>
                <form role="form" method="post" action="{{url("/chuyenbay/edit",['idchuyenbay'=>$chuyenbay->idchuyenbay])}}">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên máy bay</label>
                            <select name="idmaybay" class="form-control">
                                @foreach($maybay as $item)
                                    <option @if($chuyenbay->idmaybay == $item->idmaybay) selected @endif value="{{$item->idmaybay}}"> {{$item->tenmaybay}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đi</label>
                            <input type="datetime-local" class="form-control" name="ngaydi" id="ngaydi"  value="{{$chuyenbay->ngaydi}}" placeholder="Ngày đi">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đến</label>
                            <input type="datetime-local" class="form-control" name="ngayden" id="ngayden"  value="{{$chuyenbay->ngayden}}" placeholder="Ngày đến">
                            @error("ngayden")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            {{--                            <input type="text" class="form-control" name="trangthai" id="trangthai"  value="{{$chuyenbay->trangthai}}" placeholder="Trạng thái">--}}
                            <select name="trangthai" id="trangthai" @selected($chuyenbay->trangthai) class="form-control">
                                <option value="xác nhận">Xác nhận</option>
                                <option value="hủy">Hủy</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Giá vé thường</label>
                            <input type="text" class="form-control" name="giavethuong" id="giavethuong"  value="{{$chuyenbay->giavethuong}}" placeholder="Giá $">
                            @error("giavethuong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá vé vip</label>
                            <input type="text" class="form-control" name="giavevip" id="giavevip"  value="{{$chuyenbay->giavevip}}" placeholder="Giá $">
                            @error("giavevip")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quãng đường</label>
                            <input type="text" class="form-control" name="quangduong" id="quangduong"  value="{{$chuyenbay->quangduong}}" placeholder="Quãng đường">
                            @error("quangduong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">From</label>
                            <select name="sanbaydi" class="form-control">
                                @foreach($sanbay as $item)
                                    <option @if($chuyenbay->sanbaydi == $item->idsanbay) selected @endif value="{{$item->idsanbay}}"> {{$item->thanhpho}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">To</label>
                            <select name="sanbayden" class="form-control">
                                @foreach($sanbay as $item)
                                    <option @if($chuyenbay->sanbayden == $item->idsanbay) selected @endif value="{{$item->idsanbay}}"> {{$item->thanhpho}} </option>
                                @endforeach
                            </select>
                            @error("sanbayden")
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

