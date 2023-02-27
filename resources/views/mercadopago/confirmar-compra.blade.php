@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Confirmar Compra')

@push('js')
// SDK MercadoPago.js
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('{{$publicKey}}', {locale: 'es-AR'});

    mp.checkout({
    preference: {
      id: '{{$preference->id}}'
    },
    render: {
      container: '#mp-wrapper',
      label: 'Pagar',
    }
  });
</script>
@endpush


@section('main')
<section class=" container">
    <h1 class="negrita py-3">Completar compra</h1>
    <table class="mb-3 table table-stripped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preference->items as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->unit_price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->unit_price * $item->quantity}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</section>

<div id="mp-wrapper"></div>

@endsection