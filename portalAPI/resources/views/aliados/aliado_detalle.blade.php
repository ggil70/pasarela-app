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
      
            <!--Configura el checked del campo activo -->  
            @php
                $estatus = 'DESACTIVACTIVO'; 
            @endphp

            @if($estatus == 1)
                @php   
                    $checked = 'ACTIVO';
                @endphp        
            @endif
      
      <!-- Fin Configura el checked del campo activo -->  


    <div class="container-xxl flex-grow-1 container-p-y">
   
        <div >    
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Detalles del Aliado</h5>
                <hr>
                <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Nombre aliado</label>
                                <div class="col-md-9">
                                    {{$nob_aliado}}
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="tipo_doc" class="col-md-2 col-form-label text-md-right">Cédula / Rif</label>
                                <div class="col-md-7">
                                    {{$tipo_documento . " - " . $nro_documento}}
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Email</label>
                                <div class="col-md-7">
                                   {{ $email}}
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Cuenta asociada</label>
                                <div class="col-md-7">
                                      {{ $cta_aliado }}
                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <label for="tipo_doc" class="col-md-2 col-form-label text-md-right">Teléfono Asociado </label>
                                <div class="col-md-7">
                                    {{$cod_telefono . " - " . $nro_celular}}
                                </div>    
                            </div>

                            <br>
                            <div class="form-group row">
                                <label for="tipo_doc" class="col-md-2 col-form-label text-md-right">Api key </label>
                                <div class="col-md-7">
                                    {{$apikey}}
                                </div>    
                            </div>                            

                            <br>
                            <div class="form-group row">
                                <label for="estatus" class="col-md-2 col-form-label text-md-right">Estatus</label>

                                <div class="col-md-7">
                                    {{$estatus}}
                                </div>
                            </div>                            


                            <div class="col-md-6 offset-md-2">
                                <a href="<?=route('index_aliado')?>" class="btn btn-primary">
                                    Regresar?
                                </a>
                            </div>
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


<script>
function nro_entero(objeto){
//valida si el nro es entero sin caracteres diferentes a numero
//formulario = nombre del formulario origen
//Objeto = nombre del campo u objeto

var valor = document.getElementById(objeto).value;
i=0;
cad_numero="";
tamano = valor.length;
while(i < tamano){
    var nro = valor.charAt(i);
    if(nro=="1" || nro=="2" || nro=="3" || nro=="4" || nro=="5" || nro=="6" || nro=="7" || nro=="8" || nro=="9" || nro=="0"){
        cad_numero = cad_numero + nro;
    }    
    i=i+1;    
}
document.getElementById(objeto).value = cad_numero;
}


function valCuenta(){

    alert("czxczxc");
/*    const inputNumero = document.getElementById('cta_asoc').value;
    nro_entero('cta_asoc');

    const maxDigitos = 20;
    if(inputNumero.length > 20){
       document.getElementById('cta_asoc').value = inputNumero.substring(0,20);
    }
*/    
}

function valDocumento(){
    const inputNumero = document.getElementById('doc_cte').value;
    

    const tipo = document.getElementById('tipo_doc').value;
    if(tipo == 'V' || tipo == 'E' || tipo == 'J' || tipo == 'G'){
        if(inputNumero.length > 9){
            document.getElementById('doc_cte').value = inputNumero.substring(0,9);
        }
    }
}


function ValCtaActivo(){

    const inputNumero = document.getElementById('cta_asoc').value;
    const codigo = inputNumero.substring(0,4);
    if(codigo != '0171'){
        document.getElementById('vCuenta').style.display = "inline";
    }

}


function desactivarEtiqueta(){
    document.getElementById('vCuenta').style.display = "none";
}


</script>

