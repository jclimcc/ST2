@extends('front.layout.layout')
@section('head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
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
                <div class="container pb-5 ">

					<div class="row gutter-40 col-mb-80">
						<!-- Postcontent
						============================================= -->
						<div class="postcontent col-lg-6">               
                            <livewire:front.page.contactus-form/>	
                        </div> <!-- .Postcontent end -->
                        <!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-6">

                            <img data-animate="fadeInRight" src="{{ url('images/contactus/shengtai-kl-head.jpg')}}" alt="KL Headquarter" class="fadeInLeft animated">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    103, block A , phileo Damansara II,<br>
                                    No.15 , jalan PJU 16/11 , 46350 Petaling Jaya,<br>
                                    Selangor Darul Ehsan, Malaysia<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> +6011 3737 3399<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@shengtaiinternational.com
                           

						</div><!-- .sidebar end -->
					</div>

				</div>

                	<!-- Google Map
		============================================= -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.876893824593!2d101.64062122112665!3d3.127233746899398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc496ea1400001%3A0x63a2aa1fcef5032!2sSheng%20Tai%20International%20Sdn%20Bhd!5e0!3m2!1sen!2smy!4v1680503450040!5m2!1sen!2smy" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


                <div class="content-wrap ">
                    <div class="container">
                        <div class="container clearfix">

                            <div class="row col-mb-50">
                                <div class="col-md-4">
                                    <div class="feature-box media-box">
                                        <div class="fbox-media" style="width: 408px;height: 255px;overflow: hidden;">
                                            <img src="{{ url('images/contactus/shengtai-hk.jpg')}}" alt="Hong kong Sheng Tai Sales office">
                                        </div>
                                        <div class="fbox-content px-0">
                                            <h3>Hong Kong Sales Office<span class="subtitle">Hong Kong</span></h3>
                                            <p>9/F, Ashley Nine ,9-11 Ashley road ,<br>
                                                Tsim Sha Tsui, Hong Kong<br>
                                                Tel: <strong>+852 3563 8905</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="feature-box media-box flex-column">
                                        <div class="fbox-media" style="width: 408px;height: 255px;overflow: hidden;">
                                            <img src="{{ url('images/contactus/shengtai-sh.jpg')}}" alt="Shang hai Sheng tai sales office">
                                        </div>
                                        <div class="fbox-content px-0">
                                            <h3>Shanghai Sales Office<span class="subtitle">China</span></h3>
                                            <p>Unit 1805, 18/F tower 1, jing’an Kerry center,<br>
                                                1515 west nanjing road , shanghai 200040 PRC<br>
                                                Tsim Sha Tsui, Hong Kong<br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="feature-box media-box flex-column">
                                        <div class="fbox-media" style="width: 408px;height: 255px;overflow: hidden;">
                                            <img src="{{ url('images/contactus/shengtai-jp.jpg')}}" alt="Japan Sheng Tai sales office">
                                        </div>
                                        <div class="fbox-content px-0">
                                            <h3>Japan Sales Office<span class="subtitle">Japan</span></h3>
                                            <p>Tsuyuki Bld,5F ,8-11-3, Ginza ,<br>
                                                chuo ku, Tokyo To, 104-0061,Japan<br>
                                                Website: <a href="http://shengtai-japan.com/">http://shengtai-japan.com/</a> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-box media-box flex-column">
                                        <div class="fbox-media" style="width: 408px;height: 255px;overflow: hidden;">
                                            <img src="{{ url('images/contactus/shengtai-bj.jpg')}}" alt="Beijing Sheng Tai Sales Office">
                                        </div>
                                        <div class="fbox-content px-0">
                                            <h3>Sheng Tai Group (BJ) Limited<span class="subtitle">China</span></h3>
                                            <p>T506, 5th Floor, Hopson Fortune Plaze,<br>
                                                23 Xidawang Road, Chaoyang District, <br>
                                                Beijing<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-box media-box flex-column">
                                        <div class="fbox-media" style="width: 408px;height: 255px;overflow: hidden;">
                                            <img src="{{ url('images/contactus/shengtai-hk-osc.jpg')}}" alt="Sheng Tai Hongkong OSC office">
                                        </div>
                                        <div class="fbox-content px-0">
                                            <h3>Hong Kong OSC<span class="subtitle">Hong Kong</span></h3>
                                            <p>8/F, Ashley Nine ,9-11 Ashley road,<br>
                                                Tsim Sha Tsui, Hong Kong<br>
                                                Tel: <strong>+852 3563 8905<strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
								
			</div>
		</section>
        

@endsection
@section('customjs')
@endsection