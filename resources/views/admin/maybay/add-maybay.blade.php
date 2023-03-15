@section("title")
    Thêm Máy Bay
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm máy bay</h1>
                    <a href="{{url("/maybay/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm máy bay</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm máy bay</h3>
                </div>
                <form role="form" method="post" action="{{url("/maybay/create")}}" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Hãng máy bay</label>
                            <select name="hangmaybay" class="form-control">
                                <option value="Vietnam Airline">Vietnam Airline</option>
                                <option value="Vietjet Air">Vietjet Air</option>
                                <option value="Jetstar Pacific Airlines">Jetstar Pacific Airlines</option>
                                <option value="Bamboo Airways">Bamboo Airways</option>
                            </select>
                            @error("hangmaybay")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tên máy bay</label>
                            <input type="text" class="form-control" name="tenmaybay" id="tenmaybay" value="{{old("tenmaybay")}}" placeholder="Tên máy bay">
                            @error("tenmaybay")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ghế thường</label>
                            <input type="text" class="form-control" name="ghethuong" id="ghethuong" value="{{old("thanhpho")}}" placeholder="Nhập số ghế thường">
                            @error("ghethuong")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ghế vip</label>
                            <input type="text" class="form-control" name="ghevip" id="ghevip" value="{{old("thanhpho")}}" placeholder="Nhập số ghế vip">
                            @error("ghevip")
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

