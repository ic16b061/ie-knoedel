
<!-- autor: Kanatschnig -->
<!-- Formular neues Rezept -->

<!-- Titel, Bild, Kategorie, Zutaten, Beschreibung -->

@extends('layout.formlayout')
@section('content')
    <script type='text/javascript'>
        let count = 1;

        function setup() {
            toHtmlNumericInput('quantity1');
            document.getElementById("add_ingredient").addEventListener("click", addIngredient);
            document.getElementById("delete_ingredient1").addEventListener("click", deleteIngredient);

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
        // by default, decimal separator is '.', you can force to use comma with the second parameter = true
        function toHtmlNumericInput(inputElementId, useCommaAsDecimalSeparator) {
            let textbox = document.getElementById(inputElementId);
            // called when key is pressed
            // in keydown, we get the keyCode
            // in keyup, we get the input.value (including the charactor we've just typed
            textbox.addEventListener("keydown", function _OnNumericInputKeyDown(e) {
                const key = e.which || e.keyCode; // http://keycode.info/
                if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                    // alphabet
                    key >= 65 && key <= 90 ||
                    // spacebar
                    key == 32) {
                    e.preventDefault();
                    return false;
                }
                if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                    // numbers
                    key >= 48 && key <= 57 ||
                    // Numeric keypad
                    key >= 96 && key <= 105 ||
                    // allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // allow: Ctrl+C
                    (key == 67 && e.ctrlKey === true) ||
                    // Allow: Ctrl+X
                    (key == 88 && e.ctrlKey === true) ||
                    // allow: home, end, left, right
                    (key >= 35 && key <= 39) ||
                    // Backspace and Tab and Enter
                    key == 8 || key == 9 || key == 13 ||
                    // Del and Ins
                    key == 46 || key == 45) {
                    return true;
                }
                let v = this.value; // v can be null, in case textbox is number and does not valid
                // if minus, dash
                if (key == 109 || key == 189) {
                    // if already has -, ignore the new one
                    if (v[0] === '-') {
                        // console.log('return, already has - in the beginning');
                        return false;
                    }
                }
                if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                    // comma, period and numpad.dot
                    key == 190 || key == 188 || key == 110) {
                    // console.log('already having comma, period, dot', key);
                    if (/[\.,]/.test(v)) {
                        // console.log('return, already has , . somewhere');
                        return false;
                    }
                }
            });
            textbox.addEventListener("keyup", function _OnNumericInputKeyUp(e) {
                let v = this.value;
                if (v) {
                    // refine the value

                    // this replace also remove the -, we add it again if needed
                    v = (v[0] === '-' ? '-' : '') +
                        (useCommaAsDecimalSeparator ?
                            v.replace(/[^0-9\,]/g, '') :
                            v.replace(/[^0-9\.]/g, ''));

                    // remove all decimalSeparator that have other decimalSeparator following. After this processing, only the last decimalSeparator is kept.
                    if (useCommaAsDecimalSeparator) {
                        v = v.replace(/,(?=(.*),)+/g, '');
                    } else {
                        v = v.replace(/\.(?=(.*)\.)+/g, '');
                    }
                    //console.log(this.value, v);
                    this.value = v; // update value only if we changed it
                }
            });
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

            toHtmlNumericInput('quantity' + count);
            document.getElementById('ingredient_count').value = count;
        }

        function createIngredientElement(type, ph) {
            const div = document.createElement('div');
            const input = document.createElement('input');
            const div_valid = document.createElement('div');

            // Common attributes
            input.type = "text";
            input.className = 'form-control';
            input.id = type + count;
            input.name = type + count;
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

    <form class="needs-validation justify-content-center align-items-center container" data-toggle="validator" method="post" action="/rezepte" enctype="multipart/form-data" novalidate>

        {{ csrf_field() }}

        <input type="hidden" name="ingredient_count" id="ingredient_count" value="2" \>

        <div class="form-group col-auto">
            <label for="title">Rezept-Titel</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titel" required>
            <div class="valid-feedback">Schaut gut aus!</div>
            <div class="invalid-feedback">Bitte geben Sie einen Titel ein</div>
        </div>


        <div class="form-group form-row col-auto">
            <div class="form-group col-sm-3">
                <label for="category">Kategorie</label>
                <select class="form-control" id="category" name="category">
                    <option>Allgemein</option>
                    <option>Sauer</option>
                    <option>Süß</option>
                </select>
                <div class="valid-feedback">Schaut gut aus!</div>
            </div>
            <div class="col-sm">
                <label class="" for="image">Bild-Upload</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" lang="de" accept="image/*" onchange="createPreview(this);" required>
                    <label class="custom-file-label" for="image" id="file-label">Bild hochladen...</label>
                    <div class="valid-feedback">Schaut gut aus!</div>
                    <div class="invalid-feedback">Bitte wählen Sie ein Bild aus</div>
                </div>
            </div>
        </div>


        <div class="invisible heightless d-flex justify-content-center align-items-center container" id="image_preview">
            <div>
                <div>
                    <label for="img_preview">Vorschau</label>
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
                        <input type="text" class="form-control" id="ingredient1" name="ingredient1" placeholder="Zutat" required>
                        <div class="valid-feedback">Schaut gut aus!</div>
                        <div class="invalid-feedback">Bitte geben Sie eine Zutat ein</div>
                    </div>
                    <div class="col mb-2">
                        <input type="text" class="form-control" id="measurement1" name="measurement1" placeholder="Maßeinheit">
                        <div class="valid-feedback">Schaut gut aus!</div>
                    </div>
                    <div class="col mb-2">
                        <input type="text" class="form-control" id="quantity1" name="quantity1" placeholder="Menge">
                        <div class="valid-feedback">Schaut gut aus!</div>
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
            <div class="valid-feedback">Schaut gut aus!</div>
            <div class="invalid-feedback">Bitte geben Sie eine Beschreibung ein</div>
        </div>

        <br>

        <div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="submit">Knödel es rein!</button>
        </div>


    </form>
@endsection
