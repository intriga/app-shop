@extends('layouts.app')

@section('title', 'Bienvenido a App shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')

    
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
  <div class="main main-raised">
    <div class="container">
      
      
      <div class="section text-center">
        <h2 class="title">Editar productos seleccionado</h2>
        
            
            <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
              {{ csrf_field() }}
                            
                
                  <div class="col-sm-12">
                    <div class="form-group label-floating">
                       <label class="control-label">nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="First name" value="{{ $product->name }}">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group label-floating">
                      <label class="control-label">precion</label>
                    <input type="number" step="0.01" class="form-control" name="price" placeholder="precio" value="{{ $product->price }}">
                    </div>
                    
                  </div>
                  <div class="col-sm-12">

                  <div class="form-group label-floating">
                    <label class="control-label">descripcion</label>
                    <input type="text" class="form-control" name="description" placeholder="descripcion" value="{{ $product->description }}">
                  </div>
                  </div>

                  <textarea name="long_description" id="" class="form-control col-sm-12" cols="30" rows="10" placeholder="descripcion extensa del producto">{{ $product->long_description }}</textarea>

                  <button type="submit" class="btn btn-primary">Guardar cambios</button>                
                  <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
              

            </form>
                        
          
      </div>
      
      
    </div>
  </div>
  
  @include('includes.footer')

@endsection

