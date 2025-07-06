

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


@if($estatus == 1)
   @php
      $estado = 0;
   @endphp
@else
   @php
      $estado = 1;
   @endphp
@endif   






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
                <span style="margin-top:0.6em; margin-left: 0.6em; font-size:20px">Actualizar Estatus del Aliado</span>
                <hr>

                    <main class="card-body">
                        <form action="<?=route('change_activar')?>" method="POST" autocomplete="off">
                        @csrf


                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Estatus actual del aliado</label>
                                <div class="col-md-9">
                                    @if($estatus==1)
                                        <span>ACTITO</span>
                                    @else
                                        <span>DESACTIVADO</span>
                                    @endif    
                                    
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Estatus PROXIMO  del aliado</label>
                                <div class="col-md-9">
                                    @if($estatus==0)
                                        <span style="color:green">ACTITO</span>
                                    @else
                                        <span style="color:red">DESACTIVADO</span>
                                    @endif    
                                    
                                </div>
                            </div>

                            @if($estatus==1) 
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Motivo desactivación</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="motivo" name="motivo" rows="3" maxlength="300" autofocus></textarea>
                                </div>
                            </div>
                            @endif


                            <br>




                            <input type="hidden" id="id" name="id" value="{{$id}}">  
                            <input type="hidden" id="estado" name="estado" value="{{$estado}}">  


                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary" onclick="validacion();">
                                    Cambiar Estatus
                                </button>
                                <a href="<?=route('index_aliado')?>" class="btn btn-link">
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
    const inputNumero = document.getElementById('cta_asoc').value;
    nro_entero('cta_asoc');

    const maxDigitos = 20;
    if(inputNumero.length > 20){
       document.getElementById('cta_asoc').value = inputNumero.substring(0,20);
    }
}

function valDocumento(){
    const inputNumero = document.getElementById('doc_cte').value;
    
    nro_entero('doc_cte');

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
    if(codigo != '0171' && codigo != ''){
        document.getElementById('vCuenta').style.display = "inline";
    }

}


function desactivarEtiqueta(){
    document.getElementById('vCuenta').style.display = "none";
}


</script>
 