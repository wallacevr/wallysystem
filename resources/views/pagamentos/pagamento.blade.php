<script src="https://sdk.mercadopago.com/js/v2"></script>



@php


// SDK do Mercado Pago
require base_path('/vendor/autoload.php');
// Configure as credenciais
MercadoPago\SDK::setAccessToken('TEST-bdf2ad0d-4deb-4e99-8a59-17a8e2fb7ba6');
// Crie um objeto de preferência
$preference = new MercadoPago\Preference();
// Crie um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Meu produto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
echo $preference
@endphp

