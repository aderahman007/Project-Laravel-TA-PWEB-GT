@extends('user.layout.template')
@push('css')

@endpush
@section('content')
<h1 class="mt-4">Tentang</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    Tentang
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card p-3 bg-light mb-3">
                        <img class="mb-3" src="{{asset('image/' . $tentang['gambar'])}}" alt="">
                        <h2 class="text-center mb-2">{{$tentang['judul']}}</h2>
                        <p class="text-justify">{{$tentang['tentang']}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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

</script>


@endpush