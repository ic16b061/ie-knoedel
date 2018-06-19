
<!--autor: Kurek -->
<!--Kontaktformular -->

@extends('layout.mainlayout')
@section('content')
        <div class="container bg-light">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <br>
                    <h1>Kontakt mit Knödl </h1>

                    <form class="needs-validation" id="contact-form" method="post" action="/kontakt" role="form" novalidate>
                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Vorname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control"
                                               placeholder="Bitte Vorname eingeben" required>
                                        <div class="valid-feedback">Schaut gut aus!</div>
                                        <div class="invalid-feedback">Bitte geben Sie einen Vornamen ein</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Nachname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control"
                                               placeholder="Bitte Nachname eingeben *" required>
                                        <div class="valid-feedback">Schaut gut aus!</div>
                                        <div class="invalid-feedback">Bitte geben Sie einen Nachnamen ein</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Telefonnummer</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control"
                                               placeholder="Bitte Telefonnummer eingeben">
                                        <div class="valid-feedback">Schaut gut aus!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Nachricht *</label>
                                        <textarea id="form_message" name="message" class="form-control"
                                                  placeholder="Nachricht erforderlich *" rows="4" required></textarea>
                                        <div class="valid-feedback">Schaut gut aus!</div>
                                        <div class="invalid-feedback">Bitte geben Sie eine Nachricht ein</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <script>

                                    function sendmail() {
                                        var message = document.getElementById("form_message").value;
                                        var subject = document.getElementById("form_name").value + ' ' + document.getElementById("form_lastname").value;

                                        window.location.href = "mailto:mail@knoedel.org?subject=Kontaktanfrage von: "+subject+"&body="+message;
                                    }

                                    </script>
                                    <button type="button" class="btn btn-primary" onclick="sendmail()">Senden</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong>Diese Felder sind erforderlich</p>
                                </div>
                            </div>
                        </div>

                    </form>

                </div><!-- /.8 -->

            </div> <!-- /.row-->

        </div> <!-- /.container-->

@endsection
