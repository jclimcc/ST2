<div>


    <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fname">Full Name</label>
            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" wire:model.defer="fname">
            @error('fname') <span class="invalid-feedback">{{ $message }}</span> @enderror
           
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" wire:model.defer="email">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" wire:model.defer="phone">
            @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="career">Career</label>
            <input type="text" class="form-control" id="career_id" name="career_id" value='{{$career_title}}' disabled> 
        </div>

        <div class="form-group">
            <label for="cover_letter">Cover Letter</label>
            <textarea class="form-control @error('cover_letter') is-invalid @enderror" id="cover_letter" name="cover_letter" rows="5" wire:model.defer="cover_letter"></textarea>
            @error('cover_letter') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="cvfile">CV File (upload filesize below 2MB)</label>
            <input type="file" class="form-control-file @error('cvfile') is-invalid @enderror" id="cvfile" name="cvfile" wire:model="cvfile">
            @error('cvfile') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       
        @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mfp-hide" id="jobModal">
        <div class="block mx-auto" style="background-color: #FFF; max-width: 500px;">
            <div class="center" style="padding: 50px;">
                <h3 class='alert' id='reponse-head'>Successfully Submit </h3>
                <div class="mb-0 " id='reponse-content'>We will get back to you later! </div>
            </div>
            <div class="section center m-0" style="padding: 30px;">
                <a href="#" class="button" onClick="$.magnificPopup.close();return false;">Close</a>
            </div>
        </div>
    </div>
@section('customjs')
    <script>
    jQuery(document).ready( function($) {
    /** LIVEWIRE EVENT ACTIONS **/
    window.addEventListener('show-success-popup', event => {
        $.magnificPopup.open({
					items: {
						src: '#jobModal'
					},
					type: 'inline',
                    callbacks: {
                        close: function() {
                            location.reload();
                        }
                    }
                });
		});
	});
</script>
   
@endsection
</div>

