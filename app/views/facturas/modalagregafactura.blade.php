
  <?php $uri = Request::path(); ?> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Factura</h4>
      </div>
        <div class="modal-body">

      <div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">

        <header>
          <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
          <h2>Factura</h2>                  
        </header>

        <!-- widget div-->
        <div>       
          <div class="jarviswidget-editbox">
          </div>
          <div class="widget-body no-padding">
            {{ Form::open(array(                
                 'url'=>'facturas/subexml', 
                 'method' => 'post',
                 'enctype'=>'multipart/form-data',
                 'id'=>'FormFactura',
                 'class'=>'smart-form'
              ))  
            }}


              <fieldset>
              
                <section>
                  <label class="label">Archivo XML</label>
                  <label for="file" class="input input-file">
                    <!--<div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Buscar</div><input type="text" name="archivo" id="archivo" placeholder="Agrega un archivo XML" readonly="" >-->
                    {{--Form::file('archivo_xml', ['id' => 'archivo_xml'], ['class' => 'archivo_xml'])--}}
                    <input type="file" name="archivo_xml" id="archivo_xml" class="archivo_xml" required/>
                  </label>
                </section>
                

                <section>
                  <label class="label">Archivo PDF</label>
                  <label for="file" class="input input-file">
                    <!--<div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Buscar</div><input type="text" name="archivo" id="archivo" placeholder="Agrega un archivo XML" readonly="" >-->
                    {{--Form::file('archivo_xml', ['id' => 'archivo_xml'], ['class' => 'archivo_xml'])--}}
                    <input type="file" name="archivo_pdf" id="archivo_pdf" class="archivo_pdf btn btn-default" required/>
                  </label>
                </section>



              @if($role>=5)
                <input type="hidden" id="sucursal" name="sucursal" value="{{Session::get('id_suc')}}">
              @else             
                <section>
                  <label class="label">Sucursal</label>
                  <label class="input">
                    <input type="text" id="sucursal" name="sucursal" list="list_sucursales">
                    <datalist id="list_sucursales">                     
                    @if($sucursales)
                      @foreach($sucursales as $suc)
                        <option id="{{$suc->num_branch}}" value="{{$suc->name_branch}}"></option>
                      @endforeach
                    @endif
                    </datalist> </label>
                  <div class="note">
                  </div>
                </section>
              @endif



              </fieldset>

              <footer>
                <button type="submit" class="btn btn-primary">
                  Guardar
                </button>
                <!--<input type="button" value="Subir imagen" />-->
              </footer>
            <!--</form>-->
            {{ Form::close() }}

          </div>
          <!-- end widget content -->       
        </div>
        <!-- end widget div -->       
      </div>
      </div>  
    </div>
  </div>
</div>
