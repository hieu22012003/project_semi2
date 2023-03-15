@section("title")
    Chăm Sóc Khách Hàng
@endsection


@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>  Chăm Sóc Khách Hàng</h1>
                    <a href="{{url("/chamsockhachhang/create")}}" class="btn btn-outline-info float-right">
                        Thêm
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active"> Chăm Sóc Khách Hàng</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{url("/chamsockhachhang/list")}}">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" >
                                        <input type="text" value="{{app("request")->input("iduer")}}"  name="iduer" class="form-control float-right" placeholder="Search by ID User">
                                        <input type="text" value="{{app("request")->input("idlienhe")}}"  name="idlienhe" class="form-control float-right" placeholder="Search by ID Liên hệ">
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
                                    <th>ID User</th>
                                    <th>ID Liên Hệ</th>
                                    {{--                                    <th>Sửa</th>--}}
                                    {{--                                    <th>Xóa</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chamsockhachhang as $item)
                                    <tr>
                                        <td>{{$item->iduser}}</td>
                                        <td>{{$item->idlienhe}}</td>
                                        {{--                                        <td><a href="{{url("/chamsockhachhang/edit",['iduser'=>$item->iduser])}}" class="btn btn-outline-info">+</a></td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            <form action="{{url("/chamsockhachhang/delete",['iduser'=>$item->iduser])}}" method="post">--}}
                                        {{--                                                @csrf--}}
                                        {{--                                                @method("delete")--}}
                                        {{--                                                <button type="submit" onclick="return confirm('Xóa Hóa Đơn {{$item->iduser}} ?')" class="btn btn-outline-danger">-</button>--}}
                                        {{--                                            </form>--}}
                                        {{--                                        </td>--}}
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
    {!! $chamsockhachhang-> appends(app("request")->input())-> links() !!}
    </div>
@endsection
