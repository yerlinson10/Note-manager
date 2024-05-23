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
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/filepond.min.css')}}">
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tagify/tagify.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/forms/switches.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tagify/custom-tagify.css')}}">
    <link href="{{ asset('src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/forms/switches.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tagify/custom-tagify.css')}}">
    <link href="{{ asset('src/plugins/css/dark/filepond/custom-filepond.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('src/assets/css/light/apps/blog-create.css')}}">
    <link rel="stylesheet" href="{{ asset('src/assets/css/dark/apps/blog-create.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
    <link href="{{ asset('src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css')}}">
    
    <!--  END CUSTOM STYLE FILE  -->

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
    
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Notas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                
                    <div class="row mb-4 layout-spacing layout-top-spacing">
                
                        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                
                            <div class="widget-content widget-content-area blog-create-section">
                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="titulo" placeholder="Titulo">
                                    </div>
                                </div>
                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Contenido</label>
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                
                        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                            <div class="widget-content widget-content-area blog-create-section">
                                <div class="row">
                                    <div class="col-xxl-12 col-md-12 mb-4">
                                        <label for="tags">Etiqueta</label>
                                        <input id="tags" name='tags' value='' placeholder="Escribe la Etiueta">
                                    </div>
                
                                    <div class="col-xxl-12 col-md-12 mb-4">
                                        <label for="category">Categoria</label>
                                        <select id="category" name="category[]" multiple placeholder="Select a state..." autocomplete="off">
                                            <option value="">Select a state...</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button type="submit" class="btn btn-success w-100">Agregar Nota</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                
                    </div>
                    
                </div>
                <x-footer></x-footer>
                <!--  END CONTENT AREA  -->

            </div>
        </div>

    </main >

    <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ asset('layouts/modern-dark-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('src/plugins/src/editors/quill/quill.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/filepond.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
        
        <script src="{{ asset('src/plugins/src/tagify/tagify.min.js') }}"></script>
        
        <script src="{{ asset('src/assets/js/apps/blog-create.js') }}"></script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('src/assets/js/scrollspyNav.js')}}"></script>
        <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js')}}"></script>
        <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js')}}"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script>
            new TomSelect("#category",{
                maxItems: 1
            });
            var input = document.querySelector('input[name=tags]');

            // initialize Tagify on the above input node reference
            new Tagify(input)
        </script>

</body>

</html>
