@section("title")
    Sửa Liên Hệ
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sửa Hóa Đơn</h1>
                    <a href="{{url("/lienhe/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa Liên Hệ</li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa Liên Hệ</h3>
                </div>
                <form role="form" method="post" action="{{url("/lienhe/edit",['lienhe'=>$lienhe->id])}}">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" name="hovaten" id="hovaten" value="{{$lienhe->hovaten}}" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="">Mail</label>
                            <input type="text" class="form-control" name="email" id="email"  value="{{$lienhe->email}}" placeholder="Mail">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" id="sdt"  value="{{$lienhe->sdt}}" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <input type="text" class="form-control" name="noidung" id="noidung" value="{{$lienhe->noidung}}" placeholder="Nội dung">
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

