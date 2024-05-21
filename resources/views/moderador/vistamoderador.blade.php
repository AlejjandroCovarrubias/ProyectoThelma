<x-layoutModerador>
<div class="container-fluid testimonial py-1">
        <h1>Lista de comentarios reportados</h1>
</div>    
        @foreach($reportes as $reporte)
        <div class="container-fluid testimonial py-1">
            <div class="container py-3">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                            <a href="{{route('usuario.myProfile',$reporte->user_id)}}" target="_blank"><div class="mb-4 d-flex align-items-center flex-nowrap">
                                <div class="rounded">
                                    <img src="{{asset('/img/peligro.jpg')}}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block d-block border-bottom border-secondary">
                                    <h4 class="text-dark">{{$reporte->descripcion}}</h4>
                                    <p class="m-0 pb-3">Reportado por: {{App\Models\User::findOrFail($reporte->user_id)->nickname}}</p>
                                </div>
                            </div></a>
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                        <div class="mb-2 pb-1">
                          @php $comentario=App\Models\Comentario::findOrFail($reporte->comentario_id) @endphp
                          @php $user=App\Models\User::findOrFail($comentario->user_id) @endphp
                            <a href="{{route('usuario.myProfile',$comentario->user_id)}}" target="_blank"><p class="m-0 pb-3">Reporta a: {{$user->nickname}}</p></a>
                            <p class="mb-0">{{ Str::limit ($comentario->comentario, 300, '...') }}</p>
                        </div>
                        <div class="p-1 btn-group" role="group">
                            <form action="{{route('usuario.destroyReporteComentario', $reporte->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Pasar" class="btn border border-secondary rounded-pill px-3 text-primary">
                            </form>
                            <form action="{{route('comentario.destroy', $comentario)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar comentario" class="btn border border-secondary rounded-pill px-3 text-primary">
                            </form>
                            <form action="{{route('usuario.destroy', $comentario->user_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar cuenta" class="btn border border-secondary rounded-pill px-3 text-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</x-layoutModerador>