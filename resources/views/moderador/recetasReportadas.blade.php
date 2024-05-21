<x-layoutModerador>
    <div class="container-fluid testimonial py-1">
        <h1>Lista de recetas reportadas</h1>
    </div>    
        @foreach($recetasReportadas as $receta)
        <div class="container-fluid testimonial py-1">
            <div class="container py-3">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <div class="mb-4 d-flex align-items-center flex-nowrap">
                            <div class="rounded">
                                <img src="{{ asset('/img/peligro.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block border-bottom border-secondary">
                                <h4 class="text-dark">{{ $receta->descripcion }}</h4>
                            </div>
                        </div>
                        <div class="mb-2 pb-1">
                            
                        </div>
                        <div class="p-1">
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">Pasar</a>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">Eliminar receta</a> 
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">Eliminar perfil</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</x-layoutModerador>
