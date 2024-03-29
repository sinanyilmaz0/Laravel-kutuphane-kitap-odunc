@extends('layouts.admin')

@section('title', 'Kategoriler')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800" style="display: inline-block;">Kategoriler</h1>
    <a href="{{route('admin_category_add')}}" class="btn btn-primary btn-icon-split" style="margin: 0 0 10px 10px;">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        <span class="text">Kategori Ekle</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Parent id</th>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>Resim</th>
                            <th>Statü</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Parent id</th>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>Resim</th>
                            <th>Statü</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($datalist as $rs)
                        <tr>
                            <td>{{$rs->id}}</td>
                            <td>   
                            {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}
                            </td>
                            <td>{{$rs->title}}</td>
                            <td>{{$rs->keywords}}</td>
                            <th>{{$rs->description}}</th>
                            <td>
                                @if($rs->image)
                                    <img src="{{Storage::url($rs->image)}}" height="30" alt="">
                                @endif
                            </td>
                            <th>{{$rs->status}}</th>
                            <td><a href="{{route('admin_category_edit', ['id'=> $rs->id])}}"><i class="fas fa-edit"></i>Düzenle</a></td>
                            <td><a href="{{route('admin_category_delete', ['id'=> $rs->id])}}" onclick="return confirm('Silmek istediğine emin misin ?')"><i class="fas fa-trash-alt"></i>Sil</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


</div>

@endsection

@section('footer')
    <!-- Page level plugins -->
    <script src="{{ asset('assets') }}/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets') }}/admin/js/demo/datatables-demo.js"></script>
@endsection