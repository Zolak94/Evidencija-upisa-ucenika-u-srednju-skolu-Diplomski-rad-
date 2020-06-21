@extends('layouts.app')
@section('naslov', 'Prikaz odeljenja')
@push('scripts')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css" />
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>
@endpush
@push('styles')
<style>
    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        width: 100% !important;
    }
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
                                        <td colspan="2">{{ $odeljenje->ucenici->count() }} / {{ $odeljenje->broj_ucenika }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="row justify-content-between">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ucenikModal">
                                    Unos učenika
                                </button>
                            </div>
                            <div style="margin-right: 15px">
                                <button id="excel_btn" class="btn btn-outline-success buttons-html5" tabindex="0" aria-controls="datatable" type="button">
                                    <span>Excel</span>
                                </button>
                                <button id="pdf_btn" class="btn btn-outline-danger buttons-html5" tabindex="0" aria-controls="datatable" type="button">
                                    <span>PDF</span>
                                </button>
                            </div>
                        </div>
                        <br>
                        <table id="datatable" class="table teable-stripe table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Ime i prezime</th>
                                    <th>Datum rođenja</th>
                                    <th>Pol</th>
                                    <th>Broj bodova</th>
                                    <th>Odeljenje</th>
                                    <th nowrap>Akcija</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal fade" id="ucenikModal" tabindex="-1" role="dialog" aria-labelledby="ucenikModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ucenikModalLabel">Unos učenika</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" id="modal_form_id" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <label class="col-form-label">Učenik:</label>
                                            <select class="combobox" data-placeholder="Izaberite učenika"
                                                name="ucenik_id" id="ucenik_id">
                                                <option hidden></option>
                                                @foreach($ucenici as $ucenik)
                                                    <option value="{{ $ucenik->id }}" class='ucenik'>{{$ucenik->ime_prezime}}(Bodovi: {{ $ucenik->broj_bodova }})</option>
                                                @endforeach
                                            </select>
                                            <span style="display:none; color:red" id="error_ucenik_id"
                                                    class="help-block"></span>
                                          </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                    <button type="button" id="submitUcenika" data-token="{{ csrf_token() }}" class="btn btn-primary">Unesi</button>
                                </div>
                            </div>
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
    <script>
        var table;
        $(document).ready(function() {
            $('.combobox').select2({
                theme: 'bootstrap4',
                language: 'sr',
            });
            table = $('#datatable').DataTable({
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: '/odeljenja/ucenici/tabela',
                    method: 'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (d) {
                        d.id = @json($id);
                    },
                },
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Sve"]
                ],
                dom:"<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [{
                        extend: 'excelHtml5',
                        className: 'excelButton',
                        text: 'Excel',
                        attr:  {
                            id: 'excel_hidden_btn'
                        },
                        exportOptions: {
                            orthogonal: 'export',
                            columns: [0, 1, 2, 3, 4],
                            modifier: {
                                search: 'applied',
                                order: 'applied'
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        text: 'PDF',
                        attr:  {
                            id: 'pdf_hidden_btn'
                        },
                        exportOptions: {
                            orthogonal: 'export',
                            columns: [0, 1, 2, 3, 4],
                            modifier: {
                                search: 'applied',
                                order: 'applied'
                            }
                        },
                        customize: function (doc) {
                            doc.content[1].table.widths = [ '20%',  '20%', '20%',  '20%', '20%'];
                            var rowCount = doc.content[1].table.body.length;
                            var columnCount = doc.content[1].table.body[0].length;
                            for (i = 0; i < columnCount; i++) {
                                doc.content[1].table.body[0][i].alignment = 'left';
                            }
                        }
                    }
                ],
                columnDefs: [
                    {
                        targets: [1],
                        render:
                            function( data, type, row, meta) {
                                var ThisDate;
                                if (data) {
                                    ThisDate = moment(new Date(data)).format("DD.MM.YYYY.");
                                } else {
                                    ThisDate = "";
                                }
                                return ThisDate;
                            }
                    },
                    {
                        targets: [5],
                        className: 'nowrap'
                    }
                ],
                "columns": [
                    {
                        data: 'ime_prezime',
                        name: 'ime_prezime'
                    },
                    {
                        data: 'datum_rodjenja',
                        name: 'datum_rodjenja'
                    },
                    {
                        data: 'pol',
                        name: 'pol'
                    },
                    {
                        data: 'broj_bodova',
                        name: 'broj_bodova'
                    },
                    {
                        data: 'naziv',
                        name: 'odeljenja.naziv',
                    },
                    {
                        data: 'akcija',
                        name: 'akcija'
                    },
                ],
                "initComplete": function( settings, json ) {
                    // hideLoader();
                },
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Serbian.json" 
                }
            });

            $('#datatable').on('draw.dt', function() {
                $('[data-toggle="tooltip"]').tooltip();

                $('#excel_btn').on('click', function() {
                    table.button('#excel_hidden_btn').trigger();
                });
                $('#pdf_btn').on('click', function() {
                    table.button('#pdf_hidden_btn').trigger();
                });
                
                $('.btn-obrisi').on('click', function() {
                    var url = $(this).data('url');
                    Swal.fire({
                        title: "Da li ste sigurni?",
                        icon: "warning",
                        position: 'top',
                        showCancelButton: true,
                        cancelButtonText: 'Odustani',
                        confirmButtonText: 'Ukloni'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "PATCH"
                                },
                                success: function (response) {
                                    $("#message").load(location.href + " #message>*", "");
                                    table.draw();
                                }
                            });
                        }
                    });
                });
            });
            $('#ucenik_id').on('change', function() {
                $('#error_ucenik_id').hide();
            })
            $('#submitUcenika').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/odeljenje/ucenici/unos',
                    method: 'POST',
                    data: {
                        _token: $(this).data('token'),
                        id: @json($id),
                        ucenik_id: $('#ucenik_id').val(),
                    },
                    success: function(data) {
                        if (data.errors) {
                            if (data.errors.ucenik_id) {
                                $('#error_ucenik_id').show();
                                $('#error_ucenik_id').html(data.errors.ucenik_id[0]);
                            }
                        } else {
                            $('#open').hide();
                            $('#ucenikModal').modal('hide');
                            $('#ucenik_id').find('[value="' + $('#ucenik_id').val() + '"]').remove();
                            $('#ucenik_id').val("").trigger('change');
                            $('#error_ucenik_id').hide();
                            $("#message").load(location.href + " #message>*", "");
                            table.ajax.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection