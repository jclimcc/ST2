@extends('front.layout.layout')
@section('customcss')

@endsection

@section('content')

<!-- Slider
		============================================= -->
	
    
    <livewire:front.page.hero-image :pageURL="$pageURL" />
    <!-- #slider end -->
			

<!-- Content
		============================================= -->
		<section id="content" >
			<div class="content-wrap ">
				<div class="container ">
					<div class="row col-mb-50">
						<div class="col-lg-7">
							<div class="fancy-title title-bottom-border">
								<h3>{{ $career->title }}</h3>
							</div>

							<div class="">
								{!! $career->description !!}
							</div>
							
					
						</div>

						<div class="col-lg-5">
							<div id="job-apply" class="heading-block">
								<h2>Apply Now</h2>
								<span>And we'll get back to you within 48 hours.</span>
							</div>

							<div class="form-widget">
								<livewire:front.page.career-apply-job :career_id='$career->id' :career_title='$career->title'/>	
								{{-- <form action="{{ url('career/jobapplicant/store') }}" class="row mb-0" id="template-jobform" method="post" enctype="multipart/form-data">
									@csrf
								
									<div class="col-12 form-group">
										<label for="fname">First Name <small>*</small></label>
										<input type="text" id="fname" name="fname" value="{{ old('fname') }}" class="required sm-form-control" />
									</div>
								
									<div class="col-12 form-group">
										<label for="email">Email <small>*</small></label>
										<input type="email" id="email" name="email" value="{{ old('email') }}" class="required email sm-form-control" />
									</div>
									<div class="col-12 form-group">
										<label for="phone">phone <small>*</small></label>
										<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number">
										@if ($errors->has('phone'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
									</div>
								
									<div class="col-12 form-group">
										<label for="career">Applied <small>*</small></label>
										<input type="text" disabled id="career" value="{{$career->title}}" class="sm-form-control" />
										<input type="hidden" name="career_id" value="{{$career->id}}" />
									</div>
									<div class="col-12 form-group">
										<label for="cover_letter">Cover Letter <small>*</small></label>
										<textarea id="cover_letter" name="cover_letter" rows="4" cols="50" class="required sm-form-control">{{ old('cover_letter') }}</textarea>
									</div>
								
									<div class="col-12 form-group">
										<label for="cvfile">Upload CV <small>*</small></label>
										<input type="file" id="cvfile" name="cvfile" value="" class="required sm-form-control" />
									</div>
								
									<button type="submit" class="btn btn-primary">Submit</button>
								
									
								
								</form>
								 --}}
							</div>
						</div>

					</div>
				
				</div>

			</div>
		</section>

		


@endsection


{{-- @section('customjs')
<script>
	$(document).ready(function() {

    $('#template-jobform').on('submit', function(e) {
        e.preventDefault(); // prevent the form from submitting normally

        $.ajax({
            url: $(this).attr('action'), // get the URL from the form action attribute
            method: 'POST',
            data: new FormData(this), // get the form data using FormData
    		dataType: "json",
            processData: false,
            contentType: false,
			success: function(response) {
				// Display success message to the user
				console.log(response);
				if(response.status=='success')
				{

					$('#jobModal h3#reponse-head').text('Job Application');
					$('#jobModal #reponse-content').html(response.message);
					$('#jobModal #reponse-content').css('color','');
					$.magnificPopup.open({
					items: {
						src: '#jobModal'
					},
					type: 'inline'
					});
				}
				else {
					
					$('#jobModal h3#reponse-head').text('Job Application');
					$('#jobModal #reponse-content').css('color','red');
					$.magnificPopup.open({
					items: {
						src: '#jobModal'
					},
					type: 'inline'
					});
					var errors = response.errors;
					$.each(errors, function(key, value){
						// highlight the input field with the error
						$('#' + key).addClass('is-invalid');
						// display the error message
						$('#' + key + '-error').text(value);

					});

					var errorList = '';
					$.each(response.errors, function(key, value) {
						errorList += value + '<br>';
					});
					errorList += '';
					$('#jobModal #reponse-content').html(errorList);
				}
				
			},
			error: function(xhr, textStatus, errorThrown) {
				// Display error message to the user
				console.log(xhr);
				console.log(textStatus);
				console.log(errorThrown);
			}
        });
    });
});
</script>




@endsection --}}