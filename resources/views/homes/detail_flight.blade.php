@extends('layouts.app')
@section('content')
<style>
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}


.btns {
	display: inline-block;
	padding: 9px 12px;
	padding-top: 7px;
	margin-bottom: 0;
	font-size: 14px;
	line-height: 20px;
	color: #5e5e5e;
	text-align: center;
	vertical-align: middle;
	cursor: pointer;
	background-color: #d1dade;
	-webkit-border-radius: 3px;
	-webkit-border-radius: 3px;
	-webkit-border-radius: 3px;
	background-image: none !important;
	border: none;
	text-shadow: none;
	box-shadow: none;
	transition: all 0.12s linear 0s !important;
	font: 14px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;
}
.btn-cons {
	margin-right: 5px;
	min-width: 120px;
	margin-bottom: 8px;
}
.btn-warning {
	color: #fff;
	background-color: #f0ad4e;
	border-color: #eea236;
}

.detail_maskapai img{
	float: left;
}
.detail_maskapai .code{
	font-size: 12pt;
	font-weight: bold;
	position: relative;
	top: 11px;
	left: 39px;
}
.time_maskapai{
	margin-top: 30px;
}
.time_maskapai .time_detail{
	margin-bottom: 10px;
}
.time_name_to .time_detail{
	margin-top: 30px;
}
.time_name_to .time_detail2{
	margin-top: 12px;
}
.time_name_to .fa{
	color: #ff0000;
}
.form-control{
	border-radius: 0 !important;
}
</style>
<div class="banner"></div>
 <div class="clearfix"></div>
 <br />
<div class="container">
	<div class="col-md-8">
		<div class="w3layouts-agileits">
			<div class="w3layoutscontactagileits">
				<div class="stepwizard">
					<div class="stepwizard-row setup-panel">
					  <div class="stepwizard-step">
						<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
						<p>Data Pesanan</p>
					  </div>
					  <div class="stepwizard-step">
						<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
						<p>Data Kontak</p>
					  </div>
					  <div class="stepwizard-step">
						<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
						<p>Step 3</p>
					  </div>
					</div>
				</div>
			  
					<div class="row setup-content" id="step-1">
					  <div class="">
						<div class="col-md-12">
						  <br />
						  <div class="detail_maskapai">
							<img src="{{ asset($data->Pesawat->image)}}" class="img-responsive" style="width: 13% !important;">
							<div class="code">
							{{ $data->Pesawat->name}}
							{{ $data->Pesawat->seat_number}}
							({{ Carbon\Carbon::parse($data->date_go)->format('D M Y') }})
							</div>
						  <div class="clearfix"></div>
							<div class="col-md-2 time_maskapai">
								<div class="time_detail">
									{{ $data->time_go }}
								</div>
								<div class="time_detail">
									{{ $data->transit }}
								</div>
							</div>
							<div class="col-md-10 time_name_to">
								<div class="time_detail">
									<i class="fa fa-circle-o"></i> {{ $data->Provincies->name }}
								</div>
								<div class="time_detail2">
									<i class="fa fa-circle"></i> {{ $data->Provincies2->name }}
								</div>
							</div>
						  </div>
						  <br />
						  <div class="clearfix"></div>
							<button class="btns btn-warning btn-cons pull-right nextBtn" type="button">Next</button>
						</div>
					  </div>
					</div>
					<div class="row setup-content" id="step-2">
					  <div class="">
						<div class="col-md-12">
							{{ method_field('post') }}
							{!! Form::open([ 'class' => 'form-horizontal','method' => 'POST','files' => true, 'id' => 'form_fight']) !!}
							{{ csrf_field() }}
								<input type="hidden" value="{{ $data->go_away}}" name="form">
								<input type="hidden" value="{{ $data->tujuan}}" name="to">
								<input type="hidden" value="{{ $data->date_go}}" name="date_on">
								<input type="hidden" value="1" name="adults">
								<input type="hidden" value="step-2" name="steps">
								  <div class="form-group">
										<label class="control-label">Name</label>
										<input maxlength="200" required="required" class="form-control" name="name" placeholder="Enter Name" type="text">
									
								  </div>
								  <div class="form-group">
									<label class="control-label">Email</label>
									<input maxlength="200" required="required" class="form-control" name="email" placeholder="Enter Email" type="text">
								  </div>
								  <div class="form-group">
									<label class="control-label">Phone</label>
									<input maxlength="200" required="required" class="form-control" name="phone" placeholder="Enter phone" type="text">
								  </div>
								  <button class="btns btn-warning prevBtn pull-left" type="button">Previous</button>
								  <button type="submit" class="btns btn-warning btn-cons pull-right" type="button">Next</button>
							{!! Form::close() !!}
						</div>
					  </div>
					</div>
					<div class="row setup-content" id="step-3">
					  <div class="">
						<div class="col-md-12">
						  <h3> Step 3</h3>
						  <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
						  <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
						</div>
					  </div>
					</div>
				
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Rincian Biaya</div>
			<div class="panel-body">
				<div class="detail_rincian">
					<span class="col-sm-4 col-form-label">{{ $data->Pesawat->name}}</span>
					<div class="col-sm-8">Rp. {{ number_format($data->price, 2) }}</div>
					<span class="col-sm-4 col-form-label">Bagasi</span>
					<div class="col-sm-8">{{ $seat_stock }}</div>
					<?php
						$jml		= 0;
	//					$jml		= $data->price + $seat_stock;
						$jml		= ((int)$data->price * (int)$seat_stock);;
					?>
					<div class="clearfix"></div>
					<hr />
					<span class="col-sm-4 col-form-label">Total</span>
					<div class="col-sm-8">Rp. {{ number_format($jml, 2) }}</div>
				</div>
					<div class="clearfix"></div>
				<p>* Harga ini masih bisa berubah, harga final maskapai akan dikonfirmasi kembali pada proses pembayaran </p>
			</div>
		</div>
	</div>
</div>
@include('includes/footer')
<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn'),
          allNextBtn1 = $('.nextBtn1'),
  		  allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });
  
  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepWizard.removeAttr('disabled').trigger('click');
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });


  $('div.setup-panel div a.btn-primary').trigger('click');
});
$("form#form_fight").submit(function(event){
	event.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: "{{ url('/submit-booking-fight') }}",
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
				buttonneex();
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

function buttonneex()
{
	var id		= 'step-2';
	var curStep = $(this).closest(".setup-content"),
          curStepBtn = id
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;
      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
	
}
</script>
@endsection