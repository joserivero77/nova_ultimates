@extends('layouts.amd')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3 bg-light">
            @if (count(Cart::getContent()))
                <a href="{{ route('cart.checkout') }}">
                    VER CARRITO <span class="badge badge-danger">{{ count(Cart::getContent()) }}</span>
                </a>
            @endif
        </div>
        <div class="col-sm-9">
            <div class="row justify-content-center">
                @forelse ($productos as $item)
                    <div class="col-4 border p-5 mt-5 text-center">
                        <h1>{{ $item->name }}</h1>
                        <p>${{ $item->price }}</p>
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="submit" name="btn btn-success" value="ADD TO CART">
                        </form>
                    </div>
                @empty

                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
