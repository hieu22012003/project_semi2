@section("title")
    Sửa Máy Bay
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sửa Sân Bay</h1>
                    <a href="{{url("/sanbay/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active"> Sửa sân bay</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit sân bay</h3>
                </div>
                <form role="form" method="post" action="{{url("/sanbay/edit",['idsanbay'=>$sanbay->idsanbay])}}">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tên sân bay</label>
                            <input type="text" class="form-control" name="tensanbay" id="tensanbay" value="{{$sanbay->tensanbay}}" placeholder="Tên sân bay">
                            @error("tensanbay")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Thành phố</label>
                            <input type="text" class="form-control" name="thanhpho" id="thanhpho"  value="{{$sanbay->thanhpho}}" placeholder="Tên thành phố">
                            @error("thanhpho")
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
