

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
                <span style="margin-top:0.6em; margin-left: 0.6em; font-size:20px">Incluir Aliado</span>
                <hr>

                    <main class="card-body">
                        <form action="<?=route('save_incluirAliado')?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf


                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Nombre aliado</label>
                                <div class="col-md-9">
                                    <input type="text" id="nob_aliado" class="form-control" name="nob_aliado" maxlength="100" value="{{ old('nob_aliado') }}" autofocus >
                                    @error('nob_aliado')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="tipo_doc" class="col-md-2 col-form-label text-md-right">Cédula / Rif</label>
                                <div class="col-md-1">

                                <select id="tipo_doc" name="tipo_doc" class="form-select" style="width:70px;">
                                      @foreach($tipoDocumento as $indice => $elemento)
                                          <option value="{{$indice}}">{{$indice}}</option>
                                      @endforeach
                                </select>
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="doc_aliado" class="form-control" name="doc_aliado" maxlength="15" style="width:200px;" onkeyup="valDocumento()" value="{{ old('doc_aliado') }}">
                                    @error('doc_aliado')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Email</label>
                                <div class="col-md-7">
                                    <input type="text" id="email_aliado" class="form-control" name="email_aliado" maxlength="100" value="{{ old('email_aliado') }}">
                                    @error('email_aliado')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Cuenta asociada</label>
                                <div class="col-md-1">
                                    <input type="text" id="cta_asoc_pre" class="form-control" name="cta_asoc_pre" maxlength="20" style="width:70px;" value="0171" readonly>
                                </div>
                                
                                <div class="col-md-8">    
                                    <input type="text" id="cta_asoc" class="form-control" name="cta_asoc" maxlength="16" style="width:200px;" 
                                            value="{{ old('cta_asoc') }}" onkeyup="valCuenta()">
                                    @error('cta_asoc')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="tipo_doc" class="col-md-2 col-form-label text-md-right">Teléfono Asociado </label>
                                <div class="col-md-1">

                                <select id="cod_cel" name="cod_cel" class="form-select" style="width:90px;">
                                      @foreach($codigoTelefono as $registro)
                                          <option value="{{$registro['id']}}">{{$registro['cod_telefono']}}</option>
                                      @endforeach
                                </select>
                                </div>
                                <div class="col-md-6">
                                <input type="text" id="nro_cel" class="form-control" name="nro_cel" maxlength="7" style="width:150px;" onkeyup="nro_entero('nro_cel')" value="{{ old('nro_cel') }}">
                                    @error('nro_cel')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <label for="mto_vuelto" class="col-md-2 col-form-label text-md-right">Monto Máximo Vuelto</label>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" step="0.01" id="mto_vuelto" name="mto_vuelto" value="{{ old('mto_vuelto') }}" onchange="formatearDecimales()" >
                                    @error('mto_vuelto')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror                                     

                                </div>
                            </div>


                            <br>


                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Logo</label>
                                <div class="col-md-8">  

                        <tr>
                          <td>
                                                            
                                    <input type="file" name="logo" id="logo">
                                    <br>
                                    @error('logo')
                                        <span style="color:red;">* 
                                            {{ $message }}
                                        </span>
                                    @enderror                                    

                                </div>
                            </div>
                            <br>

                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary" onclick="validacion();"()>
                                    Guardar
                                </button>
                                <a href="<?=route('index_aliado')?>" class="btn btn-info">
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
    nro_entero('doc_aliado');
    const inputNumero = document.getElementById('doc_aliado').value;
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



function formatearDecimales() {
  let numero = document.getElementById("mto_vuelto").value;
  document.getElementById("mto_vuelto").value = parseFloat(numero).toFixed(2);
}



</script>
 