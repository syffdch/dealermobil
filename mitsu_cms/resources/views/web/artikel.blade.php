@extends('layouts.web')

@section('title', 'Artikel')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>News Feeds</h1>
    </div>

</section><!-- #page-title end -->

<div class="section m-0 bg-transparent clearfix" style="padding: 100px 0;">
    <div class="container">
        <div class="row">
            @foreach ($artikel as $berita)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="{{ asset('artikel/gambar/'.$berita->gambar) }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="mb-2 font-weight-semibold text-uppercase"><a class="text-dark" href="">{{ $berita->judul }}</a></h4>
                        <a class="card-link">{{ $berita->user_id }}</a>
                        <a class="card-link">{{ $berita->tanggal }}</a>
                        <p class="card-text my-3">{{ $berita->deskripsi }}</p>
                        <a href="" class="button button-3d button-rounded nott font-weight-semibold ls0 m-0">Continue reading..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <ul class="pagination mt-1 mb-0 clearfix">
            {{ $artikel->links() }}
        </ul>
    </div>
</div>
@endsection
