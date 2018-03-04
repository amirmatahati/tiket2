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
						<input type="hidden" name="gallery_file">
						@include('admin.pesawat.form')
						
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
			url : '{{ url("/edit-pesawat")}}/' + id,
			type: "get",
			dataType: "JSON",
			success: function(data)
			{
				/*
				tinymce.get('post_text').setContent(data.post_text);
				*/
				$('[name="id"]').val(data.id);

				$('[name="name"]').val(data.name);
				$('[name="seat"]').val(data.seat_number);
				
				$('#editModal').modal('show'); 
				$('.modal-title').text('Edit '+data.title); 
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
			url: "{{ url('/update-pesawat') }}/"+id,
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
					
					$('.item' + data.id).replaceWith('<tr class="item' + data.id +'"><td class="col1">'+ data.id +'</td><td>'+ data.name +'</td><td>'+ data.seat_number +'</td><td><a class="btn-sm btn-success" href="javascript:void(0)" onclick="edit_data('+ data.id +')" title="Edit"><i class="fa fa-pencil-square-o"></i></a><a href="javascript:void(0)" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Delete Article" onclick="delete_data('+ data.id +')")"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>');
					
					
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