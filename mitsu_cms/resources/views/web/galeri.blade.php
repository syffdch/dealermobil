@extends('layouts.web')

@section('title', 'Galeri')

@section('content')


<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Galeri</h1>
    </div>

</section><!-- #page-title end -->

<div class="section m-0 bg-transparent clearfix" style="padding: 100px 0;">
    <div class="container">
        <div class="row">
            @foreach ($galeri as $aa)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="{{ asset('galeri/'.$aa->foto) }}" alt="Card image cap" style="object-fit: cover; width: 100%; height: 300px;">
                    <div class="card-body">
                        <h4 class="mb-2 font-weight-semibold text-uppercase"><a class="text-dark" href="">{{ $aa->judul }}</a></h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <ul class="pagination mt-1 mb-0 clearfix">
            {{ $galeri->links() }}
        </ul>
    </div>
</div>
@endsection