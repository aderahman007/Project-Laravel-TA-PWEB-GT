@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<h1 class="mt-4 mb-4">{{$wisata->wisata}}</h1>

<div class="row">
    <div class="col-md-12">
        <img class="mx-auto d-block mb-4 img-fluid" alt="Responsive image" src="{{asset('image_upload/' . $wisata->foto)}}">
        <p class="text-justify">{{$wisata->descripsi}}</p>
        <div class="lokasi embed-responsive-21by9 mb-3">{!! $wisata->link_maps !!}</div>

        <div class="col-md-6 card mx-auto p-2">
            <div class="col-md-12">
                <div class="mx-auto">
                    <!-- <span class="field-label-header">Rating</span> -->
                    <form action="{{request()->segment(2)}}/rating" method="post">
                        {{csrf_field()}}
                        <h4 class="text-primary text-center">Total Rating <?= (($show_rating[0] == null) ? 0 : $show_rating[0]) ?> /5</h4>
                        <div class="form-group" id="rating-ability-wrapper">
                            <label for="rating" class="control-label">
                                <span class="field-label-info"></span>
                                <input type="hidden" name="selected_rating" id="selected_rating" value="" required="required">
                            </label>
                            <h2 class="bold rating-header">
                                <span class="selected-rating">0</span><small> / 5</small>
                            </h2>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                        </div>

                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="mx-auto">
                    <h4 class="text-primary text-center">Komentar</h4>
                    <div class="col-md-12 mt-5">
                        @foreach($komentar as $k)
                        <!-- <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 100px"> -->
                        <div class="card p-3 media-body">
                            <h5 class="mt-0">{{$k->nama}}</h5>
                            <!-- <p class="text-success"><a href="#">Reply</a></p> -->
                            {{$k->komentar}}
                            <small>
                                <p class="text-success">{{$k->updated_at}}</p>
                            </small>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    <form action="{{request()->segment(2)}}/komentar" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <textarea class="form-control komentar" id="komentar" name="komentar" rows="3" placeholder="Komentar anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('iframe').attr('class', 'embed-responsive-item mx-auto d-block');
    $('iframe').attr('width', 1000);
    $('iframe').attr('height', 300);
</script>
<script>
    jQuery(document).ready(function($) {
        $(".btnrating").on('click', (function(e) {

            var previous_value = $("#selected_rating").val();

            var selected_value = $(this).attr("data-attr");
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).toggleClass('btn-warning');
                $("#rating-star-" + i).toggleClass('btn-default');
            }
            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-" + ix).toggleClass('btn-warning');
                $("#rating-star-" + ix).toggleClass('btn-default');
            }

        }));
    });
    /*
        $('.submit').on('click', function() {

            var rating = $('#selected_rating').val();
            $('.selected-rating').attr('value', rating);

        })
    */
</script>
<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{Session::get('success')}}",
            showConfirmButton: false,
            timer: 3500
        });
    }
</script>


@endpush