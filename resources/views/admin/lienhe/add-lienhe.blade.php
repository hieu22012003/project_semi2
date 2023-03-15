@section("title")
    Thêm Liên Hệ
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Liên Hệ</h1>
                    <a href="{{url("/lienhe/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm Liên Hệ</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Liên Hệ</h3>
                </div>
                <form role="form" method="post" action="{{url("/lienhe/create")}}" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control"  name="hovaten" id="hovaten"  value="{{old("hovaten")}}" placeholder="Họ tên">
                            @error("hovaten")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mail</label>
                            <input type="text" class="form-control"  name="email" id="email"  value="{{old("email")}}" placeholder="Mail">
                            @error("email")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" id="sdt" value="{{old("sdt")}}" placeholder="Số điện thoại">
                            @error("sdt")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" name="noidung" id="noidung" value="{{old("noidung")}}" placeholder="tongtien"></textarea>
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

