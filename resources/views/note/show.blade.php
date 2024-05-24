<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Ver nota {{$note->title}}</title>
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

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('src/assets/css/light/elements/custom-pagination.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('src/assets/css/light/apps/blog-post.css')}}">

    <link href="{{asset('src/assets/css/dark/elements/custom-pagination.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('src/assets/css/dark/apps/blog-post.css')}}">
    <link href="{{asset('src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />

    {{-- Css de Alertas de error o success --}}
    <link href="{{asset('src/plugins/src/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/light/notification/snackbar/custom-snackbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/dark/notification/snackbar/custom-snackbar.css')}}" rel="stylesheet" type="text/css" />
    
    <style>
        .post-content{
            padding: 0px !important;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
    <!--  BEGIN NAVBAR  -->
    <x-navbar></x-navbar>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <x-sidebar ruta='dashboard'></x-sidebar>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">    
                    <div class="row layout-top-spacing">
    
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                            <div class="single-post-content">
                                <div class="post-content">
                                    {{-- <div class="media">
                                        <div class="w-img">
                                            <a href="javascript:void(0);" target="_blank" rel="noopener noreferrer">
                                                <img alt="avatar" src="{{ asset('storage/' . $dato->img_usuario) }}" width="54" class="rounded" style="margin-right: 1rem"/>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="javascript:void(0);" target="_blank" rel="noopener noreferrer" >
                                                <h6 style="margin-bottom: -0.10em">{{$dato->nombre_usuario}} {{$dato->apellido_usuario}}</h6>
                                            </a>
                                            <p class="meta-date-time">{{ \Carbon\Carbon::parse($dato->updated_at)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
                                        </div>
                                    </div> --}}
                                    

                                    <h1>{{$note->title}}</h1>
                                    <hr class="my-4">

                                    <p class="mb-5">{{$note->content}}</p>
                                    
                                    <hr class="my-4">
                                    
                                    <div class="post-tags mt-5">
                                        @if (isset($note->category))
                                            <h6>Categoría</h6>
                                            @if ($note->category->class == "note-social")
                                                <a href=""><span class="badge badge-secondary mb-2 me-4">{{$note->category->name}}</span></a>
                                            @elseif($note->category->class == "note-personal")
                                                <a href=""><span class="badge badge-success mb-2 me-4">{{$note->category->name}}</span></a>
                                            @elseif ($note->category->class == "note-work")
                                                <a href=""><span class="badge badge-warning mb-2 me-4">{{$note->category->name}}</span></a>
                                            @elseif ($note->category->class == "note-important")
                                                <a href=""><span class="badge badge-danger mb-2 me-4">{{$note->category->name}}</span></a>
                                            @else
                                                <a href=""><span class="badge badge-dark mb-2 me-4">{{$note->category->name}}</span></a>
                                            @endif
                                        @endif

                                        {{-- {{dd($note->tags)}} --}}
                                        @if (isset($note->tags))
                                            <h6>Etiquetas</h6>
                                            @foreach (json_decode($note->tags) as $tag)
                                                <a href=""><span class="badge outline-badge-primary mb-2 ">{{$tag->value}}</span></a>
                                            @endforeach
                                        @endif
                                        
                                    </div>

                                    <div class="post-dynamic-meta mt-5 mb-5">
                                        <a href="{{route('note.edit', $note->id)}}"><button class="btn btn-outline-success btn-lg mb-2 me-4">Editar nota</button></a>
                                    </div> 
                                    
                                </div>
                                
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
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="{{asset('src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/waves/waves.min.js')}}"></script>
    <script src="{{asset('layouts/modern-dark-menu/app.js')}}"></script>
    <script src="{{asset('src/plugins/src/highlight/highlight.pack.js')}}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('src/plugins/src/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('src/assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    {{-- Js de Alertas de error o success --}}
    <script src="{{asset('src/plugins/src/notification/snackbar/snackbar.min.js')}}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('src/assets/js/components/notification/custom-snackbar.js')}}"></script>


</body>
</html>
