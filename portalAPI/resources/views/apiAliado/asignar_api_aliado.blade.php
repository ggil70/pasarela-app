

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
                <span style="margin-top:0.6em; margin-left: 0.6em; font-size:20px"><b>Asignar Apis al Aliados</b></span>
                <span style="margin-top:0.6em; margin-left: 0.6em; font-size:20px"><b>Aliado</b>: {{$nob_aliado}}</span>

                <hr>

                    <main class="card-body">
                        <form action="<?=route('save_api_aliado')?>" method="POST">
                        @csrf

                                <h5>Seleccione Apis asociadas al Aliado</h5>

                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered"> 
                                        @php
                                           $swCol = 0;
                                           $swChecked = 0;
                                        @endphp   

                                        <!-- Valida si el aliado posee apis ya asignada, de poseer permitira que los
                                             checkbox sean seleccionado o no en función a las apis asignadas y por asignar
                                        -->      
                                        @if($nro_registro > 0 )  
                                            @php
                                                $swChecked = 1;
                                            @endphp
                                        @endif    
                                            
                                        @foreach($apis as $record)
                                            @php 
                                                $checked = "";
                                            @endphp

                                            @if($swChecked == 1)
                                                @if($record->id_aliado!==null)
                                                   @php
                                                   $checked = "checked";  
                                                   @endphp
                                                @endif   
                                            @else
                                                @php
                                                    $checked = "checked";  
                                                @endphp
                                            @endif    

                                            @if($swCol == 0)
                                                @php
                                                    $swCol = 1;
                                                    $checkBox = "s" . $record->id;
                                                @endphp                                             
                                                <tr>
                                                <td  width="50%" >
                                                    <input class="form-check-input" type="checkbox" name="{{ $checkBox }}" id="{{ $checkBox }} " {{$checked}}  />
                                                    &nbsp;&nbsp;&nbsp;{{$record->nob_api}}
                                                </td>
   
                                            @else
                                                @php
                                                    $swCol = 0;
                                                    $checkBox = "s" . $record->id;
                                                @endphp


                                                <td width="50%">
                                                    <input class="form-check-input" type="checkbox" name="{{ $checkBox }}" id="{{ $checkBox }}" {{$checked}} />
                                                    &nbsp;&nbsp;&nbsp;{{$record->nob_api}}
                                                </td>
                                                </tr>     
                                            @endif        
                                        @endforeach
                                    </table>
            
                                </div>
                            

                            <br>            


                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="<?=route('asignar_api')?>" class="btn btn-link">
                                    Cancelar?
                                </a>
                            </div>
                    </main>
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


<script src="{{ asset('js/sweetAlert/sweetalert2.all.js')}}"></script>

<script>



/*    function sweetAlert(tipo, titulo, config, footer, time) {
        Swal.fire({
            position: 'top-center',
            type: tipo,
            title: titulo,
            footer: footer,
            showConfirmButton: false,
            timer: time

        })
    }


            sweetAlert("success", "Debe completar el campo 'Otro de la tercera (3) pregunta'", true, "Si el problema persiste, contacte con el soporte de Minmujer", 5000);
*/            
</script>  
