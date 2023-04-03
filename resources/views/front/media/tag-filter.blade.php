@extends('front.layout.layout')
@section('customcss')
	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->

<style>

</style>
@endsection

@section('content')

<!-- Slider
		============================================= -->
	
    
    <livewire:front.page.hero-image :pageURL="$pageURL" />
    <!-- #slider end -->
   
		<livewire:front.page.breadcrump-post  :tag="$tag ?$tag->toArray()  : null"   />	
<!-- Content
		============================================= -->
    
		<section id="content" >
			<div class="content-wrap pt-0">
        
        		<livewire:front.page.media-tag-filter  :tag="$tag" />
     
			</div>
		</section>
@endsection
@section('customjs')
@endsection