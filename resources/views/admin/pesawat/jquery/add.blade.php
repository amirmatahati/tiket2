<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
				{{ method_field('post') }}
						{!! Form::open([ 'class' => 'form-horizontal','method' => 'POST','files' => true, 'id' => 'videos']) !!}
						{{ csrf_field() }}
						
						@include('admin.pesawat.form')
                   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success add" id="btnSave">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
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

<!-- ***** -->
<script>
$("form#videos").submit(function(event){
		event.preventDefault();
		var formData = new FormData($(this)[0]);
		$('#btnSave').text('saving...');
		$('#btnSave').attr('disabled',true);
		$.ajax({
			url: "{{ url('/save-pesawat') }}",
			type: 'POST',
			data: formData,
			async: true,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data)
			{
				toastr.success('Successfully Added Video!', 'Success Alert', {timeOut: 5000});
				$('#tabs').prepend('<tr class="item' + data.id +'"><td class="col1">'+ data.id +'</td><td>'+ data.name +'</td><td>'+ data.seat_number +'</td><td><a class="btn-sm btn-success" href="javascript:void(0)" onclick="edit_data('+ data.id +')" title="Edit"><i class="fa fa-pencil-square-o"></i></a><a href="javascript:void(0)" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Delete Article" onclick="delete_data('+ data.id +')")"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>');

				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable
				$('#addModal').modal('toggle');
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