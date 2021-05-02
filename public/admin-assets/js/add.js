$.fn.hasAttr = function(name) {
   return this.attr(name) !== undefined;
};
$(document).ready(function(){

    $('.btnConfirm').click(function(){
			var text = $(this).attr('confirm-text');
			if (!text) {
				text = 'Подтвердить!'
			}
			return confirm(text);
		});

		$('.removeImg').click(function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			if (confirm('Подтвердить!')) {
				$.ajax({
					url: url,
					type: 'get',
					data: 'removeimage=1',
					success: function(data) {
						if(data == 'removed') {
							$('#imageBox').slideUp('fast', function() {
								$('#fileInput').slideDown('fast');
							});
						}else {
							alert(data);
						}
					}
				});
			}
		});
		if ($('.textarea').length > 0) {
        $('.textarea').tinymce({
            theme: "modern",
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker", "table contextmenu directionality emoticons paste textcolor responsivefilemanager"],
            height: 400,
            language: 'ru',
            // toolbar: 'undo redo |  formatselect | fontsizeselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | responsivefilemanager | help',
            toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | responsivefilemanager | help',
            // images_upload_url: '/upload.php',
            // images_upload_base_path: '/uploads/content/'+(new Date()).getFullYear(),
            relative_urls                       : false,
            browser_spellcheck                  : true,
            remove_script_host                  : false,
            convert_urls                        : false,
            paste_convert_headers_to_strong     : false,
            paste_strip_class_attributes        : "all",
            paste_remove_styles                 : true,
            paste_remove                        : true,
            paste_remove_spans                  : true,
            paste_as_text                       : true,
            // filemanager_crossdomain: true,
            // fontsize_formats: '8px 10px 12px 14px 18px 24px 28px 30px 36px',
            external_filemanager_path:"/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "/admin-assets/tinymce/plugins/filemanager/plugin.min.js"}
        })
    }

    if ($('.textarea-simple').length > 0) {
        $('.textarea-simple').tinymce({
            theme: "modern",
            plugins: ["advlist autolink link lists charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking spellchecker"],
            height: 400,
            language: 'ru',
            toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
            // images_upload_url: '/upload.php',
            // images_upload_base_path: '/uploads/content/'+(new Date()).getFullYear(),
            relative_urls                       : false,
            browser_spellcheck                  : true,
            remove_script_host                  : false,
            convert_urls                        : false,
            paste_convert_headers_to_strong     : false,
            paste_strip_class_attributes        : "all",
            paste_remove_styles                 : true,
            paste_remove                        : true,
            paste_remove_spans                  : true,
            paste_as_text                       : true,
            // filemanager_crossdomain: true,
            // fontsize_formats: '8px 10px 12px 14px 18px 24px 28px 30px 36px',
            // external_filemanager_path:"/filemanager/",
            // filemanager_title:"Responsive Filemanager" ,
            // external_plugins: { "filemanager" : "/admin-assets/tinymce/plugins/filemanager/plugin.min.js"},
        })
    }

	  if ($('.datepicker').length > 0) {
		  $('.datepicker').datepicker({
			    format: "yyyy-mm-dd",
			    language: "ru",
			    autoclose: true,
			    todayHighlight: true
			});
	  }

	  if ($('.number_format').length > 0) {
	    $('.number_format').number( true, 2, '.', ' ');
	  }

	  // Permission SelecetAll and Deselectall buttons

    $('.select-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })

    $('.select2').select2()

    $('.treeview').each(function () {
        var shouldExpand = false
        $(this).find('li').each(function () {
            if ($(this).hasClass('active')) {
                shouldExpand = true
            }
        })
        if (shouldExpand) {
            $(this).addClass('active')
        }
    })

});
