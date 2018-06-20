@extends('layout.mainlayout')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- RECIPES -->
                <!-- loop over the bears and show off some things -->
                @foreach ($recipes as $recipe)
                    <div class="col-lg-4">
                        <a href="/rezepte/{{$recipe->id}}" class="recipe-link">
                        <div class="card mb-4 box-shadow">
                           @php
                                $img = Image::make("img/$recipe->image");
                                $img->fit(348, 268);
                                $img->encode('jpg', 85);
                                $type = 'jpg';
                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
                            @endphp
                            <img class="card-img-top" src="{!! $base64 !!}" alt="{{ $recipe->title }}">
                            <div class="card-header mh-125">
                                <h3 class="jumbotron-heading">{{ $recipe->title }}</h3>
                            </div>
                            <div class="card-body mh-177">
                                <p class="card-text">
                                    @php
                                        echo mb_substr($recipe->description, 0, 150);
                                    @endphp
                                    ...
                                </p>
                                <div class="d-flex justify-content-between align-content-sm-start">
                                    <div>Bewertung: {{ $recipe->rating }}</div>

                                    <form class="starform star-rating__wrap">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $recipe->id }}";>
                                        <div class="form-group pt-1">
                                            <input class="star-rating__input" id="star-rating-5-{{ $recipe->id }}"
                                                   type="radio" name="rating" value="5">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-5-{{ $recipe->id }}"
                                                   title="5 von 5 Sternen"></label>
                                            <input class="star-rating__input" id="star-rating-4-{{ $recipe->id }}"
                                                   type="radio" name="rating" value="4">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-4-{{ $recipe->id }}"
                                                   title="4 von 5 Sternen"></label>
                                            <input class="star-rating__input" id="star-rating-3-{{ $recipe->id }}"
                                                   type="radio" name="rating" value="3">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-3-{{ $recipe->id }}"
                                                   title="3 von 5 Sternen"></label>
                                            <input class="star-rating__input" id="star-rating-2-{{ $recipe->id }}"
                                                   type="radio" name="rating" value="2">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-2-{{ $recipe->id }}"
                                                   title="2 von 5 Sternen"></label>
                                            <input class="star-rating__input" id="star-rating-1-{{ $recipe->id }}"
                                                   type="radio" name="rating" value="1">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-1-{{ $recipe->id }}"
                                                   title="1 von 5 Sternen"></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.star-rating__input').change(function (e) {
                e.preventDefault()  // prevent the form from 'submitting'

                let url = '/rezepte/rate'; // get the target
                let input = $(e.target);
                let result = input.parents('form').serialize();

                $.post(url, result, function (response) { // send; response.data will be what is returned
                    alert(response)
                });
            });
        });
    </script>
@endsection
