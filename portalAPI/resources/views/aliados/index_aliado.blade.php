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
                         <span style="margin-top:10px; margin-left: 0.6em; font-size:20px">Aliados</span>
                    </div>     
                    <div class="col-md-1" style="text-align: right; margin-right: 1.8em; margin-top:0.6em;">
                        <a href="<?=route('aliado_add')?>" class="btn btn-primary">
                          Incluir
                        </a>
                    </div>     
                </div>    

                <hr>

                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th width = "10%">Logo</th>
                          <th width = "35%">Nombre</th>
                          <th width = "30%">Email</th>
                          <th width = "15%">Estatus</th>
                          <th width = "10%">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>

                        @csrf
                        @if($swRegistro == 1)
                        @php
                            $nro = 0;
                            $activo = "";
                        @endphp                        
                        
                        @foreach($records as $registro)   
                          @php
                            $nro = $nro + 1;
                            $rutaLogo = 'storage/' . $registro->logo;
                            //para crear un link con storage.
                            //php artisan storage:link
                            @endphp

                            <tr>
                                <td>
                                    <img src="{{ $rutaLogo }}" alt="Logo" width="25px" height="25"> 
                                </td>
                                <td>{{ $registro->nob_aliado }}</td>
                                <td>{{ $registro->email }}</td>
                                @if($registro->estatus == 1)
                                    @php
                                        $activo = "Activo";
                                    @endphp
                                @else    
                                    @php
                                        $activo = "Inactivo";
                                    @endphp
                                @endif    
                           
                          <td><span class="badge bg-label-primary me-1">{{ $activo }}</span></td>

                          <td>
                            <div>
                              <a href="<?=route('aliado_detalle',$registro->id)?>"><img src="{{ asset('img/consulta.png') }}" width="20" height="20" alt="Detalle" ></a>

                              &nbsp;&nbsp;

                              <a href="<?=route('aliado_update',$registro->id)?>"><img src="{{ asset('img/modificar.png') }}" width="20" height="20" alt="Modificar" ></a>

                              &nbsp;&nbsp;
                              <a href="<?=route('aliado_delete',$registro->id)?>">
                                 <img src="{{ asset('img/delete.jpg') }}" width="20" height="20" alt="Eliminar">
                               </a>

                              &nbsp;&nbsp;
                              <a href="<?=route('aliado_apis',$registro->id)?>">
                                 <img src="{{ asset('img/api01.png') }}" width="20" height="20" alt="Apis">
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

       @if(session()->get('swIncluirAliado')== 1)
           sweetAlert("success", "El registro fue ingresado satisfactoriamente'", true, "", 2000);
           @php
              session()->put('swIncluirAliado', 0);
           @endphp    

       @endif

       @if(session()->get('swModificarAliado')== 1)
           sweetAlert("success", "El registro fue modificado satisfactoriamente'", true, "", 2000);
           @php
              session()->put('swModificarAliado', 0);
           @endphp    

       @endif

       @if(session()->get('swEliminarAliado')== 1)
           sweetAlert("success", "El registro fue eliminado satisfactoriamente'", true, "", 2000);
           @php
              session()->put('swEliminarAliado', 0);
           @endphp    

       @endif       


</script> 
