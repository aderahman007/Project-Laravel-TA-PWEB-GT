@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<h1 class="mt-4">Wisata</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    Data Wisata
                    <a class="btn btn-primary ml-auto" href="#" onclick="tambah()">Tambah Tempat Wisata</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tempat wisata</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Descripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Maps</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($wisata as $w)
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td>{{$w->wisata}}</td>
                            <td><?= substr($w->layanan, 0, 100) . '...'; ?></td>
                            <td><?= substr($w->descripsi, 0, 100) . '...'; ?></td>
                            <td><?= substr($w->alamat, 0, 100) . '...'; ?></td>
                            <td><a href="#" onclick="maps('+{{$w->id}}+')"><img src="{{asset('image_upload/maps.png')}}" alt="" width="100" height="75"></a></td>
                            <td><img src="{{asset('image_upload/' . $w->foto)}}" alt="foto" width="100" height="75"></td>
                            <td>
                                <div class="row">
                                    <a class="btn btn-sm btn-outline-info mr-lg-2 mb-lg-2 detail" href="{{route('wisata.show', $w->id)}}">Detail</a>
                                    <a class="btn btn-sm btn-outline-warning mr-lg-2 mb-lg-2 edit" onclick="edit('+{{$w->id}}+')">Edit</a>
                                    <form action="{{route('wisata.destroy', $w->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{$wisata->links()}}
            </div>
        </div>
    </div>
</div>
@include('admin.modal_tambah_wisata');
@include('admin.modal_edit_wisata');
@include('admin.modal_maps');
@endsection

@push('js')

<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: "{{Session::get('success')}}",
        });

    }

    function tambah() {
        $('#modaltambah').modal({
            keyboard: false,
            backdrop: 'static',
            show: true,
        });
        $('#modaltambah form')[0].reset();
    }

    function edit(id) {
        $('#modaledit').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        $.ajax({
            url: "{{url('admin/wisata')}}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.wisata').val(data.wisata);
                // $('.layanan').val(data.layanan);
                CKEDITOR.instances.layanan.setData(data.layanan);
                $('.foto').attr('src', '{{asset("image_upload")}}' + '/' + data.foto);
                // $('.descripsi').val(data.descripsi);
                CKEDITOR.instances.descripsi.setData(data.descripsi);
                $('.alamat').val(data.alamat);
                //CKEDITOR.instances.alamat.setData(data.alamat);
                $('.link_maps').val(data.link_maps);
                //CKEDITOR.instances.link_maps.setData(data.link_maps);
                $('.action').attr('action', '{{url("admin/wisata")}}' + '/' + data.id);

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }



    function maps(id) {
        $('#modalmaps').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        $.ajax({
            url: "{{url('admin/wisata')}}" + '/' + id + '/show',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.maps').html(data.link_maps);
                $('iframe').attr('class', 'embed-responsive-item');

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }
</script>


@endpush