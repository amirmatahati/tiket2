
<script>
	/* edit gallery */
	
	function delete_data(id)
	{
		$('#edit_gallery')[0].reset(); 
		$('#category').val('');
		$('.form-group').removeClass('has-error'); 
		$('.help-block').empty(); 
		$('#btnSave').text('update');
		
		$.ajax({
			url : '{{ url("/delete-pesawat")}}/' + id,
			type: "get",
			dataType: "JSON",
			success: function(data)
			{
				toastr.success('Successfully Delete Data!', 'Success Alert', {timeOut: 5000});
				$('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		
		});	
	}
</script>