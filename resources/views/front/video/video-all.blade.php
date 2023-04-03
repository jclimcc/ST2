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
			<div class="content-wrap pt-0">

        <livewire:front.page.video-page />			
			</div>
		</section>
@endsection
@section('customjs')
@endsection