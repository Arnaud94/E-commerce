{{ dump($bladeProduct) }}

{{-- Ceci est un commentaire en blade --}}

@foreach ($bladeProduct as $prod)
    <ul>
        <li>Titre : {{ $prod['title'] }}</li>
        <li>Description : {{ $prod['description'] }}</li>
        <li>Prix : {{ $prod['prix'] }}</li>
        <li>Date :  {{ $prod['date_created']->format('d m Y') }}</li>
    </ul>
@endforeach



@forelse ($bladeProduct as $prod)
    <ul>
        <li>Titre : {{ $prod['title'] }}</li>
        <li>Description : {{ $prod['description'] }}</li>
        <li>Prix : {{ $prod['prix'] }}</li>
        <li>Date :  {{ $prod['date_created']->format('d m Y') }}</li>
    </ul>
@empty
    <p>Il n'y a pas de produit disponible</p>
@endforelse