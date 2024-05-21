<x-mail::message>
# Creaste una receta para {{$owner->nickname}}

<x-mail::panel>
    Creaste la siguiente receta:<br>
    <strong>{{$receta->title_recipe}}</strong><br>
    Descripcion:<br>
    <strong>{{$receta->descrip_recipe}}</strong>
    <img src="{{ asset('storage/' . $receta->ubiFotoReceta) }}">
</x-mail::panel>

</x-mail::message>