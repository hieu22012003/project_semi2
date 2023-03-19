@section("title")
    Thêm
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm </h1>
                    <a href="{{url("/chamsockhachhang/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm </li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm</h3>
                </div>
                <form role="form" method="post" action="{{url("/chamsockhachhang/create")}}" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID User</label>
                            <select name="userid" class="form-control">
                                @foreach($users as $item)
                                    <option @if(old("userid") == $item->id) selected @endif value="{{$item->id}}">{{$item->id}}</option>
                                @endforeach
                            </select>
                            @error("userid")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ID Liên hệ</label>
                            <select name="idlienhe" class="form-control">
                                @foreach($lienhe as $item)
                                    <option @if(old("idchuyenbay") == $item->id) selected @endif value="{{$item->id}}">{{$item->id}}</option>
                                @endforeach
                            </select>
                            @error("idchuyenbay")
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

