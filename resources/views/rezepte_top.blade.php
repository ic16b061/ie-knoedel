@extends('layout.toplayout')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- RECIPES -->
                @foreach ($recipes as $recipe)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="@php echo asset("img/$recipe->image") @endphp" alt="{{ $recipe->title }}">
                            <div class="card-header height85" >
                                <h3 class="jumbotron-heading">{{$recipe->title}}</h3>
                            </div>
                            <div class="card-body height177">
                                <p class="card-text">s
                                    @php
                                        echo mb_substr($recipe->description, 0, 150);
                                    @endphp
                                    ...
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/rezepte/{{$recipe->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="/rezepte/{{$recipe->id}}/bearbeiten" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <span> Rating: {{ $recipe->rating }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
