<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Categorías </title>
    <link rel="icon" type="image/x-icon" href="{{asset('src/assets/img/favicon.ico')}}"/>
    <link href="{{asset('layouts/modern-dark-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/modern-dark-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('layouts/modern-dark-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/modern-dark-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/modern-dark-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/src/table/datatable/datatables.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/light/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{asset('src/plugins/src/sweetalerts2/sweetalerts2.css')}}">
    
    <link href="{{asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    {{-- Css de Alertas de error o success --}}
    <link href="{{asset('src/plugins/src/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/light/notification/snackbar/custom-snackbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/dark/notification/snackbar/custom-snackbar.css')}}" rel="stylesheet" type="text/css" />

    <style>
        #crear_partido {
            margin-left: 60%;
        }
        @media (max-width: 991px) {
            #crear_partido {
                margin-left: 0%;
            }
        }
    </style>

</head>
<body class="layout-boxed">
    
    <x-navbar></x-navbar>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <x-sidebar ruta='partido_judicial'></x-sidebar>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <div class="row">
                            <div class="col-lg-10 col-xl-10">
                                
                                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a>Categorías</a></li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="col-lg-2 col-xl-2">
                                <a href="{{route('categories.create')}}"><button class="btn btn-success mb-2 me-4 " id="crear_partido" >Nueva</button></a>
                            </div>
                        </div>
                    </div>

                    <!-- /BREADCRUMB -->
                    <button type="button" class="btn btn-warning mb-2 me-4" data-bs-toggle="modal" data-bs-target="#standardModal" id="Modal_delete" style="display: none">xd</button>

                    <div class="row layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Color</th>
                                            <th>Fecha de creación</th>
                                            <th>Fecha de actualización</th>
                                            <th class="no-content">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>{{$category->color}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td>{{$category->updated_at}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example" id="grupo">
                                                    <button type="button" onclick="alert_delete_modal({{$category->id}})" class="btn btn-light-danger "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                    <a href="{{route('categories.edit', $category->id)}}"><button type="button" class="btn btn-light-success "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                    </div>

                </div>

            </div>

            <!--  BEGIN FOOTER  -->
            <x-footer></x-footer>
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    {{-- Modal Eliminar --}}
    <!-- END MAIN CONTAINER -->
    <div class="modal fade modal-notification " id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="standardModalLabel">
            <div class="modal-content">
                <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: grid;">
                    <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div>
                    <h2 class="swal2-title" id="swal2-title" style="display: block;">¿Estas seguro?</h2>
                    <div class="swal2-html-container" id="swal2-html-container" style="display: block;">¡No podrás revertir esto!</div>
                    <div class="swal2-actions" style="display: flex;">
                        <div class="swal2-loader"></div>
                        <form id="form_delete" action="" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="swal2-confirm swal2-styled swal2-default-outline" aria-label="" style="display: inline-block; background-color: rgb(48, 133, 214);">¡Sí, bórralo!</button>
                        </form>
                        <button type="button" data-bs-dismiss="modal" class="swal2-cancel swal2-styled swal2-default-outline" aria-label="" style="display: inline-block; background-color: rgb(221, 51, 51);">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('src/plugins/src/global/vendors.min.js')}}"></script>
    <script src="{{asset('src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/waves/waves.min.js')}}"></script>
    <script src="{{asset('layouts/modern-dark-menu/app.js')}}"></script>
    <script src="{{asset('src/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('src/plugins/src/table/datatable/datatables.js')}}"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('src/plugins/src/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('src/assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    {{-- Js de Alertas de error o success --}}
    <script src="{{asset('src/plugins/src/notification/snackbar/snackbar.min.js')}}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('src/assets/js/components/notification/custom-snackbar.js')}}"></script>

    @if (session('success'))
            <button id="success_delete" class="btn btn-button-5 success-delete" style="display: none;">xd</button>
            <script>
                let btn_alert = document.getElementById('success_delete')
                add_notification('.success-delete', 
                {   
                    text: ' {{ session('success') }}', 
                    duration: 5000, 
                    pos: 'top-center', 
                    backgroundColor: '#00AD56', 
                    actionText: 'Ok', 
                    actionTextColor: '#00F3F0'
                });

                btn_alert.click();

            </script>
    @endif

    @if (session('error'))
            <button id="error_delete" class="btn btn-button-5 error-delete" style="display: none;">xd</button>
                            {{ session('error') }}
                <script>
                    let btn_alert = document.getElementById('error_delete')
                    add_notification('.error-delete', 
                    {   
                        text: 'El registro no pudo ser eliminado', 
                        duration: 5000, 
                        pos: 'top-center', 
                        backgroundColor: '#AD1800', 
                        actionText: 'Ok', 
                        actionTextColor: '#FFCACA'
                    })

                    btn_alert.click();

                </script>
    @endif
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10 
        });

        function alert_delete_modal(id){
            let btn = document.getElementById('Modal_delete');
            let form = document.getElementById('form_delete');
            btn.click();
            form.action = "/categories/"+id;
        }
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>
