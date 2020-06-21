@extends('layouts.app')
@section('naslov', 'Lista učenika') 
@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
@endpush
@push('styles')
    <style>
        thead input {
            width: 100%;
            margin-bottom: 3px;
            box-sizing: border-box;
        }
        .nowrap {
            white-space: nowrap
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
                        Lista učenika
                    </div>
                    <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <a href="{{ route('ucenici.create') }}" class="btn btn-outline-primary" tabindex="0">
                                        Unos
                                    </a>
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
                        <input style="display:none" id="nerasporedjeni" value="{{ $nerasporedjeni }}">
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
            table = $('#datatable').DataTable({
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: '/ucenici/tabela',
                    method: 'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (d) {
                        d.nerasporedjeni = $('#nerasporedjeni').val();
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
                    // {
                    //     targets: 6,
                    //     "data": "napomena",
                    //     "render": function(data, type, row, meta) {
                    //         if (data != null) {
                    //             return type === 'display' && data.length > 20 ?
                    //                 '<p data-toggle="tooltip" title="' + data + '">' + data.substr(0,
                    //                     20) + '...</p>' :
                    //                 data;
                    //         } else {
                    //             return data;
                    //         }
                    //     }
                    // },
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
                        text: "Kada se jednom obriše učenik, neće više biti dostupan/na!",
                        icon: "warning",
                        position: 'top',
                        showCancelButton: true,
                        cancelButtonText: 'Odustani',
                        confirmButtonText: 'Obriši'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "DELETE"
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
            
        });
    </script>
@endsection