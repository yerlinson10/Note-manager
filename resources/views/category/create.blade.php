<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Agregar nota</title>
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
        <x-sidebar ruta="note.create"></x-sidebar>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
    
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                
                    <div class="widget-content widget-content-area">
                        <form action="{{route('categories.store')}}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="name" style="color: rgb(255, 255, 255)">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la categorías *" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="description" style="color: rgb(255, 255, 255)">Descripción</label>
                                    <textarea type="text" class="form-control" id="description" name="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="color" style="color: rgb(255, 255, 255)">Color</label>
                                    <select id="color" name="color" class="form-select" placeholder="Seleccionar un color..." autocomplete="off">
                                        <option value="">Seleccionar un color...</option>
                                        <option value="note-social, Morado" {{ old('color') == sprintf("%s,%s", $category->class, $category->color) ? 'selected' : ''}}>Morado</option>
                                        <option value="note-personal, Verde" {{ old('color') == sprintf("%s,%s", $category->class, $category->color) ? 'selected' : ''}}>Verde</option>
                                        <option value="note-work, Amarillo" {{ old('color') == sprintf("%s,%s", $category->class, $category->color) ? 'selected' : ''}}>Amarillo</option>
                                        <option value="note-important, Rojo" {{ old('color') == sprintf("%s,%s", $category->class, $category->color) ? 'selected' : ''}}>Rojo</option>
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-success me-3" type="submit">Agregar categoría</button>

                        </form> 
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
</body>

</html>
