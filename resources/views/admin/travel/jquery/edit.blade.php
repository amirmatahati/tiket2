    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
					{{ method_field('post') }}
						{!! Form::model($data, ['method' => 'POST', 'files' => true,'class' => 'form-horizontal ', 'enctype' => 'multipart/form-data','id' => 'edit_gallery'])  !!}
						{{ csrf_field() }}
							{!! Form::hidden('id', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Slide Title','class' => 'form-control','id' => 'id')) !!}
						<input type="hidden" name="b_image">
						@include('admin.travel.form')
						
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success add" id="btnSave">
                            <span id="" class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
				{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
<script>
	/* edit gallery */
	

	function edit_data(id)
	{
		$('#edit_gallery')[0].reset(); 
		$('#category').val('');
		$('.form-group').removeClass('has-error'); 
		$('.help-block').empty(); 
		$('#btnSave').text('update');
		
		$.ajax({
			url : '{{ url("/travel-edit")}}/' + id,
			type: "get",
			dataType: "JSON",
			success: function(data)
			{
				/*
				tinymce.get('post_text').setContent(data.post_text);
				*/
				$('[name="id"]').val(data.id);

				$('[name="travel_title"]').val(data.travel_title);
				$('[name="travel_text"]').val(data.travel_text);
				$('[name="b_image"]').val(data.travel_image);
				$('#technig').val(data.travel_text);
				
//				$('#technig').ckeditor();
				$('#editModal').modal('show'); 
				$('.modal-title').text('Edit '+data.travel_title); 
				 $('#btnSave').text('Edit');
				
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		
		});	
			$.get('get-videoscat/'+id,function(data){	
				$('select[name="category_video"]').empty();
				$('select[name="category_video"]').append(data);
	
			});
	}
	
$("form#edit_gallery").submit(function(event){
		event.preventDefault();
		var id	= $("#id").val();
		$('#btnSave').text('Update'); //change button text
		$('#btnSave').text('update..'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable

		var formData = new FormData($(this)[0]);
		  $.ajax({
			url: "{{ url('/travel-update') }}/"+id,
			type: 'POST',
			data: formData,
			async: true,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
			 success: function(data)
				{
					toastr.success('Successfully updated Video!', 'Success Alert', {timeOut: 5000});
					
					
					$('.item' + data.id).replaceWith('<ul class="thumbnail y_video"><a class="various fancybox fancybox.iframe" data-fancybox-type="iframe" href="../public/'+ data.travel_image +' " rel="gallery" title="'+ data.travel_title +'"><img src="../public/'+data.travel_image +'"  align="center" alt="" class="videoy"></a><div class="caption">'+ data.travel_title +'</div><a href="javascript:void(0)" onclick="edit_data('+ data.id +')" class="btn-sm btn-danger pull-right" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a><a href="#" class="btn-sm btn-info pull-right" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Delete Article" onclick="return confirm("Apakah Anda yakin menghapus video ini?")" style="margin-right: 4px;">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></a></ul>');
					
					$('#editModal').modal('toggle');

					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 


				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				}
		  });
	 
	  return false;
	});
</script>