@section("title")
    Liên Hệ
@endsection


@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liên Hệ</h1>
                    <a href="{{url("/lienhe/create")}}" class="btn btn-outline-info float-right">
                        Thêm Liên Hệ
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên Hệ</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{url("/lienhe/list")}}">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" >
                                        <input type="text" value="{{app("request")->input("hovaten")}}"  name="hovaten" class="form-control float-right" placeholder="Search by Name">
                                        <select name="hovaten" class="form-control float-right">
                                            <option value="">--Select ID--</option>
                                            @foreach($lienhe as $item)
                                                <option @if(app("request")->input("hovaten")==$item->hovaten)  selected @endif value="{{$item->hovaten}}">{{$item->hovaten}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Họ và Tên</th>
                                    <th>Mail</th>
                                    <th>Số điện thoại</th>
                                    <th>Nội dung</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lienhe as $item)
                                    <tr>
                                        <td>{{$item->hovaten}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->sdt}}</td>
                                        <td>{{$item->noidung}}</td>
                                        <td><a href="{{url("/lienhe/edit",['id'=>$item->id])}}" class="btn btn-outline-info">+</a></td>
                                        <td>
                                            <form action="{{url("/lienhe/delete",['idkh'=>$item->id])}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" onclick="return confirm('Xóa Liên Hệ {{$item->hovaten}} ?')" class="btn btn-outline-danger">-</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! $lienhe-> appends(app("request")->input())-> links() !!}
    </div>
@endsection
