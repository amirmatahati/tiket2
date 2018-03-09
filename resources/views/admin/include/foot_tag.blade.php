       <script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
       <script src="{{ asset('assets/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset('assets/bower_components/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('assets/bower_components/gentelella/vendors/nprogress/nprogress.js') }}"></script>
        <script src="{{ asset('assets/bower_components/gentelella/vendors/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('assets/bower_components/gentelella/build/js/custom.min.js') }}"></script>
        <script src="{{ asset('assets/bower_components/gentelella/vendors/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}"></script>
        <script src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

@isset($scripts)
  @include($scripts)
@endisset
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
		 <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('assets/bower_components/gentelella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/gentelella/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('assets/bower_components/gentelella/vendors/google-code-prettify/src/prettify.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <!--<script src="{{ asset('js/jquery-ui.min.js') }}"></script>-->
  
  <script type="text/javascript">  

     CKEDITOR.replace( 'technig' );  

  </script>


