@extends('user.layout.template')
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
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tempat wisata</th>
                            <th scope="col">Layanan</th>
                            <th style="width: 310px;" scope="col">Descripsi</th>
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
                                    <a class="btn btn-sm btn-outline-info mr-lg-2 mb-lg-2 detail" href="{{route('DetailWisataUser', $w->id)}}">Detail</a>

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
@include('user.modal_maps')
@endsection

@push('js')

<script>
    function maps(id) {
        $('#modalmaps').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        $.ajax({
            url: "{{url('wisata')}}" + '/' + id + '/show',
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