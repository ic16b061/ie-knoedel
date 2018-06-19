
<!--autor: Kurek -->
<!--Kontaktformular -->

@extends('layout.mainlayout')
@section('content')
        <div class="container bg-light">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <br>
                    <h1>Kontakt mit Knödl </h1>

                    <form id="contact-form" method="post" action="contact-2.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Vorname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control"
                                               placeholder="Bitte Vorname eingeben *" required="required"
                                               data-error="Vorname ist erforderlich.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Nachname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control"
                                               placeholder="Bitte Nachname eingeben *" required="required"
                                               data-error="Nachname ist erforderlich.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Telefonnummer</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control"
                                               placeholder="Bitte Telefonnummer eingeben">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Nachricht *</label>
                                        <textarea id="form_message" name="message" class="form-control"
                                                  placeholder="Nachricht erforderlich *" rows="4" required="required"
                                                  data-error="Hinterlassen Sie uns eine Nachricht."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="Nachricht senden">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong>Diese Felder sind erforderlich</p>
                                </div>
                            </div>
                        </div>

                    </form>

                </div><!-- /.8 -->

            </div> <!-- /.row-->

        </div> <!-- /.container-->

    <script src="contact-2.js"></script>
@endsection
