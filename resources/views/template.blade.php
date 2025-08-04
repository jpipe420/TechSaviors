<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--se dirige a la carpeta config y en el  archivo app llama la variable local-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Techsaviros - Sistema de gestión de servicios técnicos">
    <meta name="author" content="FC">

    <title>Sistema de ventas - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> <!--se dirige a la carpeta public y en vendor/fontawesome-free/css llama al archivo all.min.css -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> <!--se dirige a la carpeta public y en vendor/fontawesome-free/css llama al archivo all.min.css-->

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/template.css') }}" rel="stylesheet"><!--el asset se dirige a la carpeta public y en css llama al archivo template.css-->
    @stack('css')
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

            <x-navigation-menu />


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <x-navigation-header />

    @yield('content')

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

            <x-footer></x-footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{  asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{  asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{  asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/script.js')}}"></script><!--se dirige a la carpeta public y en js llama al archivo script.js-->

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    @stack('js')



</body>

</html>