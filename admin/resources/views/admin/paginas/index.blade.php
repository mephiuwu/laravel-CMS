@extends('layouts.admin')

@section('title')
 Paginas editables   
@endsection


@section('content')




<div class="flex flex-row w-full text-lg justify-between " style="height: 40px">
    <a href="{{route('paginas.create')}}">
        <x-button id="btn-image"
            class="btn-aeurus bg-blue-500 w-100 ml-3 mt-2 absolute px-4 p-3 rounded-lg text-white font-sans font-bold float-left">
            Crear Pagina
        </x-button>
    </a>

    <div id="reportrange" class="relative text-right flex justify-end items-center bg-white rounded-lg  "
        style="cursor: pointer; width: 200px;">
        <i class="fa fa-calendar"></i>&nbsp;
        <span class="text-black"></span> <i class="fa fa-caret-down"></i>
    </div>
</div>

<div class="relative  flex flex-col min-w-0 break-words w-full mb-6 mt-4 shadow-lg rounded  bg-white"  style="min-height:70vh ">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700">
                    Paginas Administrables
                </h3>
            </div>
        </div>
    </div>
    <div class="block w-full p-4  overflow-x-auto">
        <!-- Projects table -->
        <table class="cell-border " style="width:100%" id="table-usuarios">
            <thead>
                <tr>
                    <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                        Nombre
                    </th>
                    <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                        Estado
                    </th>
                    <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>
</div>
<footer class="block py-4">
    <div class="container mx-auto px-4">
        <hr class="mb-4 border-b-1 border-blueGray-200" />
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4">
                <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
                    Aeurus © <span id="get-current-year"></span>

                </div>
            </div>
            <div class="w-full md:w-8/12 px-4">
                <ul class="flex flex-wrap list-none md:justify-end justify-center">
                    <li>
                        <a href="https://www.creative-tim.com?ref=njs-settings"
                            class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/presentation?ref=njs-settings"
                            class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com?ref=njs-settings"
                            class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-settings"
                            class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                            MIT License
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>




@endsection

@section('scripts')

@if($errors->any())
<script>
    var message = @json($errors->first());
        console.log(message);

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: message
        })
</script>
@php Session::forget('errors') @endphp

@endif


@if (session('pagina_updated'))
<script>
    var message = @json(session('pagina_updated'));
        console.log(message);

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: message
        })

</script>
@php Session::forget('pagina_updated') @endphp

@endif

@if (session('pagina_created'))
<script>
    var message = @json(session('pagina_created'));
        console.log(message);

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: message
        })

</script>
@php Session::forget('pagina_created') @endphp

@endif

<script>
    $(document).ready(function() {
            var date = new Date();
            var dateStr = date.getFullYear() + "/" + ("00" + (date.getMonth() )).slice(-2) + "/" + ("00" + date
                .getDate()).slice(-2);
            var dateStr2 = date.getFullYear() + "/" + ("00" + (date.getMonth() + 1)).slice(-2) + "/" + ("00" + date
            .getDate()).slice(-2);

            var inicio = dateStr;
            var fin = dateStr2;
            listadoPaginas(inicio, fin);


            const dateStr2_inicio = ("00" + date
                .getDate()).slice(-2) + "-" + ("00" + (date.getMonth() )).slice(-2) + "-"  + date.getFullYear();

            const dateStr2_fin = ("00" + date
            .getDate() ).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-"  + date.getFullYear();
            
            
            $('#reportrange span').html(`<p>${dateStr2_inicio + ' A ' + dateStr2_fin}</p>`);
            $('#reportrange span').addClass('text-black text-sm mr-1');
    });


    var listadoPaginas = function(inicio = false, fin = false) {
        var table = $('#table-usuarios').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        autoWidth: false,
        destroy: true,
        pageLength: 10,
        ajax: {
                    url: "{{ route('paginas.table') }}",
                    type: 'post',
                    data: {
                        inicio,
                        fin,
                        "_token": "{{csrf_token()}}"
                    }
                },
        columns: [{
                data: 'pag_nombre',
                name: 'pag_nombre',
                searchable: true,
            },
         
            {
                data: 'pag_estado',
                name: 'pag_estado',
                searchable: true,
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
            },
        ],
        dom: '<"top">lBft<"bottom"irp><"clear">',
                buttons: [{
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
                    },
                    {
                        extend: 'excel',
                        text: 'EXCEL',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'print',
                        text: 'IMPRIMIR',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    }
                ],
        columnDefs: [{
                targets: 0,
                width: "40%",
            },
            {
                targets: 1,
                width: "40%",
                render: function(data, type, row) {
                    return data == "1" ? `<span class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap flex-col p-4"><i class="fas fa-circle text-emerald-500 mr-2"></i>Activo</span>` :
                        `<span class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap flex-col p-4"><i class="fas fa-circle text-red-500 mr-2"></i>Inactivo</span>`
                }
            },
            {
                targets: 2,
                width: "20%",    
         }]
    });
        }

        $(function() {

            var start = moment().subtract(1, 'months');

            var end = moment();

            function cb(start, end) {

                var inicio = start.format('YYYY-MM-DD');
                var fin = end.format('YYYY-MM-DD');

                listadoPaginas(inicio, fin);

                $('#reportrange span').html(start.format('DD-MM-YYYY') + ' A ' + end.format('DD-MM-YYYY'));
                $('#reportrange span').addClass('text-black');
            }

            $('#reportrange').daterangepicker({
                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "Desde",
                    "toLabel": "A",
                    "customRangeLabel": "Personalizado",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "D",
                        "L",
                        "M",
                        "M",
                        "J",
                        "V",
                        "S"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1
                },
                startDate: start,
                endDate: end,
                ranges: {
                    'Hoy': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                    'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                    'Este mes': [moment().startOf('month'), moment().endOf('month')],
                    'Mes anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });


  

    function modalEliminar(id){
    
         
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esta acción no se puede deshacer!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#1E3A8A',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Si, estoy seguro'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{route('paginas.delete')}}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                "id": id,
                            },
                            success: function(response) {
                                table.ajax.reload();
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })

                               if(response.status == 200){
                                Toast.fire({
                                    icon: 'success',
                                    title: response.message
                                })
                               }else{
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message
                                })
                               }
                            }
                        });
                    }
                })
            }
           
       
  
</script>

@endsection