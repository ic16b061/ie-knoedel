
<!-- autor: Kanatschnig -->
<!-- Formular neues Rezept -->

<!-- Titel, Bild, Kategorie, Zutaten, Beschreibung -->

@extends('layout.formlayout')
@section('content')
    <script type='text/javascript'>
        var count = 2;

        function setup(){
            document.getElementById("add_ingredient").addEventListener("click", addIngredient);
            document.getElementById("delete_ingredient").addEventListener("click", deleteIngredient);
        }

        function addIngredient() {
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container-ingredient");

            var div_row = document.createElement('div');
            div_row.className = 'form-row align-items-center';

            var div_ingredient = document.createElement('div');
            div_ingredient.className = 'col-sm-6 mb-2';
            var input_ingredient = document.createElement('input');
            input_ingredient.className = 'form-control';
            input_ingredient.required = true;
            input_ingredient.type = "text";
            input_ingredient.id = 'ingredient' + count;
            input_ingredient.name = 'ingredient' + count;
            input_ingredient.placeholder = 'Zutat';
            div_ingredient.appendChild(input_ingredient);

            var div_measurement = document.createElement('div');
            div_measurement.className = 'col mb-2';
            var input_measurement = document.createElement('input');
            input_measurement.className = 'form-control';
            input_measurement.type = 'text';
            input_measurement.id = "measurement" + count;
            input_measurement.name = "measurement" + count;
            input_measurement.placeholder = 'Maßeinheit';

            var div_quantity = document.createElement('div');
            div_quantity.className = 'col mb-2';
            var input_quantity = document.createElement('input');
            input_quantity.className = 'form-control';
            input_quantity.type = 'text';
            input_quantity.id = "quantity" + count;
            input_quantity.name = "quantity" + count;
            input_quantity.placeholder = 'Menge';

            var div_delete = document.createElement('div');
            div_delete.className = 'mb-2';
            var button_delete = document.createElement('button');
            button_delete.className = 'btn btn-danger btn-sm';
            button_delete.type = 'button';
            button_delete.id = "delete_ingredient" + count;
            button_delete.innerText = 'x';
            button_delete.addEventListener("click", deleteIngredient);

            container.appendChild(div_row);
            div_row.appendChild(div_ingredient);
            div_row.appendChild(div_measurement);
            div_row.appendChild(div_quantity);
            div_row.appendChild(div_delete);
            div_measurement.appendChild(input_measurement);
            div_quantity.appendChild(input_quantity);
            div_delete.appendChild(button_delete);

            count++;
            document.getElementById('ingredient_count').value = count;
        }

        function deleteIngredient(e) {
            e.target.parentElement.parentElement.remove();
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_preview')
                        .attr('src', e.target.result);
                    let upload = document.getElementById('file-label');

                    let image = document.getElementById('image').value;
                    let filename = basename(image, '\\');
                    upload.innerText = filename;

                    let button = document.getElementById('image');
                    button.setAttribute('lang','de2');
                };

                reader.readAsDataURL(input.files[0]);
                var div = document.getElementById("image_preview");
                div.classList.remove('heightless');
                div.classList.remove('invisible');
                var div2 = document.getElementById("container-ingredient");
                div2.prepend(document.createElement("br"));
            }
        }

        function basename(str, sep) {
            return str.substr(str.lastIndexOf(sep) + 1);
        }

        window.addEventListener("load", setup);
    </script>


    <section class="jumbotron text-center recipe-header">
        <div class="container">
            <h1 class="jumbotron-heading">Rezept hinzufügen</h1>
            <p class="lead text-muted">Erweitern Sie unsere Knödel-Rezepte um ein neues leckeres Gericht!</p>
        </div>
    </section>

    <form class="justify-content-center align-items-center container" method="post" action="/rezepte" enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="hidden" name="ingredient_count" id="ingredient_count" value="2" \>

        <div class="form-group col-auto">
            <label for="title">Rezept-Titel</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titel" required>
        </div>


        <div class="form-group form-row col-auto">
            <div class="form-group col-sm-3">
                <label for="category">Kategorie</label>
                <select class="form-control" id="category" name="category">
                    <option>Allgemein</option>
                    <option>Sauer</option>
                    <option>Süß</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="" for="image">Bild-Upload</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" lang="de" accept="image/*" onchange="readURL(this);" required>
                    <label class="custom-file-label" for="image" id="file-label">Bild hochladen...</label>
                    <div class="invalid-feedback">Bitte wählen Sie ein Bild aus</div>
                </div>
            </div>
        </div>


        <div class="invisible heightless d-flex justify-content-center align-items-center container" id="image_preview">
            <div>
                <div>
                    <label for="img_preview">Vorschaubild</label>
                </div>
                <div>
                    <img class="img-fluid " id="img_preview" src="" alt="Rezeptbild"/>
                </div>
            </div>
        </div>

        <br>

        <div class="form-group col-auto">
            <div id="container-ingredient">
                <label for="ingredient">Zutaten</label>
                <div class="form-row align-items-center">
                    <div class="col-sm-6 mb-2">
                        <input type="text" class="form-control" id="ingredient" name="ingredient1" placeholder="Zutat" required>
                    </div>
                    <div class="col mb-2">
                        <input type="text" class="form-control" id="measurement" name="measurement1" placeholder="Maßeinheit">
                    </div>
                    <div class="col mb-2">
                        <input type="text" class="form-control" id="quantity" name="quantity1" placeholder="Menge">
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-danger btn-sm" id="delete_ingredient">x</button>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-success btn-sm" id="add_ingredient">+</button>
            </div>
        </div>



        <div class="form-group col-auto">
            <label for="description">Beschreibung</label>
            <textarea class="form-control" id="description" name="description" placeholder="Beschreibung" rows="10" required></textarea>
        </div>

        <br>

        <div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="submit">Knödel es rein!</button>
        </div>


    </form>
@endsection
