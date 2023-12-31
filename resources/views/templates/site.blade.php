<!doctype html>
<html lang="en" dir="rtl" >

<head>
  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>الموارد البشرية - جماعة طانطان</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/libs/apexcharts/dist/apexcharts.css')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
<style>
    @yield('style');

    iframe .zfbrandingWrapper{
        background-color: red;
    }
    iframe .brandingWrapper{
        background-color: red;
    }
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
    @include('includes.header')
<!-- Sidebar navigation-->
    @include('includes.menu')
<!-- End Sidebar navigation -->
 <!--  Header End -->
    <div class="containe col-11 mx-auto">

        @yield('content')

    </div>
    @include('modals.export_data-agent')

  <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{asset('assets/js/ajax.js')}}"></script>
  <script src="{{asset('assets/js/script.js')}}"></script>


<script>

    $(document).ready(function() {
       /* // $('iframe').contents().find('#leftpanel').hide();
        $('#iframeQuiz').contents().find("[elname='freePlanBrandingFooter']").hide();
         // Get the iframe element
    var iframe = document.getElementById('iframeQuiz');

// Check if the iframe is loaded
iframe.onload = function() {
    // Access the contentWindow of the iframe
    var iframeContent = iframe.contentWindow;

    // Access the document inside the iframe
    var iframeDocument = iframeContent.document;

    // Hide the element with attribute 'elname="freePlanBrandingFooter"'
    var elementToHide = iframeDocument.querySelector('[elname="freePlanBrandingFooter"]');
    if (elementToHide) {
        elementToHide.style.display = 'none';
    }
}; */
        @yield('script')
});
</script>

</body>

</html>
