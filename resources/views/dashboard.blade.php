<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Panel de inicio</title>
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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="{{asset('src/assets/css/light/components/modal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/apps/notes.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('src/assets/css/dark/components/modal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/dark/apps/notes.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('src/plugins/src/sweetalerts2/sweetalerts2.css')}}">
    
    <link href="{{asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{asset('src/plugins/src/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/light/notification/snackbar/custom-snackbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/dark/notification/snackbar/custom-snackbar.css')}}" rel="stylesheet" type="text/css" />

</head>
<body class="layout-boxed">

    <!--  BEGIN NAVBAR  -->
    <x-navbar></x-navbar>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <x-sidebar ruta="dashboard"></x-sidebar>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    {{-- modal activate --}}
                    <button type="button" class="btn btn-warning mb-2 me-4" data-bs-toggle="modal" data-bs-target="#standardModal" id="Modal_delete" style="display: none">xd</button>

                    <div class="layout-px-spacing">

                        <div class="middle-content container-xxl p-0">
                            
                            <div class="row app-notes layout-top-spacing" id="cancel-row">
                                <div class="col-lg-12">
                                    <div class="app-hamburger-container">
                                        <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                                    </div>
            
                                    <div class="app-container">
                                        
                                        <div class="app-note-container">
            
                                            <div class="app-note-overlay"></div>
            
                                            <div class="tab-title">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-12 mb-5">
                                                        <p class="group-section">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg> 
                                                            Categorías
                                                        </p>
            
                                                        <x-list-categories></x-list-categories>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                                        <a id="btn-add-notes" class="btn btn-secondary w-100 _effect--ripple waves-effect waves-light" href="{{route('note.create')}}">Agregar nota</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="ct" class="note-container note-grid">
                                                @forelse  ($notes as $note)
                                                    <div class="note-item all-notes note-default  @if (isset($note->category)){{$note->category->class}}@endif" >
                                                        <div class="note-inner-content">
                                                            <div class="note-content">
                                                                <p class="note-title" data-notetitle="{{$note->title}}">{{$note->title}}</p>
                                                                <p class="meta-time">{{ date('d/m/y h:m', strtotime($note->updated_at))}}</p>
                                                                <div class="note-description-content">
                                                                    <p class="note-description" data-notedescription="{{$note->content}}">
                                                                        {{$note->content}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="note-action">
                                                                <a href="{{route('note.show', $note->id)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye view-note"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>                                                            
                                                                </a>    
                                                                <a href="{{route('note.edit',$note->id)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 fav-note"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                </a>
                                                                <a onclick="alert_delete_modal({{$note->id}})">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 delete-note"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </a>
                                                            </div>
                                                            <div class="note-footer">
                                                                <div class="tags-selector btn-group">
                                                                        <div class="tags">
                                                                            <div class="g-dot-personal"></div>
                                                                            <div class="g-dot-work"></div>
                                                                            <div class="g-dot-social"></div>
                                                                            <div class="g-dot-important"></div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-12 layout-spacing" style="margin: 0 auto; text-align: center;">
                                                        <div class="widget widget-card-one" style="display: inline-block; text-align: left;">
                                                            <div class="widget-content conte_card">
                                                                    <h2 style="margin-left: 1rem">No hay notas creadas.</h2>
                                                                    <p>Cree una nueva nota para verla aquí.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
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
    <script src="{{asset('src/plugins/src/global/vendors.min.js')}}"></script>
    <script src="{{asset('src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('src/plugins/src/waves/waves.min.js')}}"></script>
    <script src="{{asset('layouts/modern-dark-menu/app.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script>
        function alert_delete_modal(id){
            let btn = document.getElementById('Modal_delete');
            let form = document.getElementById('form_delete');
            btn.click();
            form.action = "/note/"+id;
        }
    </script>
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>
