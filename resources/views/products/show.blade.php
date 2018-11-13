@extends('layouts.app')

@section('title', 'Bienvenido a App shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="wrapper">
    
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Your Story Starts With Us.</h1>
          <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Watch video
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      

      <div class="section text-center">
        <h2 class="title">{!! $product->name !!}</h2>
        <div class="team">
          <div class="row">

          
            {{-- <div class="card mb-3">
              <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div> --}}
            
            
            {{-- <div class="col-md-4"> --}}
              <div class="team-player">
                <div class="card card-plain">
                  <div class="profile">
                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">
                    <a href="{{ url('/products/'. $product->id) }}">{!! $product->name !!}</a>
                    <br>
                    <small class="card-description text-muted">{!! $product->category->name !!}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{!! $product->long_description !!}</p>
                  </div>
                  
                </div>
              </div>

                           
            {{-- </div>     --}}
                        
          </div>

          <div class="row">
            @foreach ($images as $image)
              <div class="col-md-4"> 
              <div class="team-player">
                <div class="card card-plain">
                  <div class="profile">
                    <img src="{{ $image->url }}" alt="Thumbnail Image" class="img-raised img-fluid">
                  </div>                                   
                </div>
              </div>
              </div>
              @endforeach
          </div>

        </div>
      </div>
      
    </div>
  </div>
  
  @include('includes.footer')
  
</div>
@endsection

