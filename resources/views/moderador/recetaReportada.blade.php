<x-layoutModerador>
<div class="row g-4">
    <div class="col-lg-4">
        <div class="border rounded">
            <img src="{{asset('storage/' . $recipe->ubiFotoReceta)}}" class="img-fluid rounded" alt="Image">
        </div>
    </div>
    <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-3">{{$recipe->title_recipe}}</h4>

            
        </div>
        <div class="d-flex mb-3 ">
            @for ($i = 1; $i <= 5; $i++) @if ($i <=$recipe->comentarios()->get()->avg('puntuacion')+0.49) <!--Para que se vaya al siguiente entero  a partir del x.51-->
                <i class="fa fa-star text-secondary"></i>
                @else
                <i class="fa fa-star"></i>
                @endif
                @endfor
        </div>
        <p class="mb-4">{{$recipe->descrip_recipe}}</p>
    </div>

    <nav>
        <div class="nav nav-tabs mb-3">
        </div>
    </nav>
    <div class="col-lg-5">
        <h4 class="fw-bold mb-3">Ingredientes</h4>
        <ol>
            @foreach($recipe->ingredients as $ingredientes)
            <li>{{$ingredientes->ingredient}}</li>
            @endforeach
        </ol>

    </div>
    <div class="col-lg-7">
        <h4 class="fw-bold mb-3">Instruccion</h4>
        <ol>
            @foreach($recipe->instructions as $instrucciones)
            <li>{{$instrucciones->instruccion}}</li>
            @endforeach
        </ol>
    </div>
</div>
<a href="{{route('usuario.moderadorRecetas', Auth::user()->id)}}" class="btn border border-secondary rounded-pill px-3 text-primary">Regresar</a>
</x-layoutModerador>