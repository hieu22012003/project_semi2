@section("title")
    vé
@endsection


@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>vé</h1>
                    <a href="{{url("/admin/ve/create")}}" class="btn btn-outline-info float-right">
                        Thêm vé
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">vé</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{url("/admin/ve/list")}}">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" >
                                        <input type="text" value="{{app("request")->input("idkh")}}"  name="idkh" class="form-control float-right" placeholder="Search by ID khách hàng">
                                        <select name="Brand" class="form-control float-right">
                                            <option value="">--Select ID--</option>
                                            @foreach($ve as $item)
                                                <option @if(app("request")->input("Brand")==$item->idkh)  selected @endif value="{{$item->idkh}}">{{$item->idkh}}</option>
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
                                    <th>Tên khách hàng</th>
                                    <th>Từ</th>
                                    <th>Đến</th>
                                    <th>Ngày đặt vé</th>
                                    <th>Trạng thái</th>
                                    <th>Ghế thường</th>
                                    <th>Ghế vip</th>
                                    <th>Tổng tiền</th>
                                    <th>Cập nhật</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ve as $item)
                                    <tr>
                                        <td>{{$item->users->name}}</td>
                                        <td>{{$item->chuyenbay->sanbay1->thanhpho}}</td>
                                        <td>{{$item->chuyenbay->sanbay2->thanhpho}}</td>
                                        <td>{{$item->ngaydatve}}</td>
                                        <td>{{$item->trangthai}}</td>
                                        <td>{{$item->ghethuong}}</td>
                                        <td>{{$item->ghevip}}</td>
                                        <td>{{$item->tongtien}}</td>
                                        <td><a href="{{url("/admin/ve/edit",['id'=>$item->id])}}" class="btn btn-outline-info">+</a></td>
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
    {!! $hoadon-> appends(app("request")->input())-> links() !!}
    </div>
@endsection
