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
                                 
           
            {{-- <div class="col-md-4"> --}}
              <div class="team-player">
                <div class="card card-plain">
                  <div class="profile">
                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid img-responsive" width="300">
                  </div>
            
                  <h4 class="card-title">
                    <a href="{{ url('/products/'. $product->id) }}">{!! $product->name !!}</a>
                    <br>
                    <small class="card-description text-muted">{!! $product->category->name !!}</small>
                  </h4>

                   @if (session('notifications'))
                    <div class="alert alert-success">
                        {{ session('notifications') }}
                    </div>
                  @endif

                  <div class="card-body">
                    <p class="card-description">{!! $product->long_description !!}</p>
                  </div>
                                    
                </div>
                {{-- @if (Auth::check()) --}}
                <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddTocart">
                    <i class="material-icons">add</i> Añadir al carrito de compras
                  </button>
                {{-- @endif --}}
              </div>

                           
            {{-- </div>     --}}
                        
          </div>

          <div class="row">
            @foreach ($images as $image)
              <div class="col-md-4"> 
              <div class="team-player">
                <div class="card card-plain">
                  <div class="profile">
                    <img src="{{ $image->url }}" alt="Thumbnail Image" class="img-raised img-fluid img-responsive"  width="250">
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

<!-- Modal -->
@if (Auth::check())
<div class="modal fade" id="modalAddTocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad que desea agegar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/cart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-body">
          <input type="number" name="quantity" value="1" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info btn-link">Añadir al carrito</button>
        </div>
      </form>
    </div>
  </div>
</div>
@else
<div class="modal fade" id="modalAddTocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad que desea agegar</h5> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          <p>Primero tienes que loggearte
          </p>
        </div>
      
    </div>
  </div>
</div>
@endif

@endsection


