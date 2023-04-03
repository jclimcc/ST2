<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;
use Google_Client;
use Google_Service_YouTube;

class VideoPage extends Component
{
    use WithPagination;
    protected $videos;
    public $videothumbnails;

    public function mount(){
      
        $this->loadVideo();
       
     
    }
    public function hydrate(){
        $this->loadVideo();
    }

    protected function loadVideo(){      
      

        $this->videos = Video::where('status',1)->orderBy('created_at', 'desc')->paginate(6);
        $videoIds = $this->videos->pluck('video')->toArray();

        $videothumbnails = array();
        $client = new Google_Client();
        $client->setDeveloperKey('AIzaSyDbOznl6wbsjq9PVPDBzt9Ao02FalyBK80');
       
        $youtube = new Google_Service_YouTube($client);
         
           // Retrieve the video thumbnails
        foreach ($videoIds as $videoId) {
            $video = $youtube->videos->listVideos('snippet', array('id' => $videoId))[0];
           
            $videothumbnails[$videoId] = ['image'=>$video->snippet->thumbnails->medium->url,
                                    'title'=>$video->snippet->title];
        }
      
        $this->videothumbnails= $videothumbnails;
    }
    public function render()
    {
        return view('livewire.front.page.video-page',['videos'=>$this->videos,'videothumbnails'=>$this->videothumbnails]);
    }
}
