@include('partials/header')

<body id="page-top">
  <div id="wrapper">
    
    @include('partials/sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
      @include('partials/topbar')

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

            {{ $slot }}

            @include('partials/logout-modal')

        </div>
        <!---Container Fluid-->
        
      </div>
      
        @include('partials/footer-credit')

    </div>
  </div>

@include('partials/footer')