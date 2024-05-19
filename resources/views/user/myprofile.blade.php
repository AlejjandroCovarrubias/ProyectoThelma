<x-Layout titulo="C-Cocinó / {{$usuario->nickname}}">
<div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <img src="{{ asset('storage/' . $usuario->profile_photo_path ) }}" class="img-fluid rounded-circle" alt="Image" style="width: 250px; height: 250px;">
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{$usuario->nickname}} / @ {{$usuario->name}}</h4>
                                <h5 class="fw-bold mb-3">Sobre mi</h5>
                                <p class="mb-3">{{$usuario->aboutyou}}</p>
                                <div>
                                    @if($usuario->facebookID)
                                    <a href="https://www.facebook.com/{{$usuario->facebookID}}" target="_blank"><img src="{{asset('img/facebook_icon.png')}}" width="5.5%"></a>
                                    @endif
                                    @if($usuario->instagramID)
                                    <a href="https://www.instagram.com/{{$usuario->instagramID}}" target="_blank"><img src="{{asset('img/instagram_icon.png')}}" width="5%"></a>
                                    @endif
                                    @if($usuario->twitterID)
                                    <a href="https://www.x.com/{{$usuario->twitterID}}" target="_blank"><img src="{{asset('img/x_icon.png')}}" width="5%"></a>
                                    @endif
                                </div>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    @if(Auth::check())
                                        @if(Auth::user()->id!=$usuario->id)
                                            @if(Auth::check() && !Auth::user()->following->contains($usuario->id))
                                                <form action="{{route('usuario.follow')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$usuario->id}}" id="id" name="id">
                                                    <input type="submit" value="Seguir" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> <!-- Cambiar por el boton que van a hacer -->   
                                                </form>
                                            @else
                                                <form action="{{route('usuario.unfollow')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$usuario->id}}" id="id" name="id">
                                                    <input type="submit" value="Dejar de seguir" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> <!-- Cambiar por el boton que van a hacer -->   
                                                </form>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Recetas</button>
                                        @can('verConfiguraciones',$usuario)
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-priv-recipes" data-bs-toggle="tab" data-bs-target="#nav-priv-recipes"
                                            aria-controls="nav-priv-recipes" aria-selected="false">Mis recetas privadas</button>
                                        @endcan
                                        @can('verConfiguraciones',$usuario)
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Configuraciones</button>
                                        @endcan
                                        @can('verConfiguraciones',$usuario)
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-fav-tab" data-bs-toggle="tab" data-bs-target="#nav-fav"
                                            aria-controls="nav-fav" aria-selected="false">Recetas en favorito</button>
                                        @endcan
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <div class="col-lg-12">
                                            <div class="row g-4 justify-content-center">
                                                @php $contador = 0; @endphp
                                                    @foreach($usuario->recetas->where('privacy','public') as $recipe)
                                                            @if($contador % 2 == 0)
                                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                                    <div class="fruite-img">
                                                                        <a href="{{route('receta.show',$recipe)}}">
                                                                            <img src="{{ asset('storage/' . $recipe->ubiFotoReceta) }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>{{$recipe->title_recipe}}</h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($contador % 2 == 1)
                                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                                    <div class="fruite-img">
                                                                        <a href="{{route('receta.show',$recipe)}}">
                                                                            <img src="{{ asset('storage/' . $recipe->ubiFotoReceta) }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>{{$recipe->title_recipe}}</h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                    @php $contador++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        <form action="{{route('usuario.updateJetstream')}}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                            <div class="nav nav-tabs mb-3">
                                                <div class="col-lg-4">
                                                    <img src="{{ asset('storage/' . $usuario->profile_photo_path ) }}" id="output" class="img-fluid rounded-circle" style="max-width: 50%; height: auto;">
                                                    <br><br>
                                                </div>
                                                <div class="col-lg-8" style="padding-top: 70px">
                                                    <div class="border rounded btn border border-secondary text-primary rounded-pill px-4 py-3">
                                                        <input type="file" id="image" name="image" accept="image/*" onchange="loadFile(event)">
                                                    </div>
                                                    <script>
                                                        var loadFile = function(event) {
                                                            var output = document.getElementById('output');
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                            output.onload = function() {
                                                            URL.revokeObjectURL(output.src) // free memory
                                                        }
                                                        };
                                                    </script>
                                                    <br><br><br>
                                                </div>
                                            </div>
                                            <div class="nav nav-tabs mb-3">
                                                <div class="col-md-12 col-lg-6 col-xl-3" style="padding-top: 30px;">
                                                    <h4>Nombre de usuario</h4>
                                                    <p>No es tu arroba de cuenta. Es el nombre (alias) con el que tu cuenta es encontrada.</p>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-7" style="padding-left: 120px;">
                                                    <div class="form-item">
                                                        <label class="form-label my-3">Nuevo nombre de usuario</label>
                                                        <input type="text" class="form-control" id="nickname_new" name="nickname_new">
                                                        <label class="form-label my-3">Repite el nombre de usuario</label>
                                                        <input type="text" class="form-control" id="nickname_confirm" name="nickname_confirm">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nav nav-tabs mb-3">
                                                <div class="col-md-12 col-lg-6 col-xl-3" style="padding-top: 30px;">
                                                    <h4>Contraseña</h4>
                                                    <p>Asegurate de usar una contraseña única, larga y difícil de descifrar.</p>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-7" style="padding-left: 120px;">
                                                    <div class="form-item">
                                                        <label class="form-label my-3">Contraseña actual</label>
                                                        <input type="text" class="form-control" id="password_act" name="password_act">
                                                        <label class="form-label my-3">Nueva contraseña</label>
                                                        <input type="text" class="form-control" id="password_new" name="password_new">
                                                        <label class="form-label my-3">Confirmar contraseña</label>
                                                        <input type="text" class="form-control" id="password_confirm" name="password_confirm">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nav nav-tabs mb-3">
                                                <div class="col-md-12 col-lg-6 col-xl-3" style="padding-top: 30px;">
                                                    <h4>Sobre ti</h4>
                                                    <p>Esta información es pública y cualquier persona la puede visualizar.</p>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-7" style="padding-left: 120px;">
                                                    <div class="form-item">
                                                        <label class="form-label my-3">Cuéntamos sobre ti:</label>
                                                        <input type="text" class="form-control" id="about_me" name="about_me">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nav nav-tabs mb-3">
                                                <div class="col-md-12 col-lg-6 col-xl-3" style="padding-top: 30px;">
                                                    <h4>Redes</h4>
                                                    <p>Vincula tus redes.</p>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-7" style="padding-left: 120px;">
                                                    <div class="form-item">
                                                        <label class="form-label my-3">Twitter:</label>
                                                        <input type="text" class="form-control" id="twitter" name="twitter">
                                                        <label class="form-label my-3">Facebook:</label>
                                                        <input type="text" class="form-control" id="facebook" name="facebook">
                                                        <label class="form-label my-3">Instagram:</label>
                                                        <input type="text" class="form-control" id="instagram" name="instagram">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <input type="submit" value="Enviar" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                        </form>
                                    </div>       
                                    <div class="tab-pane" id="nav-priv-recipes" role="tabpanel" aria-labelledby="nav-priv-recipes">
                                    <div class="col-lg-12">
                                            <div class="row g-4 justify-content-center">
                                            @php $contador = 0; @endphp
                                                    @foreach($usuario->recetas->where('privacy','public') as $recipe)
                                                            @if($contador % 2 == 0)
                                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                                    <div class="fruite-img">
                                                                        <a href="{{route('receta.show',$recipe)}}">
                                                                            <img src="{{ asset('storage/' . $recipe->ubiFotoReceta) }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>{{$recipe->title_recipe}}</h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($contador % 2 == 1)
                                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                                    <div class="fruite-img">
                                                                        <a href="{{route('receta.show',$recipe)}}">
                                                                            <img src="{{ asset('storage/' . $recipe->ubiFotoReceta) }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>{{$recipe->title_recipe}}</h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                    @php $contador++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-fav" role="tabpanel" aria-labelledby="nav-fav-tab">
                                        <div class="col-lg-12">
                                            <div class="row g-4 justify-content-center">
                                                @php $contador = 0; @endphp
                                                    @foreach($recetasFav as $recipe)
                                                            @if($contador % 2 == 0)
                                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                                    <div class="fruite-img">
                                                                        <a href="{{route('receta.show',$recipe)}}">
                                                                            <img src="{{ asset('storage/' . $recipe->ubiFotoReceta) }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>{{$recipe->title_recipe}}</h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($contador % 2 == 1)
                                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                                    <div class="fruite-img">
                                                                        <a href="{{route('receta.show',$recipe)}}">
                                                                            <img src="{{ asset('storage/' . $recipe->ubiFotoReceta) }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>{{$recipe->title_recipe}}</h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                    @php $contador++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</x-Layout>