@extends('layouts.app')
@section('naslov', 'Izmena odeljenja')
@section('content')

<div class="container">

    <div class="flex-center position-ref">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Izmena odeljenja
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('odeljenja.update', $id) }}" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Naziv*</label>
                                    <input type="text" class="form-control" name="naziv" value="{{ old('naziv', $odeljenje->naziv)}}"
                                        onKeyDown="$('#naziv_error').hide()">
                                    @error('naziv')
                                        <span class="help-block" style="color:red;" id="naziv_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Smer*</label>
                                    <select name="smer_id" id="smer_id" class="combobox form-control"
                                        data-placeholder="Izaberite smer">
                                        <option disabled hidden selected></option>
                                        @foreach ($smerovi as $smer)
                                            <option value="{{$smer->id}}" @if(old('smer_id', $odeljenje->smer_id) == $smer->id) selected="selected" @endif>{{$smer->naziv}}</option>
                                        @endforeach
                                    </select>
                                    @error('smer_id')
                                        <span class="help-block" style="color:red;" id="smer_id_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Starešina*</label>
                                    <select name="staresina_id" id="staresina_id" class="combobox form-control"
                                        data-placeholder="Izaberite starešinu">
                                        <option disabled hidden selected></option>
                                        @foreach ($staresine as $staresina)
                                        <option value="{{$staresina->id}}" @if(old('staresina_id', $odeljenje->staresina_id) == $staresina->id) selected="selected"  @endif >{{$staresina->ime_prezime}}</option>
                                        @endforeach
                                    </select>
                                    @error('staresina_id')
                                        <span class="help-block" style="color:red;" id="staresina_id_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3 col-md-6">
                                    <label>Broj učenika*</label>
                                    <input type="number" class="form-control" name="broj_ucenika" value="{{ old('broj_ucenika', $odeljenje->broj_ucenika)}}"
                                        onKeyDown="$('#broj_ucenika_error').hide()">
                                    @error('broj_ucenika')
                                        <span class="help-block" style="color:red;" id="broj_ucenika_error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-3">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 15px">Izmeni</button>
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
    $(document).ready(function() {
        $('.combobox').select2({
            theme: 'bootstrap4',
            language: 'sr',
        });
        $('#smer_id').on('change', function() {
            $('#smer_id_error').hide();
        })
        $('#staresina_id').on('change', function() {
            $('#staresina_id_error').hide();
        })
    });
</script>
@endsection