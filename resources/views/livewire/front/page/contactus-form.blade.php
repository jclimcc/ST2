<div>
    <div class="form-widget">
        <form wire:submit.prevent="submitForm">
            @csrf
            <div class="row">
                <div class="col-md-12 form-group">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" class="sm-form-control" wire:model.defer="name">
                        @error('name') <span>{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">   
                <div class="col-md-6 form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="sm-form-control" wire:model.defer="email">
                        @error('email') <span>{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="sm-form-control" wire:model.defer="phone">
                        @error('phone') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">  
                <div>
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" class="sm-form-control" wire:model.defer="subject">
                    @error('subject') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="message">Message</label>
                <textarea id="message" rows="5" class="sm-form-control" wire:model.defer="message"></textarea>
                @error('message') <span>{{ $message }}</span> @enderror
            </div>

            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" wire:model.defer="recaptcha"></div>
            @error('recaptcha') <span>{{ $message }}</span> @enderror

            <button type="submit" class="button button-3d m-0">Submit</button>
        </form>
    </div>
          
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
