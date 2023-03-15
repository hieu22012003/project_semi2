@section("title")
    Sửa
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sửa </h1>
                    <a href="{{url("/chamsockhachhang/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active"> Sửa </li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa </h3>
                </div>
                <form role="form" method="post" action="{{url("/chamsockhachhang/edit",['chamsockhachhang'=>$chamsockhachhang->iduser])}}">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID User</label>
                            <input disabled type="text" class="form-control" name="iduser" id="iduser" value="{{$chamsockhachhang->iduser}}" placeholder="ID User">
                        </div>
                        <div class="form-group">
                            <label for="">ID Liên hệ</label>
                            <input type="text" class="form-control" name="idlienhe" id="idlienhe"  value="{{$chamsockhachhang->idlienhe}}" placeholder="ID Liên hệ">
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

