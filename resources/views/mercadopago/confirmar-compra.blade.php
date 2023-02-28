@extends('layouts.main') {{-- Esto navega a [resources/views/layouts/main.blade.php] --}}

@section('title', 'Confirmar Compra')

@push('js')
// SDK MercadoPago.js
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('{{$manager->getPublicKey()}}', {locale: 'es-AR'});

    mp.checkout({
    preference: {
      id: '{{$manager->getPaymentId()}}'
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
    <h1 class="negrita py-3">Resumen de la compra</h1>
    <p>Verificá que todos los datos estén correctos antes de proceder con el pago.</p>
    <table class="mb-3 table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Lugar</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($manager->getItems() as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>${{$item->unit_price}}</td>
                <td>{{$item->lugar}}</td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->hora}}</td>
                <td>{{$item->quantity}}</td>
                <td>${{$item->unit_price * $item->quantity}}</td>
            </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
              <th colspan="6">Total</th>
              <td>${{$manager->getTotalPrice()}}</td>
            </tr>
           </tfoot>
    </table>
    <div class="text-end" id="mp-wrapper"></div>
</section>


@endsection