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
                                        @if(!$esFavorito)
                                        <a href="{{route('usuario.fav',$recipe->id)}}"><i class="fas fa-heart icon"></i></a>
                                        @else
                                        <a href="{{route('usuario.unfav',$recipe->id)}}"><i class="fas fa-heart icon" style="color: red"></i></a> <!-- Falta cambiar de color el corazon de fav -->
                                        @endif
                                        <i class="fas fa-share-alt icon" id="share-icon"></i>
                                        <i class="fa fa-flag me-2 btn-report" id="reportBtn" title="Reportar receta" style="margin-left: 40px;"></i>
                                        <form id="reportForm" action="{{ route('usuario.banreceta') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $recipe->id }}" id="id" name="id">
                                            <input type="hidden" id="descripcion" name="descripcion">
                                        </form>
                                        <ul class="action-icons" id="action-icons">
                                            <li onclick="copyLink()"><i class="fas fa-copy"></i></li>
                                            <!--<li onclick="downloadContent()"><i class="fas fa-download"></i></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <a href="{{route('usuario.myProfile',$cliente->id)}}">
                                    <p class="mb-3">Creador: {{$cliente->nickname}}</p>
                                </a>
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
                            @foreach($recipe->comentarios()->get() as $index => $comentar)
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex align-items-start mb-4">
                                    <img src="{{asset('storage/' . $comentar->user->profile_photo_path)}}" class="img-fluid rounded-circle me-3" style="width: 50px; height: 50px;" alt="">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="fw-bold mb-1">{{$comentar->user->nickname}}</h6>
                                                <p class="mb-1 text-muted" style="font-size: 12px;">{{$comentar->created_at}}</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex me-2">
                                                    @for ($i = 0; $i < 5; $i++) @if ($i < $comentar->puntuacion)
                                                        <i class="fa fa-star text-warning"></i>
                                                        @else
                                                        <i class="fa fa-star text-muted"></i>
                                                        @endif
                                                        @endfor
                                                </div>
                                                <i class="fa fa-flag btn-report" id="reportComentarioBtn{{$index}}" title="Reportar comentario" style="cursor: pointer;"></i>
                                                <form id="reportFormComentario{{$index}}" action="{{ route('usuario.bancomentario') }}" method="POST" class="d-none">
                                                    @csrf
                                                    <input type="hidden" value="{{ $comentar->id }}" id="idComentario{{$index}}" name="idComentario">
                                                    <input type="hidden" id="descripcionComentario{{$index}}" name="descripcionComentario">
                                                </form>
                                            </div>
                                        </div>
                                        <p class="mb-0">{{$comentar->comentario}}</p>
                                    </div>
                                </div>
                            </div>
                            <div style="   width: 100%;height: 1px;margin-top: 15px;background-color: rgb(180,180,180);"></div>
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

    <div id="reportModalComentario" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4>Motivo</h4>
            <textarea id="motivoComentario" class="form-control" rows="4" placeholder="Escribe el motivo del reporte" style="resize: none"></textarea>
            <button id="sendReportComentario" class="btn-send mt-3">Enviar</button>
        </div>
    </div>
    <!-- Single Product End -->
    <script>
        document.querySelectorAll('.btn-report').forEach(button => {
            button.addEventListener('click', function() {
                if (this.id === 'reportBtn') {
                    document.getElementById('reportModal').style.display = 'flex';
                } else {
                    let index = this.id.replace('reportComentarioBtn', '');
                    document.getElementById('reportModalComentario').style.display = 'flex';
                    document.getElementById('sendReportComentario').dataset.index = index;
                }
            });
        });

        document.querySelectorAll('.close').forEach(closeBtn => {
            closeBtn.addEventListener('click', function() {
                document.getElementById('reportModal').style.display = 'none';
                document.getElementById('reportModalComentario').style.display = 'none';
            });
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('reportModal')) {
                document.getElementById('reportModal').style.display = 'none';
            }
            if (event.target == document.getElementById('reportModalComentario')) {
                document.getElementById('reportModalComentario').style.display = 'none';
            }
        });

        document.getElementById('sendReport').addEventListener('click', function() {
            var motivo = document.getElementById('motivo').value;
            document.getElementById('descripcion').value = "Reporte: " + motivo;

            document.getElementById('reportModal').style.display = 'none';
            document.getElementById('reportForm').submit();
        });

        document.getElementById('sendReportComentario').addEventListener('click', function() {
            var motivo = document.getElementById('motivoComentario').value;
            let index = this.dataset.index;
            document.getElementById('descripcionComentario' + index).value = "Reporte: " + motivo;

            document.getElementById('reportModalComentario').style.display = 'none';
            document.getElementById('reportFormComentario' + index).submit();
        });

        document.querySelectorAll('.clasificacion input').forEach(input => {
            input.addEventListener('change', function() {
                let clickedRating = parseInt(this.value);
                let stars = this.parentNode.querySelectorAll('label i');
                stars.forEach((star, index) => {
                    if (index < clickedRating) {
                        star.classList.add('text-secondary');
                    } else {
                        star.classList.remove('text-secondary');
                    }
                });
            });
        });

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