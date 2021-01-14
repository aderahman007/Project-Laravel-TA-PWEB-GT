@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<h1 class="mt-2">Lokasi</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    Lokasi
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card p-3 bg-light mb-3">
                        <div class="lokasi mx-auto embed-responsive embed-responsive-16by9">{!! $lokasi['lokasi'] !!}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $('iframe').attr('class', 'embed-responsive-item');
</script>
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