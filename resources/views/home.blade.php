@extends('layouts.app')

@section('title', 'App shop | Dashboard')

@section('body-class', 'prodct-page sidebar-collapse')

@section('content')

    
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

</div>
  <div class="main main-raised">
    <div class="container">
      
      
      <div class="section text-center">
        <h2 class="title">Dashboard</h2>
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito de compras
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Pedidos realizados
                </a>
            </li>
        </ul>

        <hr>
        <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>

        {{-- @foreach (auth()->user()->cart->details as $detail)
        <ul>
            <li>{{ $detail }}</li>
        </ul>
        @endforeach --}}

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-2">Nombre</th>
                    <th class="text-right">Precios</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>                
            @foreach (auth()->user()->cart->details as $detail)
                <tr>
                    <td class="text-center">
                        <img src="{{ $detail->product->featured_image_url }}" height="50">
                    </td>
                    <td>
                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{!! $detail->product->name !!}</a>
                    </td>
                    <td class="text-right">$ &euro; {!! $detail->product->price !!}</td>
                    <td>{!! $detail->quantity !!}</td>
                    <td>$ {!! $detail->quantity * $detail->product->price !!}</td>
                    <td class="td-actions text-right">
                        
                        <form action="{{ url('/cart') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }} 
                            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" class="btn btn-info btn-link">
                                <i class="material-icons">person</i>
                            </a>
                            
                            <button type="submit" rel="tooltip" class="btn btn-danger btn-link">
                            <i class="material-icons">close</i>
                            </button>
                        </form>
                        
                    </td>
                </tr>    
            @endforeach                                    
            </tbody>
        </table>

      </div>
      
      
    </div>
  </div>
  
  @include('includes.footer')

@endsection




