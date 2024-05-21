<x-layoutModerador>
<div class="container-fluid testimonial py-1">
    <h1>Lista de comentarios reportados</h1>
</div>    
    @foreach($usuarios as $usuario)
        <div class="container-fluid testimonial py-1">
            <div class="container py-3">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                            <a href="#"><div class="mb-4 d-flex align-items-center flex-nowrap">
                                <div class="rounded">
                                    <img src="{{asset('storage/' . $usuario->profile_photo_path)}}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block d-block border-bottom border-secondary">
                                    <h4 class="text-dark">{{$usuario->name}}</h4>
                                </div>
                            </div></a>
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                        <div class="p-1 btn-group" role="group">
                            <a href="{{route('usuario.myProfile',$usuario->id)}}" target="_blank" class="btn border border-secondary rounded-pill px-3 text-primary">Ver perfil</a>
                            <form action="{{ route('usuario.destroy',$usuario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">Eliminar cuenta</button> <!-- Alinear el boton -->
                            </form>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">Ascender a moderador</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</x-layoutModerador>