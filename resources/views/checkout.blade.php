@extends('layouts.amd')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 bg-light">


            @if (count(Cart::getContent()))
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::getContent() as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.removeitem') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn btn-link btn-sm text-danger" type="submit">X</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p><a href="{{ route('atras') }}">Carrito vacio</a></p>
            @endif
        </div>
        <button class="btn btn-primary btn-sm " type="submit">Guardar</button>

    </div>
</div>
@endsection
