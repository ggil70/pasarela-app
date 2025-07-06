<!DOCTYPE html>

<!--=========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>



<!-- Head -->
@include('head')
<!-- no head -->



  <body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">  

      <!-- menu -->
      @include('menu')
      <!-- Fin Menu -->   

      <!-- Encabezado -->
      @include('encabezado')
      <!-- Fin Encabezado --> 
    <div class="container-xxl flex-grow-1 container-p-y">
   
        <div >    
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Activar o Inhabilitar Api</h5>
                <hr>
                <div class="card-body">
                        <form action="<?=route('delete_api')?>" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Nombre Rol</label>
                                <div class="col-md-7">
                                    <input type="text" id="nob_rol" class="form-control" 
                                    name="nob_rol" value = "{{ $nob_api}}" readonly>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="des_api" class="col-md-2 col-form-label text-md-right">Descripción</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" id="des_api" name="des_api" rows="3" readonly>{{ $desc_api }}</textarea>
                                    @error('des_api')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <br>


                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-danger">
                                    {{ $nob_estatus }}
                                </button>
                                <a href="<?=route('index_api')?>" class="btn btn-link">
                                    Cancelar?
                                </a>
                            </div>

                            <input type="hidden" id="id" name="id" value = "{{ $id }}">
                            <input type="hidden" id="idEstatus" name="idEstatus" value = "{{ $estatus }}">
                    </div>
                    </form>
                </div>
              </div>
              <!--/ Bordered Table -->




          </div>




      <!-- Layout container -->
      <div class="layout-page">

          

      <!---------------------------- Inicio FOOTEeeeeR ------------------------------------------------------>
         @include('footer')
      <!-------------------------     FIN  FOOTER   ----------------------------------------------------->


      <div class="content-backdrop fade"></div>
    </div>
          <!-- Content wrapper -->
  </div>
        <!-- / Layout page -->
  </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


  </body>
</html>
