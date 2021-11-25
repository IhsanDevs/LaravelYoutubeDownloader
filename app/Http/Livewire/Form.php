<?php

namespace App\Http\Livewire;

use App\Rules\youtube;
use Livewire\Component;
use YouTube\Exception\YouTubeException;
use YouTube\YouTubeDownloader;

class Form extends Component
{
    public $videoId, $description, $title, $videoLinks = [], $audioLinks, $url = null, $data = [];
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
            $this->validate();
            $getVideoInfo = new YouTubeDownloader;

            $getVideoInfo = $getVideoInfo->getDownloadLinks($this->url);

            $this->videoId = $getVideoInfo->getInfo()->getId();
            $this->description = $getVideoInfo->getInfo()->getShortDescription();
            $this->title = $getVideoInfo->getInfo()->getTitle();
            $videos = $getVideoInfo->getCombinedFormats();
            foreach ($videos as $video) {
                if (strpos($video->mimeType, 'avc1') !== false) {
                    $this->videoLinks += [
                        $video
                    ];
                }
            }
            $this->audioLinks = $getVideoInfo->getAudioFormats();
            // dd($this->videoLinks);
            $this->data = [
                'title' => $this->title,
                'description' => $this->description,
                'videoId' => $this->videoId,
                'videos' => $this->videoLinks,
                'audios' => $getVideoInfo->getAudioFormats()
            ];
            // dd($this->data);
            session()->flash('message', 'Successfully to get video information.');
            return view('index');
            // return redirect()->route('index');
        } catch (YouTubeException $e) {
            session()->flash('error', empty($e->getMessage()) ? 'Failure to get video data.Please check the link you entered.' : $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.form');
    }

    protected function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        // $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}