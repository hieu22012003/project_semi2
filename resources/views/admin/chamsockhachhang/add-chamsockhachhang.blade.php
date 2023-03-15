@section("title")
    Thêm Chuyến Bay
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm chuyến bay</h1>
                    <a href="{{url("/chuyenbay/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm chuyến bay</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm chuyến bay</h3>
                </div>
                <form role="form" method="post" action="{{url("/chuyenbay/create")}}" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên máy bay</label>
                            <select name="idmaybay" class="form-control">
                                @foreach($maybay as $item)
                                    <option  @if(old('idmaybay') == $item->idmaybay) selected @endif value="{{$item->idmaybay}}"> {{$item->tenmaybay}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Cất cánh</label>
                            <input type="time" class="form-control" name="ngaydi" id="ngaydi" value="{{old("ngaydi")}}" placeholder="Cất cánh">
                            @error("ngaydi")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hạ cánh</label>
                            <input type="time" class="form-control" name="ngayden" id="ngayden" value="{{old("ngayden")}}" placeholder="Hạ cánh">
                            @error("ngayden")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group" >
                            <label for="">Tấn suất</label>
                            <select name="tansuat" class="form-control">
                                <option value="1">1 ngày 1 chuyến</option>
                                <option value="2">2 ngày 1 chuyến</option>
                                <option value="3">3 ngày 1 chuyến</option>
                                <option value="4">4 ngày 1 chuyến</option>
                            </select>
                            @error("tansuat")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng chuyến muốn tạo</label>
                            <input type="text" class="form-control" name="soluong" id="soluong" value="{{old("soluong")}}" placeholder="Số lượng">
                            @error("soluong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quãng đường</label>
                            <input type="text" class="form-control" name="quangduong" id="quangduong" value="{{old("quangduong")}}" placeholder="Quãng đường">
                            @error("quangduong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá vé thường</label>
                            <input type="text" class="form-control" name="giavethuong" id="giavethuong" value="{{old("giavethuong")}}" placeholder="giá vé $">
                            @error("giavethuong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá vé vip</label>
                            <input type="text" class="form-control" name="giavevip" id="giavevip" value="{{old("giavevip")}}" placeholder="giá vé $ ">
                            @error("giavevip")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nơi đi</label>
                            <select name="sanbaydi" class="form-control">
                                @foreach($sanbay as $item)
                                    <option  @if(old('idsanbay') == $item->idsanbay) selected @endif value="{{$item->idsanbay}}"> {{$item->thanhpho}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nơi đến</label>
                            <select name="sanbayden" class="form-control">
                                @foreach($sanbay as $item)
                                    <option  @if(old('idsanbay') == $item->idsanbay) selected @endif value="{{$item->idsanbay}}"> {{$item->thanhpho}} </option>
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
