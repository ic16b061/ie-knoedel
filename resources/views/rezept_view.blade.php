<!-- autor: de Castro -->
<!-- Formular Rezept Ansicht -->

@extends('layout.formlayout')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Rezept detailansicht</h1>
            <p class="lead text-muted">Ein äußerst leckeres Rezept haben Sie sich hier ausgesucht!</p>
        </div>
    </section>
    <div class="justify-content-center align-items-center container py-5 bg-light">
        <div class="row">
            <div class="col-8 col-md-8 col-sm-12">
                <div class="d-flex justify-content-center align-items-end container" id="image_preview">
                    <img class="img-fluid " id="img_preview" src="/img/{{ $recipe->image }}" alt="Rezeptbild"/>
                </div>
                <h1 class="text-md-center">{{ $recipe->title }}</h1>
                <h3 class="text-muted text-md-center">Kategorie {{$recipe->category}}</h3>

                <h3>Zubereitung:</h3>
                <p>{{ $recipe->description }}</p>

                <div class="btn-group">
                    <a href="{{$recipe->id}}/bearbeiten" type="button" class="btn btn-sm btn-outline-secondary">Rezept Bearbeiten</a>
                </div>
            </div>

            <div class="col-4 col-md-4 col-sm-12">
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
        </div>
    </div>
@endsection
