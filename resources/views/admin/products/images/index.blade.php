@extends('layouts.app')

@section('title', 'Imagenes de productos')

@section('body-class', 'product-page sidebar-collapse')

@section('content')
<div class="wrapper">
    
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
    
  </div>
  <div class="main main-raised">
    <div class="container">
      
    <div class="section text-center">
        <h2 class="title">Imagenes del producto "{{ $product->name }}"</h2>
        <div class="team">
          <div class="row">

            <form action="" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="file" name="photo" id="" required>
              <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
              <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
            </form>

            <div class="row">
            @foreach ($images as $image)
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <img src="{{ $image->url }}" width="240">
                    <form action="" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <input type="hidden" name="image_id" value="{{ $image->id }}">
                      <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                      @if ($image->featured)
                        <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round">
                          <i class="material-icons">favorite</i>
                        </button>
                      @else
                        <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                          <i class="material-icons">favorite</i>
                        </a>    
                      @endif
                      
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
            </div>            
                                    
          </div>
        </div>
      </div>
      
      
    </div>

  </div>

  @include('includes.footer')
  
</div>
@endsection

