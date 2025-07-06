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

      
      <!-- Fin Configura el checked del campo activo -->  


    <div class="container-xxl flex-grow-1 container-p-y">
   
        <div >    
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Modificar Api</h5>
                <hr>
                <div class="card-body">
                        <form action="<?=route('save_updateApi')?>" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Nombre Api</label>
                                <div class="col-md-7">
                                    <input type="text" id="nob_api" class="form-control" 
                                    name="nob_api" value = "{{ $nob_api}}" autofocus>
                                    @if($swModificar==1)
                                      <div style="color:red">*El Api editado ya existe</div>
                                    @endif  
                                    @error('nob_api')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror                                    

                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="des_api" class="col-md-2 col-form-label text-md-right">Descripción</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" id="des_api" name="des_api" rows="3">{{ $desc_api }}</textarea>
                                    @error('des_api')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <label for="Aliado" class="col-md-2 col-form-label text-md-right">Tipo Api</label>
                                <div class="col-md-1">

                                <select id="idTipo" name="idTipo" class="form-select" style="width:400px;">
                                      @foreach($tipo as $registro)
                                          @if($registro->id == $id_tipo_api)
                                            <option value="{{$registro['id']}}" seleted>{{$registro['nob_tipo_api']}}</option>
                                          @else
                                            <option value="{{$registro['id']}}">{{$registro['nob_tipo_api']}}</option> 
                                          @endif  
                                      @endforeach
                                </select>
                                </div>
                            </div>    

                            <br>


                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Modificar
                                </button>
                                <a href="<?=route('index_api')?>" class="btn btn-link">
                                    Cancelar?
                                </a>
                            </div>

                            <input type="hidden" id="id" name="id" value = "{{ $id }}">
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
