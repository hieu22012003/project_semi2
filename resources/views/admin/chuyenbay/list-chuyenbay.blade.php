@section("title")
    Chuyến Bay
@endsection


@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyến Bay</h1>
                    <a href="{{url("/chuyenbay/create")}}" class="btn btn-outline-info float-right">
                        Thêm Chuyến Bay
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chuyến bay</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{url("/chuyenbay/list")}}">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" >
                                        <select name="sanbaydi" class="form-control float-right">
                                            <option value="">--Từ--</option>
                                            @foreach($sanbay as $item)
                                                <option @if(app("request")->input("idsanbay")==$item->idsanbay)  selected @endif value="{{$item->idsanbay}}">{{$item->thanhpho}}</option>
                                            @endforeach
                                        </select>
                                        <select name="sanbayden" class="form-control float-right">
                                            <option value="">--Đến--</option>
                                            @foreach($sanbay as $item)
                                                <option @if(app("request")->input("idsanbay")==$item->idsanbay)  selected @endif value="{{$item->idsanbay}}">{{$item->thanhpho}}</option>
                                            @endforeach
                                        </select>
                                        <input type="date" value="{{app("request")->input("ngaydi")}}"  name="ngaydi" class="form-control float-right" >
                                        <input type="date" value="{{app("request")->input("ngayden")}}"  name="ngayden" class="form-control float-right" >
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
                                    <th>Tên máy bay</th>
                                    <th>Từ</th>
                                    <th>Đến</th>
                                    <th>Ngày đi</th>
                                    <th>Ngày đến</th>
                                    <th>Trạng thái</th>
                                    <th>Khoảng cách</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chuyenbay as $item)
                                    <tr>
                                        <td>{{$item->maybay->tenmaybay}}</td>
                                        <td>{{$item->sanbay1->thanhpho}}</td>
                                        <td>{{$item->sanbay2->thanhpho}}</td>
                                        <td>{{$item->ngaydi}}</td>
                                        <td>{{$item->ngayden}}</td>
                                        <td>{{$item->trangthai}}</td>
                                        <td>{{$item->quangduong}}</td>
                                        <td><a href="{{url("/chuyenbay/edit",['idchuyenbay'=>$item->idchuyenbay])}}" class="btn btn-outline-info">+</a></td>
                                        <td>
                                            <form action="{{url("/chuyenbay/delete",['idchuyenbay'=>$item->idchuyenbay])}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" onclick="return confirm('Xóa Chuyến Bay {{$item->tenchuyenbay}} ?')" class="btn btn-outline-danger">-</button>
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
    {!! $chuyenbay-> appends(app("request")->input())-> links() !!}
    </div>
@endsection

