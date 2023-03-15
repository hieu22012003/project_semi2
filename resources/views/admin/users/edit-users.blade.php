@section("title")
    Sửa Users
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sửa </h1>
                    <a href="{{url("/users/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa </li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa </h3>
                </div>
                <form role="form" method="post" action="{{url("/users/edit",['users'=>$users->id])}}">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$users->name}}" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="">Mail</label>
                            <input type="text" class="form-control" name="email" id="email"  value="{{$users->email}}" placeholder="Mail">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="password"  value="{{$users->password}}" placeholder="*****">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                            @error("avatar")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" id="sdt"  value="{{$users->sdt}}" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi" id="diachi" value="{{$users->diachi}}" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="">Dặm bay</label>
                            <input type="text" class="form-control" name="dambay" id="dambay" value="{{$users->dambay}}" placeholder="Dặm bay">
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

