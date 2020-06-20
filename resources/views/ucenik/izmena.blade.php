@extends('layouts.app')
@section('naslov', 'Prijava za kamp')
@section('content')

<div class="container">

    <div class="flex-center position-ref">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Unos učenika
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ucenici.update', $id) }}" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Ime i prezime*</label>
                                    <input type="text" class="form-control" name="ime_prezime" value="{{ old('ime_prezime', $ucenik->ime_prezime)}}"
                                        onKeyDown="$('#ime_prezime_error').hide()">
                                    @error('ime_prezime')
                                        <span class="help-block" style="color:red;" id="ime_prezime_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Datum rođenja*</label>
                                    <input class="flatpickr form-control input active" type="text" id="datum_rodjenja"
                                        name="datum_rodjenja" value="{{ old('datum_rodjenja', $ucenik->datum_rodjenja)}}"
                                        onKeyDown="$('#datum_rodjenja_error').hide()">
                                    @error('datum_rodjenja')
                                        <span class="help-block" style="color:red;" id="datum_rodjenja_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Pol*</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pol" value="1" checked>
                                        <label class="form-check-label">Muški</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pol" value="2" @if(old('pol', $ucenik->pol) == 2) checked @endif>
                                        <label class="form-check-label">Ženski</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>JMBG*</label>
                                    <input type="number" class="form-control" name="jmbg" value="{{ old('jmbg', $ucenik->jmbg)}}"
                                        onKeyDown="$('#jmbg_error').hide()">
                                    @error('jmbg')
                                        <span class="help-block" style="color:red;" id="jmbg_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Broj bodova*</label>
                                    <input type="number" class="form-control" name="broj_bodova" value="{{ old('broj_bodova', $ucenik->broj_bodova)}}"
                                        onKeyDown="$('#broj_bodova_error').hide()">
                                    @error('broj_bodova')
                                        <span class="help-block" style="color:red;" id="broj_bodova_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Pošalji</button>
                                    <a href="javascript:history.back()" class="btn btn-outline-secondary">Nazad</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content_scripts')
<script>
    var datum_od = flatpickr("#datum_rodjenja", {
        allowInput: true,
        locale: "sr",
        dateFormat: 'd.m.Y.'
    });
    $(document).ready(function() {
        $('.combobox').select2({
            theme: 'bootstrap4',
            language: 'sr',
        });
        $('#datum_rodjenja').on('change', function() {
            $('#datum_rodjenja_error').hide();
        })
    });
</script>
@endsection