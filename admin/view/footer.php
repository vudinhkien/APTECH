 <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="plugin-style/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="plugin-style/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
   <script src="js/josh.js" type="text/javascript"></script>
    <script src="js/metisMenu.js" type="text/javascript"> </script>
    <script src="plugin-style/holder-master/holder.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- Back to Top-->
    <script type="text/javascript" src="plugin-style/countUp/countUp.js"></script>
         
   <!-- Bootstrap WYSIHTML5 -->
    <script  src="plugin-style/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script  src="plugin-style/ckeditor/adapters/jquery.js" type="text/javascript" ></script>
    <script  src="plugin-style/ckeditor/ckfinder/ckfinder.js" type="text/javascript"></script>
    <script type="text/javascript">
	CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'vi';
	config.width = '700';
	config.height = '700';
	config.filebrowserBrowseUrl = '<?php echo BASE_URL; ?>/admin/plugin-style/ckeditor/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '<?php echo BASE_URL; ?>/admin/plugin-style/ckeditor/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '<?php echo BASE_URL; ?>/admin/plugin-style/ckeditor/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = '<?php echo BASE_URL; ?>/admin/plugin-style/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '<?php echo BASE_URL; ?>/admin/plugin-style/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '<?php echo BASE_URL; ?>/admin/plugin-style/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
		config.toolbarGroups = [
		{ name: 'styles' },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'colors' },
		{ name: 'links' },
		{ name: 'insert' },
		'/',
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },	
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'tools' },
		{ name: 'others' }
	];
	};
		
	</script>
    <script  src="plugin-style/tinymce/js/tinymce/tinymce.min.js" type="text/javascript" ></script>
    <script  src="plugin-style/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/wysihtml5.js" type="text/javascript"></script>
    <script  src="plugin-style/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/core-b3.js" type="text/javascript"></script>
    <script  src="js/pages/editor.js" type="text/javascript"></script>
    <script  src="plugin-style/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
    <script src="plugin-style/x-editable/jquery.mockjax.js" type="text/javascript"></script>
    <script src="plugin-style/x-editable/bootstrap-editable.js" type="text/javascript"></script>
        <script src="js/pages/user_profile.js" type="text/javascript"></script>
    <script  src="js/customs.js" type="text/javascript"></script>
    <!-- end of page level js -->
	<!-- validate form-->
	<script src="plugin-style/validation/dist/js/jquery.validate.js" type="text/javascript" ></script>
    <script src="../js/autoNumeric.js" type="text/javascript" ></script>
    <script src="js/pages/validation.js" type="text/javascript" ></script>
    <!-- end validate form-->