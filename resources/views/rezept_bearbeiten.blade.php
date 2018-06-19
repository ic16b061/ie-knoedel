
<!-- autor: Kanatschnig -->
<!-- Formular neues Rezept -->

<!-- Titel, Bild, Kategorie, Zutaten, Beschreibung -->

@extends('layout.formlayout')
@section('content')
    <script type='text/javascript'>
        let ingredient_index = 0;
        let ingredient_count = 0;
        let image_orig;

        function setup() {
            let i;
            image_orig = document.getElementById('img_preview').src;
            ingredient_index = document.getElementById('ingredient_index').value;
            ingredient_count = document.getElementById('ingredient_count').value;

            document.getElementById("add_ingredient").addEventListener("click", addIngredient);

            for (i = 1; i <= ingredient_count; i++) {
                toHtmlNumericInput('quantity' + i);
                document.getElementById("delete_ingredient" + i).addEventListener("click", deleteIngredient);
            }

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            const validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }

        // call this function with the id of the input textbox you want to be html-numeric-input
        function toHtmlNumericInput(inputElementId) {
            let textbox = document.getElementById(inputElementId);
            // called when key is pressed
            // in keydown, we get the keyCode
            // in keyup, we get the input.value (including the charactor we've just typed
            textbox.addEventListener("keydown", function _OnNumericInputKeyDown(e) {
                const key = e.which || e.keyCode; // http://keycode.info/
                if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                    // disallowed keys
                    (key >= 59 && key <= 95 || key == 32 || key >= 106 && key <= 109 || key == 111 || key == 160 ||
                        key == 163 || key == 171 || key == 173 || key == 189 || key == 192 || key == 222)) {
                    e.preventDefault();
                    return false;
                }
                if ((e.shiftKey || e.altKey) &&
                    // disallowed keys with shift and alt gr
                    (key >= 48 && key <= 95 ||
                        key >= 106 && key <= 109 || key == 111 || key == 160 || key == 163 || key == 163 ||
                        key == 171 || key == 173 || key == 188 || key == 190 || key == 192 || key == 222)) {
                    e.preventDefault();
                    return false;
                }
                if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                    key >= 48 && key <= 57 || // numbers
                    key >= 96 && key <= 105 || // Numeric keypad
                    // allow: Ctrl+A, Ctrl+C & Ctrl+X
                    (e.keyCode == 65 && e.ctrlKey === true) || (key == 67 && e.ctrlKey === true) || (key == 88 && e.ctrlKey === true) ||
                    // allow: (home, end, left, right) & Backspace and Tab and Enter and Del and Ins
                    (key >= 35 && key <= 39) || key == 8 || key == 9 || key == 13 || key == 46 || key == 45) {
                    return true;
                }
            });
            textbox.addEventListener("keyup", function _OnNumericInputKeyUp(e) {
                let v = this.value;
                if (v) {
                    v = v.replace(/,/g, '.'); // , to .
                    v = v.replace(/\.(?=(.*)\.)+/g, ''); // only allow one .
                    this.value = v; // update value only if we changed it
                }
            });
        }

        function addIngredient() {
            ingredient_index++;
            ingredient_count++;

            const container = document.getElementById("container-ingredient");
            const $div = document.createElement('div');

            $div.className = 'form-row align-items-center';

            $div.appendChild(createIngredientElement('ingredient', 'Zutat'));
            $div.appendChild(createIngredientElement('measurement', 'Maßeinheit'));
            $div.appendChild(createIngredientElement('quantity', 'Menge'));
            $div.appendChild(createDeleteButton());

            container.appendChild($div);

            toHtmlNumericInput('quantity' + ingredient_index);
            document.getElementById('ingredient_index').value = ingredient_index;
            document.getElementById('ingredient_count').value = ingredient_count;
        }

        function createIngredientElement(type, ph) {
            const div = document.createElement('div');
            const input = document.createElement('input');
            const div_valid = document.createElement('div');

            // Common attributes
            input.type = "text";
            input.className = 'form-control';
            input.id = type + ingredient_index;
            input.name = type + ingredient_index;
            input.placeholder = ph;

            div_valid.className = 'valid-feedback'
            div_valid.innerText = 'Schaut gut aus!'

            // Special attributes
            switch (type) {
                case 'ingredient':
                    const div_invalid = document.createElement('div');
                    div_invalid.className = 'invalid-feedback'
                    div_invalid.innerText = 'Bitte geben Sie eine Zutat ein'
                    div.className = 'col-sm-6 mb-2';
                    div.appendChild(div_invalid);
                    input.required = true;
                    break;
                case 'measurement':
                case 'quantity':
                    div.className = 'col mb-2';
                    break;
                default:
                    break;
            }

            div.prepend(div_valid);
            div.prepend(input);

            return div;
        }

        function createDeleteButton() {
            const div = document.createElement('div');
            const button = document.createElement('button');

            div.className = 'mb-2';

            button.className = 'btn btn-danger btn-sm';
            button.type = 'button';
            button.id = "delete_ingredient" + ingredient_index;
            button.innerText = 'x';
            button.addEventListener("click", deleteIngredient);

            div.appendChild(button);

            return div;
        }

        function deleteIngredient(e) {
            document.getElementById('ingredient_count').value = --ingredient_count;
            e.target.parentElement.parentElement.remove();
        }

        function createPreview(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_preview')
                        .attr('src', e.target.result);

                    const filename = basename(document.getElementById('image').value, '\\');
                    document.getElementById('file-label').innerText = filename;
                    document.getElementById('img_preview_text').innerText = "Neues Bild";
                };

                reader.readAsDataURL(input.files[0]);

                const div_button = document.createElement('div');
                const button = document.createElement('button');

                div_button.className = 'ml-2';
                div_button.id = 'reset_button';

                button.className = 'btn btn-danger btn-sm';
                button.type = 'button';
                button.id = "reset_image";
                button.innerText = 'Zurücksetzen';
                button.addEventListener("click", resetImage);

                div_button.appendChild(button);
                document.getElementById('image_preview').appendChild(div_button);
            }
        }

        function resetImage() {
            document.getElementById('img_preview').src = image_orig;
            document.getElementById('img_preview_text').innerText = 'Aktuelles Bild';
            document.getElementById('file-label').innerText = 'Neues Bild hochladen...';
            document.getElementById('image').value = '';
            document.getElementById('image_preview').removeChild(document.getElementById('reset_button'));
        }

        function basename(str, sep) {
            return str.substr(str.lastIndexOf(sep) + 1);
        }

        window.addEventListener("load", setup);
    </script>


    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Rezept bearbeiten</h1>
            <p class="lead text-muted">Haben Sie ein Fehler im Rezept gefunden?<br>Oder haben Sie hilfreiche Verbesserungsvorschläge?<br>Machen Sie unsere Rezepte einfach noch leckerer!</p>
        </div>
    </section>

    <div class="justify-content-center align-items-center container py-5 bg-light">
        <form class="needs-validation" method="post" action="/rezepte/{{ $recipe->id }}" enctype="multipart/form-data" novalidate>

            {{ csrf_field() }}

            <input type="hidden" name="ingredient_index" id="ingredient_index" value="{{ $recipe->ingredient_count }}" \>
            <input type="hidden" name="ingredient_count" id="ingredient_count" value="{{ $recipe->ingredient_count }}" \>

            <div class="form-group col-auto">
                <label for="title">Rezept-Titel</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titel" value="{{ $recipe->title }}" required>
                <div class="valid-feedback">Schaut gut aus!</div>
                <div class="invalid-feedback">Bitte geben Sie einen Titel ein</div>
            </div>


            <div class="form-group form-row col-auto">
                <div class="form-group col-sm-3">
                    <label for="category">Kategorie</label>
                    <select class="form-control" id="category" name="category" value="{{ $recipe->category }}">
                        <option {{ $recipe->category == 'Allgemein' ? 'selected=selected' : '' }}>Allgemein</option>
                        <option {{ $recipe->category == 'Sauer' ? 'selected=selected' : '' }}>Sauer</option>
                        <option {{ $recipe->category == 'Süß' ? 'selected=selected' : '' }}>Süß</option>
                    </select>
                    <div class="valid-feedback">Schaut gut aus!</div>
                </div>
                <div class="col-sm">
                    <label class="" for="image">Bild-Upload</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" lang="de2" accept="image/*"
                               onchange="createPreview(this);">
                        <label class="custom-file-label" for="image" id="file-label">Neues Bild hochladen...</label>
                        <div class="valid-feedback">Schaut gut aus!</div>
                        <div class="invalid-feedback">Bitte wählen Sie ein Bild aus</div>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center align-items-end container"
                 id="image_preview">
                <div>
                    <div>
                        <label for="img_preview" id="img_preview_text">Aktuelles Bild</label>
                    </div>
                    <div>
                        <img class="img-fluid " id="img_preview" src="/img/{{ $recipe->image }}" alt="Rezeptbild"/>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group col-auto">
                <div id="container-ingredient">
                    <label for="ingredient">Zutaten</label>
                    @foreach ($ingredients as $ingredient)
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 mb-2">
                            <input type="text" class="form-control" id="ingredient{{ $loop->iteration }}"
                                   name="ingredient{{ $loop->iteration }}"  placeholder="Zutat"
                                   value="{{ $ingredient->ingredient_name }}" required>
                            <div class="valid-feedback">Schaut gut aus!</div>
                            <div class="invalid-feedback">Bitte geben Sie eine Zutat ein</div>
                        </div>
                        <div class="col mb-2">
                            <input type="text" class="form-control" id="measurement{{ $loop->iteration }}"
                                   name="measurement{{ $loop->iteration }}" placeholder="Maßeinheit"
                                   value="{{ $ingredient->measurement }}">
                            <div class="valid-feedback">Schaut gut aus!</div>
                        </div>
                        <div class="col mb-2">
                            <input type="text" class="form-control" id="quantity{{ $loop->iteration }}"
                                   name="quantity{{ $loop->iteration }}" placeholder="Menge"
                                   value="{{ $ingredient->quantity }}">
                            <div class="valid-feedback">Schaut gut aus!</div>
                        </div>
                        <div class="mb-2">
                            <button type="button" class="btn btn-danger btn-sm" id="delete_ingredient{{ $loop->iteration }}">x</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div>
                    <button type="button" class="btn btn-success btn-sm" id="add_ingredient">+</button>
                </div>
            </div>


            <div class="form-group col-auto">
                <label for="description">Beschreibung</label>
                <textarea class="form-control" id="description" name="description" placeholder="Beschreibung" rows="10"
                          required>{{ $recipe->description }}</textarea>
                <div class="valid-feedback">Schaut gut aus!</div>
                <div class="invalid-feedback">Bitte geben Sie eine Beschreibung ein</div>
            </div>

            <br>

            <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" id="submit">Knödel es rein!</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="text-muted"><strong>*</strong>Diese Felder sind erforderlich</p>
                </div>
            </div>


        </form>
    </div>
@endsection
