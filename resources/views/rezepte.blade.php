@extends('layout.mainlayout')
@section('content')
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <!-- RECIPES -->
                    <!-- loop over the bears and show off some things -->
                    @foreach ($recipes as $recipe)
                        <div class="col-lg-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="@php echo asset("img/$recipe->image") @endphp" alt="{{ $recipe->title }}">
                                <div class="card-header mh-125" >
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
                                        <div class="btn-group">
                                            <a href="rezepte/{{$recipe->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="rezepte/{{$recipe->id}}/bearbeiten" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>

                                        <!--
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <img src="@php //echo asset("storage/dislike.png") @endphp" width="20" alt="dislike" />
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <img src="@php //echo asset("storage/like.png") @endphp" width="20" alt="like" />
                                            </button>
                                        </div>
                                        -->

                                        <form class="star-rating__wrap" method="post" action="/rezepte/{{ $recipe->id }}/rate">
                                            {{ csrf_field() }}
                                            <div class="form-group pt-1">
                                                <input class="star-rating__input" id="star-rating-5-{{ $recipe->id }}" type="submit" name="rating" value="5">
                                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5-{{ $recipe->id }}" title="5 von 5 Sternen"></label>
                                                <input class="star-rating__input" id="star-rating-4-{{ $recipe->id }}" type="submit" name="rating" value="4">
                                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4-{{ $recipe->id }}" title="4 von 5 Sternen"></label>
                                                <input class="star-rating__input" id="star-rating-3-{{ $recipe->id }}" type="submit" name="rating" value="3">
                                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3-{{ $recipe->id }}" title="3 von 5 Sternen"></label>
                                                <input class="star-rating__input" id="star-rating-2-{{ $recipe->id }}" type="submit" name="rating" value="2">
                                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2-{{ $recipe->id }}" title="2 von 5 Sternen"></label>
                                                <input class="star-rating__input" id="star-rating-1-{{ $recipe->id }}" type="submit" name="rating" value="1">
                                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1-{{ $recipe->id }}" title="1 von 5 Sternen"></label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
