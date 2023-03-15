@section("title")
    Sân Bay
@endsection


@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sân bay</h1>
                    <a href="{{url("/sanbay/create")}}" class="btn btn-outline-info float-right">
                        Thêm Sân Bay
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sân bay</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{url("/sanbay/list")}}">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" >
                                        <input type="text" value="{{app("request")->input("thanhpho")}}"  name="thanhpho" class="form-control float-right" placeholder="Tìm theo tên thành phố">
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
                                    <th>Tên sân bay</th>
                                    <th>Thành phố</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sanbay as $item)
                                    <tr>
                                        <td>{{$item->tensanbay}}</td>
                                        <td>{{$item->thanhpho}}</td>
                                        <td><a href="{{url("/sanbay/edit",['idsanbay'=>$item->idsanbay])}}" class="btn btn-outline-info">+</a></td>
                                        <td>
                                            <form action="{{url("/sanbay/delete",['idsanbay'=>$item->idsanbay])}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" onclick="return confirm('Xóa Sân Bay {{$item->tensanbay}} ?')" class="btn btn-outline-danger">-</button>
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
    {!! $sanbay-> appends(app("request")->input())-> links() !!}
    </div>
@endsection

