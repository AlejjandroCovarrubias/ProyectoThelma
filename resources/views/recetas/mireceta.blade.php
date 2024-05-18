<x-Layout titulo="Prueba">



    <!-- Single Product Start -->


<div class="container-fluid py-5 mt-5">
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="border rounded">
                            <a href="#">
                                <img src="img/single-item.jpg" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h4 class="fw-bold mb-3">{{$recipe->title_recipe}}</h4>
                        <p class="mb-3">Creador: {{$cliente->nickname}}</p>
                                @if($recipe->privacy == "private")
                                    <p class="mb-3"><b>Esta receta es privada.</b></p>
                                @endif
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="mb-4">{{$recipe->descrip_recipe}}</p>
                        <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Añadir a Favoritos</a>
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
                            <input id="radio1" type="radio" name="estrellas" value="1" class="d-none"/>
                            <label for="radio1"><i class="fa fa-star text-secondary"></i></label>
                            <input id="radio2" type="radio" name="estrellas" value="2" class="d-none"/>
                            <label for="radio2"><i class="fa fa-star text-secondary"></i></label>
                            <input id="radio3" type="radio" name="estrellas" value="3" class="d-none"/>
                            <label for="radio3"><i class="fa fa-star text-secondary"></i></label>
                            <input id="radio4" type="radio" name="estrellas" value="4" class="d-none"/>
                            <label for="radio4"><i class="fa fa-star text-secondary"></i></label>
                            <input id="radio5" type="radio" name="estrellas" value="5" class="d-none"/>
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
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">{{$comentar->created_at}}</p>
                                        <div class="d-flex justify-content-between">
                                            <h5 style="padding-right:20px;">{{$comentar->user->nickname}}</h5>
                                            <div class="d-flex mb-3 ">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $comentar->puntuacion)
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
</script>

</x-Layout>
