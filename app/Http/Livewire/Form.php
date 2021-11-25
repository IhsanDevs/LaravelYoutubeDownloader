<?php

namespace App\Http\Livewire;

use App\Rules\youtube;
use Livewire\Component;
use YouTube\Exception\YouTubeException;
use YouTube\YouTubeDownloader;

class Form extends Component
{
    public $videoId, $description, $title, $videoLinks = [], $otherLinks = [], $audioLinks, $url = null, $data = [];
    protected $listeners = ['download'];
    protected $rules = [
        'url' => [
            'required',
            'url',
            'regex:/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/'
        ]
    ];
    public function download()
    {
        try {
            $this->reset([
                'videoId', 'description', 'title', 'videoLinks', 'otherLinks', 'audioLinks', 'data'
            ]);
            $this->validate();
            $youtube = new YouTubeDownloader;
            $getVideoInfo = $youtube->getDownloadLinks($this->url);

            $this->videoId = $getVideoInfo->getInfo()->getId();
            $this->description = $getVideoInfo->getInfo()->getShortDescription();
            $this->title = $getVideoInfo->getInfo()->getTitle();
            $this->otherLinks = $getVideoInfo->getAllFormats();
            // dd($this->otherLinks);
            $videos = $getVideoInfo->getCombinedFormats();
            foreach ($videos as $video) {
                if (strpos($video->mimeType, 'avc1') !== false) {
                    array_push($this->videoLinks, $video);
                }
            }
            $this->audioLinks = $getVideoInfo->getAudioFormats();
            // dd($this->audioLinks);
            $this->data = [
                'title' => $this->title,
                'description' => $this->description,
                'videoId' => $this->videoId,
                'videos' => $this->videoLinks,
                'audios' => $getVideoInfo->getAudioFormats()
            ];
            session()->flash('message', 'Successfully to get video information.');

            return view('index');
        } catch (YouTubeException $e) {
            session()->flash('error', empty($e->getMessage()) ? 'Failure to get video data.Please check the link you entered.' : $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.form');
    }
}