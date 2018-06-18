
<!-- autor: Kanatschnig -->
<!-- Formular neues Rezept -->

<!-- Titel, Bild, Kategorie, Zutaten, Beschreibung -->

@extends('layout.formlayout')
@section('content')
    <script type='text/javascript'>
        let count = 1;

        function setup(){
            document.getElementById("add_ingredient").addEventListener("click", addIngredient);
            document.getElementById("delete_ingredient1").addEventListener("click", deleteIngredient);
        }

        function addIngredient() {
            count++;

            const container = document.getElementById("container-ingredient");
            const $div = document.createElement('div');

            $div.className = 'form-row align-items-center';

            $div.appendChild(createIngredientElement('ingredient', 'Zutat'));
            $div.appendChild(createIngredientElement('measurement', 'Maßeinheit'));
            $div.appendChild(createIngredientElement('quantity', 'Menge'));
            $div.appendChild(createDeleteButton());

            container.appendChild($div);

            document.getElementById('ingredient_count').value = count;
        }

        function createIngredientElement(type, ph) {
            const div = document.createElement('div');
            const input = document.createElement('input');

            switch (type) {
                case 'ingredient':
                    div.className = 'col-sm-6 mb-2';
                    input.required = true;
                    break;
                case 'measurement':
                case 'quantity':
                    div.className = 'col mb-2';
                    break;
                default:
                    break;
            }

            // Common attributes
            input.type = "text";
            input.className = 'form-control';
            input.id = type + count;
            input.name = type + count;
            input.placeholder = ph;

            div.appendChild(input);

            return div;
        }

        function createDeleteButton() {
            const div = document.createElement('div');
            const button = document.createElement('button');

            div.className = 'mb-2';

            button.className = 'btn btn-danger btn-sm';
            button.type = 'button';
            button.id = "delete_ingredient" + count;
            button.innerText = 'x';
            button.addEventListener("click", deleteIngredient);

            div.appendChild(button);

            return div;
        }

        function deleteIngredient(e) {
            e.target.parentElement.parentElement.remove();
        }

        function createPreview(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_preview')
                        .attr('src', e.target.result);
                    const upload = document.getElementById('file-label');

                    const image = document.getElementById('image').value;
                    const filename = basename(image, '\\');
                    upload.innerText = filename;

                    const button = document.getElementById('image');
                    button.setAttribute('lang','de2');
                };

                reader.readAsDataURL(input.files[0]);
                const div = document.getElementById("image_preview");
                div.classList.remove('heightless');
                div.classList.remove('invisible');
                const div2 = document.getElementById("container-ingredient");
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
                    <input type="file" class="custom-file-input" id="image" name="image" lang="de" accept="image/*" onchange="createPreview(this);" required>
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
                        <button type="button" class="btn btn-danger btn-sm" id="delete_ingredient1">x</button>
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
