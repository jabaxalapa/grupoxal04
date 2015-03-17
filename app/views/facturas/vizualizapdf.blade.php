<style type="text/css">
	.modal-pdf{
		width: 800px !important;
	}
</style>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-pdf">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Archivo PDF Folio: {{$folio}}</h4>
      </div>
      <div class="modal-body">

			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">


	<embed width="100%" height="500px" name="plugin" src="/facturas_xml/pdf/{{$nombre_pdf}}" type="application/pdf">




      </div>

    </div>
  </div>
</div>





<script type="text/javascript">
	$('#myModal4').modal('show');
</script>