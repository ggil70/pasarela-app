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
                <div class="form-group row">
                    <div class="col-md-10">
                         <span style="margin-top:10px; margin-left: 0.6em; font-size:20px">Afiliar Apis a  Aliados</span>
                    </div>     
                </div>    

                <hr>

                <div style="margin-left:10px; margin-right:10px;">

                <!--<div class="card-body">-->
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th width = "70%">Aliado</th>
                          <th width = "20%" style="text-align: center">Apis afiliada(s)</th>
                          <th width = "10%">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>

                        @csrf
                        @if($swRegistro == 1)
                        
                        @foreach($records as $registro)   
                        <tr>
                          <td>{{ $registro->nob_cliente }}</td>
                          <td style="text-align: center">{{ $registro->nro_apis }}</td>

                          <td>
                            <div>

                              @if($registro->nro_apis > 0)
                              <a href="<?=route('apis_detalle',$registro->id)?>"><img src="{{ asset('img/consulta.png') }}" width="20" height="15" alt="Detalle" ></a>
                              &nbsp;&nbsp;
                              @endif


                              <a href="<?=route('cliente_apis',$registro->id)?>">
                                 <img src="{{ asset('img/api01.png') }}" width="20" height="15" alt="Apis">
                               </a>

                            </div>
                          </td>
                        @endforeach
                        

                        </tr>
                        @else
                        <tr>
                          <td></td>
                          <td>No existen registros</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <!--<td colspan = "2">No existen registros</td>-->
                        </tr>  
                        @endif


                      </tbody>
                    </table>
                  </div>
                <!--</div>-->
              </div>
              <!--/ Bordered Table -->




          </div>




      <!-- Layout container -->
      <div class="layout-page">

    </body>    

          

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
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
            "language": {
                url: "{{ asset('json/esp.json') }}"
            }
        });
    }); 




    function sweetAlert(tipo, titulo, config, footer, time) {
        Swal.fire({
            position: 'top-center',
            type: tipo,
            title: titulo,
            footer: footer,
            showConfirmButton: false,
            timer: time

        })
    }

       @if(session()->get('swIncluirCte')== 1)
           sweetAlert("success", "El registro fue ingresado satisfactoriamente'", true, "", 2000);
           @php
              session()->put('swIncluirCte', 0);
           @endphp    

       @endif

       @if(session()->get('swModificarCte')== 1)
           sweetAlert("success", "El registro fue modificado satisfactoriamente'", true, "", 2000);
           @php
              session()->put('swModificarCte', 0);
           @endphp    

       @endif

       @if(session()->get('swEliminarCte')== 1)
           sweetAlert("success", "El registro fue eliminado satisfactoriamente'", true, "", 2000);
           @php
              session()->put('swEliminarCte', 0);
           @endphp    

       @endif       


</script> 
