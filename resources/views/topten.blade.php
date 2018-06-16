@extends('layout.toptenlayout')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- RECIPES -->
                @foreach ($recipes as $recipe)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="@php echo asset("storage/$recipe->image") @endphp" alt="{{ $recipe->title }}">
                            <div class="card-header" >
                                <h3 class="jumbotron-heading">{{$recipe->title}}</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    @php
                                        echo mb_substr($recipe->description, 0, 150);
                                    @endphp
                                    ...
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <p class=""> Rating: {{ $recipe->rating }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
