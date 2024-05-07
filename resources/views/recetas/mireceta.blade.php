<x-Layout titulo="Prueba">
    <br><br><br><br><br>
    <p>{{$receta->user_id}}</p>
    <p>{{$receta->title_recipe}}</p>  
    <p>{{$receta->descrip_recipe}}</p>
    <p>{{$receta->privacy}}</p>
    <h2>instrucciones</h2>
    <ul>
        @foreach($receta->instructions as $instrucciones)
            <li>{{$instrucciones->instruccion}}</li>
        @endforeach
    </ul>
</x-Layout>
