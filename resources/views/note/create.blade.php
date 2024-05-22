<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Panel de inicio</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}" />
    <link href="{{ asset('layouts/modern-dark-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/modern-dark-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('layouts/modern-dark-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/modern-dark-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/modern-dark-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="{{ asset('src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/apps/notes.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/dark/apps/notes.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="layout-boxed">

    <!--  BEGIN NAVBAR  -->
    <x-navbar></x-navbar>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <main class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <x-sidebar ruta="dashboard"></x-sidebar>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        
                        <div class="layout-px-spacing">
                            <div id="wizard_Default" class="col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Crear nueva nota</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form action="{{ route('note.store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label for="title">Titulo</label>
                                                    <input type="text" class="form-control" id="title" placeholder="Titulo ">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label for="content">Contenido de la nota</label>
                                                    <textarea class="form-control" name="content" id="" cols="30" rows="10" id="content"></textarea>
                                                </div>
                                            </div>
                                            <button class="btn btn-success me-3" type="submit">Crear nota</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  BEGIN FOOTER  -->
                    <x-footer></x-footer>
                    <!--  END FOOTER  -->
                </div>
                <!--  END CONTENT AREA  -->

            </div>
        </div>

    </main >

            <!-- END MAIN CONTAINER -->

            <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
            <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
            <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
            <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
            <script src="{{ asset('layouts/modern-dark-menu/app.js') }}"></script>
            <!-- END GLOBAL MANDATORY SCRIPTS -->

            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            {{-- <script src="{{asset('src/assets/js/apps/notes.js')}}"></script> --}}
            <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
