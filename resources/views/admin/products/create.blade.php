@extends('layouts.app')

@section('title', 'Bienvenido a App shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')

    
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
  <div class="main main-raised">
    <div class="container">
      
      
      <div class="section text-center">
        <h2 class="title">Registrar nuevo productos</h2>

          @if ($errors->any())
            <div class="alert aler-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
            
            <form method="post" action="{{ url('/admin/products') }}">
              {{ csrf_field() }}
                            
                
                  <div class="col-sm-12">
                    <div class="form-group label-floating">
                       <label class="control-label">nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="First name">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group label-floating">
                      <label class="control-label">precion</label>
                    <input type="number" class="form-control" name="price" placeholder="precio">
                    </div>
                    
                  </div>
                  <div class="col-sm-12">

                  <div class="form-group label-floating">
                    <label class="control-label">descripcion</label>
                    <input type="text" class="form-control" name="description" placeholder="descripcion">
                  </div>
                  </div>

                  <textarea name="long_description" id="" class="form-control col-sm-12" cols="30" rows="10" placeholder="descripcion extensa del producto"></textarea>

                  <button type="submit" class="btn btn-primary">Registrar</button>                
              

            </form>
                        
          
      </div>
      
      
    </div>
  </div>
  
  @include('includes.footer')

@endsection

