<div class="row">
    <div class="col col-12 d-flex justify-content-center">
        @if (session()->has('message'))
            <a class="btn btn-success btn-sm" wire:click='$refresh' role="button">Download
                again</a>
        @else
            <form wire:submit.prevent='download' class="container-fluid">
                <div class="input-group"><span class="text-primary input-group-text"
                        style="background: rgb(228,228,228);"><i class="fa fa-link"></i></span>
                    <input
                        class="form-control @error('url')
                        is-invalid
                    @enderror"
                        type="text" wire:model="url" autocomplete="off"
                        placeholder="https://www.youtube.com/watch?v=xxxxx"><button class="btn btn-primary" type="submit"
                        wire:click='download'><i class="fa fa-download"></i></button>
                </div>

                @error('url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="m-auto mt-4 mb-2 col d-flex justify-content-center col-12">
                    <div wire:loading wire:target='download'>
                        <livewire:loading />
                    </div>
                </div>
            </form>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="mt-2 col col-12">
            <div class="alert alert-success alert-dismissible" role="alert"><button class="btn-close" type="button"
                    data-bs-dismiss="alert" aria-label="Close"></button><span>{{ session('message') }}</span></div>
        </div>


        <div class="mt-4 row">
            <div class="col col-6"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer"><img
                        class="img-fluid"
                        src="https://i.ytimg.com/vi_webp/{{ $videoId }}/sddefault.webp" /></a>
            </div>
            <div class="col col-6">
                <ul class="list-unstyled">
                    <li><strong>Title: </strong>{{ $title }}</li>
                    {{-- <li><strong>Desc:  </strong>{{ $description }}</li> --}}
                </ul>
                <div class="table-responsive table-sm">
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <caption class="caption-top">Swipe right if you use a mobile device.</caption>
                        <thead>
                            <tr>
                                <th>Mime Type</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videoLinks as $video)
                                <tr>
                                    <td><i class="fa fa-video-camera" aria-hidden="true"></i>
                                        {{ $video->mimeType }}
                                    </td>
                                    <td><a href="{{ $video->url }}" target="_blank" rel="noopener noreferrer"><i
                                                class="fa fa-download" aria-hidden="true"></i> Download</a></td>
                                </tr>
                            @endforeach

                            @foreach ($audioLinks as $audio)
                                <tr>
                                    <td><i class="fa fa-volume-up" aria-hidden="true"></i>
                                        {{ $audio->mimeType }}
                                    </td>
                                    <td><a href="{{ $audio->url }}" target="_blank" rel="noopener noreferrer"><i
                                                class="fa fa-download" aria-hidden="true"></i> Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        @elseif (session()->has('error'))
            <div class="mt-2 col col-12">
                <div class="alert alert-danger alert-dismissible" role="alert"><button class="btn-close"
                        type="button" data-bs-dismiss="alert"
                        aria-label="Close"></button><span>{{ session('error') }}</span></div>
            </div>
            <div class="mt-4 text-center row" style="height: 9rem !important;">
                <div class="col d-flex justify-content-center align-items-center" style="background: #eeeeee;">
                    <h1 class="text-black-50">There is no data here <i class="fa fa-frown-o" aria-hidden="true"></i>
                    </h1>
                </div>
            </div>
        @else
            <div class="mt-4 text-center row" style="height: 9rem !important;">
                <div class="col d-flex justify-content-center align-items-center" style="background: #eeeeee;">
                    <h1 class="text-black-50">There is no data here <i class="fa fa-frown-o" aria-hidden="true"></i>
                    </h1>
                </div>
            </div>
    @endif
</div>
