@extends('layouts.app')
@section('naslov', 'Prikaz učenika')
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
                        Prikaz učenika
                    </div>
                    <div class="card-body">
                        <div class="offset-md-3 col-md-6">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><span class="spanInput"><span class="spanInput">Ime i
                                                    prezime</span></td>
                                        <td colspan="2">{{ $ucenik->ime_prezime}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput"><span class="spanInput">Datum
                                                    rođenja</span></td>
                                        <td colspan="2">
                                            {{ \Carbon\Carbon::parse($ucenik->datum_rodjenja)->format('d.m.Y.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput"><span class="spanInput">Pol</span>
                                        </td>
                                        <td colspan="2">
                                            @if($ucenik->pol==1)
                                            <span>Muški</span>
                                            @else
                                            <span>Ženski</span>
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput">JMBG</span></td>
                                        <td colspan="2">{{ $ucenik->jmbg }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="spanInput">Broj bodova</span></td>
                                        <td colspan="2">{{ $ucenik->broj_bodova }}</td>
                                    </tr>
                                    @if ($ucenik->odeljenje_id == null)
                                        <tr>
                                            <td colspan="2"><span class="spanInput">Željeni smer</span></td>
                                            <td colspan="2">{{ $ucenik->smer->naziv }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="2"><span class="spanInput">Odeljenje</span></td>
                                            <td colspan="2">{{ $ucenik->odeljenje->naziv }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row footer-tabs">
                            <div class="col-md-12 text-md-center">
                                <a href="{{ route('ucenici.edit', $id) }}" class="btn btn-primary"
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