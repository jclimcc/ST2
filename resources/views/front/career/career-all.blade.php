@extends('front.layout.layout')
@section('customcss')
<style>
</style>
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
					
				<div class="accordion" id="accordionExample">
					@foreach($careers as $job)
					<div class="accordion-item title-block" style="padding-left:0px">
						<h2 class="mb-0 fw-bold" id="heading{{ $loop->index }} ">
						  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapseOne{{ $loop->index }}">
							{{$job->title}} {{$job->location}}
						  </button>
						</h2>
						<div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
						  <div class="accordion-body px-5">
							

									{!! $job->description !!}
									<a href="{{ $job->the_permalink()}}" class="button button-desc button-3d button-rounded button-green center">Apply for this Job<span>{{$job->title}}</span></a>
									
								
							
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
				</div>

			</div>
		</section>
@endsection
@section('customjs')
@endsection