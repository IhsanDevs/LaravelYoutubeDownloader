@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col col-12">
            <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="slider">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img class="w-100 d-block" src="/assets/img/slider/easy.gif"
                            alt="Slide Image"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/slider/noAds.gif"
                            alt="Slide Image"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/slider/noAccount.gif"
                            alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev"><span
                            class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                        class="carousel-control-next" href="#slider" role="button" data-bs-slide="next"><span
                            class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
                </div>
            </div>
        </div>
        <div class="col col-12">
            <p class="mt-4 text-center lead text-muted" style="font-size: 20px;">Download YouTube videos in MP4 and
                MP3 formats easily without ads and for free.&nbsp;Enter your youtube video link and choose the
                format you want.</p>
        </div>
        <div class="mb-5 col d-flex justify-content-center col-12"><a class="btn btn-outline-info" role="button"
                href="https://trakteer.id/ihsan.devs" target="_blank"><i class="fa fa-money"></i>&nbsp;Support
                Me</a></div>
    </div>
    <livewire:form />
@endsection
