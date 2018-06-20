<!-- autor: de Castro -->
<!-- Formular Rezept Ansicht -->

@extends('layout.formlayout')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Rezept Detailansicht</h1>
            <p class="lead text-muted">Ein äußerst leckeres Rezept haben Sie sich hier ausgesucht!</p>
        </div>
    </section>
    <div class="justify-content-center align-items-center container py-5 bg-light">
        <div class="row">
            <div class="col-11 col-md-8 col-sm-12">
                <div class="d-flex justify-content-center align-items-end container" id="image_preview">
                    <img class="img-fluid " id="img_preview" src="/img/{{ $recipe->image }}" alt="Rezeptbild"/>
                </div>
                <h1 class="text-md-center mt-2">{{ $recipe->title }}</h1>
                <h3 class="text-muted text-md-center">Kategorie {{$recipe->category}}</h3>

                <h3>Zubereitung:</h3>
                <p>{{ $recipe->description }}</p>
            </div>

            <div class="col-11 col-md-4 col-sm-12">
                <h3>Zutaten:</h3>
                <table class="table table-striped table-bordered">
                    <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->ingredient_name}}</td>
                            <td class="text-right">{{$ingredient->quantity}}</td>
                            <td>{{$ingredient->measurement}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-md-12 col-sm-12 col-lg-12">
                <div class="row d-flex justify-content-between container">
                    <div> Rating: {{ $recipe->rating }}</div>
                    <form class="starform star-rating__wrap">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $recipe->id }}" ;>
                        <div class="form-group pt-1">
                            <input class="star-rating__input" id="star-rating-5"
                                   type="radio" name="rating" value="5">
                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                   for="star-rating-5"
                                   title="5 von 5 Sternen"></label>
                            <input class="star-rating__input" id="star-rating-4"
                                   type="radio" name="rating" value="4">
                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                   for="star-rating-4"
                                   title="4 von 5 Sternen"></label>
                            <input class="star-rating__input" id="star-rating-3"
                                   type="radio" name="rating" value="3">
                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                   for="star-rating-3"
                                   title="3 von 5 Sternen"></label>
                            <input class="star-rating__input" id="star-rating-2"
                                   type="radio" name="rating" value="2">
                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                   for="star-rating-2"
                                   title="2 von 5 Sternen"></label>
                            <input class="star-rating__input" id="star-rating-1"
                                   type="radio" name="rating" value="1">
                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                   for="star-rating-1"
                                   title="1 von 5 Sternen"></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center col-12 col-md-12 col-sm-12 col-lg-12 mt-4">
                <div class="btn-group">
                    <a href="{{$recipe->id}}/bearbeiten" type="button" class="btn btn-sm btn-outline-secondary">Rezept Bearbeiten</a>
                </div>
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
