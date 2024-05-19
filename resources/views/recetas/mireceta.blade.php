<x-Layout titulo="Prueba">
<div class="container-fluid py-5 mt-5">
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="border rounded">
                            <img src="{{asset('storage/' . $recipe->ubiFotoReceta)}}" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold mb-3">{{$recipe->title_recipe}}</h4>
                            
                            <div class="icon-container">
                                <i class="fas fa-heart icon"></i>
                                <i class="fas fa-share-alt icon" id="share-icon"></i>
                                <i class="fa fa-flag me-2 btn-report" id="reportBtn" title="Reportar receta" style="margin-left: 40px;"></i>
                                <ul class="action-icons" id="action-icons">
                                    <li onclick="copyLink()"><i class="fas fa-copy"></i></li>
                                    <li onclick="downloadContent()"><i class="fas fa-download"></i></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{route('usuario.myProfile',$cliente->id)}}"><p class="mb-3">Creador: {{$cliente->nickname}}</p></a>
                                @if($recipe->privacy == "private")
                                <p class="mb-3"><b>Esta receta es privada.</b></p>
                                @endif
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
                                    <!--<li>Primer Ingrediente</li>
                            <li>Segundo Ingrediente</li>
                            <li>Tercer Ingrediente</li>
                            <li>Cuarto Ingrediente</li>
                            <li>Quinto Ingrediente</li>
                            <li>Sexto Ingrediente</li>-->
                                </ol>

                            </div>
                            <div class="col-lg-7">
                                <h4 class="fw-bold mb-3">Instrucciones</h4>
                                <ol>
                                    @foreach($recipe->instructions as $instrucciones)
                                    <li>{{$instrucciones->instruccion}}</li>
                                    @endforeach
                                </ol>
                                <!-- <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                        <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
-->
                            </div>


                            <nav>
                                <div class="nav nav-tabs mb-3">
                                </div>
                            </nav>

                            <form action="{{route('comentario.store',$recipe->id)}}" method="POST" class="col-lg-12">
                                @csrf
                                <input type="hidden" name="receta_id" value="{{ $recipe->id }}">
                                <h4 class="mb-5 fw-bold">Añade un comentario</h4>
                                <div class="border-bottom rounded my-4">
                                    <textarea name="comentario" id="comentario" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>

                                <h4 class="mb-3 fw-bold">Valoración:</h4>
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="1" class="d-none" />
                                    <label for="radio1"><i class="fa fa-star text-secondary"></i></label>
                                    <input id="radio2" type="radio" name="estrellas" value="2" class="d-none" />
                                    <label for="radio2"><i class="fa fa-star text-secondary"></i></label>
                                    <input id="radio3" type="radio" name="estrellas" value="3" class="d-none" />
                                    <label for="radio3"><i class="fa fa-star text-secondary"></i></label>
                                    <input id="radio4" type="radio" name="estrellas" value="4" class="d-none" />
                                    <label for="radio4"><i class="fa fa-star text-secondary"></i></label>
                                    <input id="radio5" type="radio" name="estrellas" value="5" class="d-none" />
                                    <label for="radio5"><i class="fa fa-star text-secondary"></i></label>
                                </p>

                                <div class="mb-4">
                                    <button type="submit" class="btn btn-primary">Enviar Comentario</button>
                                </div>
                            </form>

                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <h4 class="mb-5 fw-bold">Comentario</h4>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </nav>
                            @foreach($recipe->comentarios()->get() as $comentar)
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="{{asset('storage/' . $comentar->user->profile_photo_path)}}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">{{$comentar->created_at}}</p>
                                        <div class="d-flex justify-content-between">
                                            <h5 style="padding-right:20px;">{{$comentar->user->nickname}}</h5>
                                            <div class="d-flex mb-3 ">
                                                @for ($i = 0; $i < 5; $i++) @if ($i < $comentar->puntuacion)
                                                    <i class="fa fa-star text-secondary"></i>
                                                    @else
                                                    <i class="fa fa-star"></i>
                                                    @endif
                                                    @endfor
                                            </div>
                                        </div>
                                        <p>{{$comentar->comentario}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div id="reportModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4>Motivo</h4>
            <textarea id="motivo" class="form-control" rows="4" placeholder="Escribe el motivo del reporte" style="resize: none"></textarea>
            <button id="sendReport" class="btn-send mt-3">Enviar</button>
        </div>
    </div>
    <!-- Single Product End -->
    <script>
        document.querySelectorAll('.clasificacion input').forEach(input => {
            input.addEventListener('change', function() {
                let clickedRating = this.value;
                document.querySelectorAll('.clasificacion label i').forEach((icon, index) => {
                    icon.className = (index >= clickedRating) ? 'fa fa-star' : 'fa fa-star text-secondary';
                });
            });
        });

        document.getElementById('reportBtn').addEventListener('click', function() {
            document.getElementById('reportModal').style.display = 'flex';
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('reportModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('reportModal')) {
                document.getElementById('reportModal').style.display = 'none';
            }
        });

        document.getElementById('sendReport').addEventListener('click', function() {
            // Aquí puedes agregar la lógica para enviar el reporte
            alert('Reporte enviado: ' + document.getElementById('motivo').value);
            document.getElementById('reportModal').style.display = 'none';
        });
    </script>
    <script>
        document.getElementById('share-icon').onclick = function(event) {
            var icons = document.getElementById('action-icons');
            icons.style.display = icons.style.display === 'block' ? 'none' : 'block';
            event.stopPropagation();
        };

        document.body.onclick = function() {
            var icons = document.getElementById('action-icons');
            if (icons.style.display === 'block') {
                icons.style.display = 'none';
            }
        };

        function copyLink() {
            navigator.clipboard.writeText('{{url()->current()}}').then(function() {}).catch(function(error) {
                alert('Error al copiar el enlace');
            });
        }

        function downloadContent() {
            window.location.href = 'url_del_archivo_para_descargar';
        }
    </script>
</x-Layout>