<x-Layout titulo="C-COCINO">

    <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
        <h1 style="margin-bottom: 15px; font-size: 24px; font-weight: 800;">C-COCINO</h1>
        <p>Tu página web de recetas favorita</p>
        <form action="#" method="GET">
            <input type="text" name="search" placeholder="Buscar receta" style="padding: 10px; width: 50%; margin-top: 20px;">
            <button type="submit" style="background-color: orange; padding: 10px 20px; margin-left: 10px;">Buscar</button>
        </form>
    </div>

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Recetas recientes</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <!-- Opciones de filtrado de productos-->
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">FYP</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">SIGUIENDO</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">GLOBAL</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Inicio de las tarjetas para las recetas-->
                <div class="tab-content">
                    <!--Vista de fyp-->
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach($recipes as $recipe)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item d-flex flex-column"> 
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/placeholder.jpg') }}" width="415" height="200" class="img-fluid w-100 rounded-top"> 
                                            </div>
                                            <div class="p-2 text-white bg-secondary px-3 py-1 rounded position-absolute border border-secondary border-top-0 rounded-bottom" style="top: 10px; left: 10px;">Tag</div>
                                            <div class="p-4 flex-grow-1"> 
                                                <h4>{{ Str::limit($recipe->title_recipe, 50, '...') }}</h4>
                                                <p>{{ Str::limit($recipe->descrip_recipe, 100, '...') }}</p>
                                            </div>
                                            <div class="px-4 py-3 bg-light mt-auto rounded-bottom"> 
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="clasificacion">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $recipe->comentarios()->get()->avg('puntuacion') + 0.49)
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @else
                                                            <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                    </p>
                                                    <a href="{{ route('receta.show', $recipe->id) }}" class="btn border border-secondary rounded-pill px-3 text-primary">Ver receta</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Más vistas de filtrado -->
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

</x-Layout>