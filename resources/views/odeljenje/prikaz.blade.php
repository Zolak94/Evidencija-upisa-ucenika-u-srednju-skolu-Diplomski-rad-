@extends('layouts.app')
@section('naslov', 'Prikaz odeljenja')
@push('scripts')
@endpush
@push('styles')
<style>

</style>
@endpush

@section('content')

<div class="container">
    <div class="flex-center position-ref">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Prikaz odeljenja
                    </div>
                    <div class="card-body">
                        <div class="offset-md-3 col-md-6">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><span class="spanInput"><span class="spanInput">Naziv</span></td>
                                        <td colspan="2">{{ $odeljenje->naziv}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput"><span class="spanInput">Smer</span></td>
                                        <td colspan="2"> {{ $odeljenje->smer->naziv}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput">Starešina</span></td>
                                        <td colspan="2">{{ $odeljenje->staresina->ime_prezime }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput">Broj učenika</span></td>
                                        <td colspan="2">{{ $odeljenje->broj_ucenika }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row footer-tabs">
                            <div class="col-md-12 text-md-center">
                                <a href="{{ route('odeljenja.edit', $id) }}" class="btn btn-primary"
                                    role="button">Izmeni</a>
                                <a href="javascript:history.back()" class="btn btn-outline-secondary">Nazad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content_scripts')

@endsection