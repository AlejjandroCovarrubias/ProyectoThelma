<x-Layout titulo="formulario">
<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-12">
                <form action="{{ route('receta.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row g-4">
                            @csrf
                            <div class="col-lg-4">
                                <div class="border rounded">
                                    <input type="file" id="picRecipe" name="picRecipe">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p class="mb-3">Creador:{{Auth::user()->nickname}}</p>
                                <h4 class="fw-bold mb-3">Privacidad</h4>
                                <div class="form-check text-start">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="private" name="visibility" value="private">
                                    <label class="form-check-label" for="private">Privado</label>
                                </div>

                                <div class="form-check text-start">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="public" name="visibility" value="public">
                                    <label class="form-check-label" for="public">Publico</label>
                                </div>
                                
                                <br>

                                <h4 class="fw-bold mb-3">Nombre de la receta</h4>
                                <input type="text" class="form-control" placeholder="Nombre de la receta" id="title" name="title">
                                
                                <br>

                                <h4 class="fw-bold mb-3">Descripcion</h4>
                                <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="4" placeholder="Descripcion" id="descrip" name="descrip"></textarea>

                            </div>

                            <nav>
                                <div class="nav nav-tabs mb-3">
                                </div>
                            </nav>
                            <div class="col-lg-5">
                                <h4 class="fw-bold mb-3">Ingredientes</h4>
                                <div class="border-bottom rounded" id="ingredientes-container">
                                    <label style="padding-right: 20px;">Paso 1</label>
                                    <input type="text" placeholder="Ingrediente" id="ingrediente" name="ingrediente[]" class="form-control border-0 me-4">
                                </div>
                                <br>
                                <button id="add-ingr" class="btn border border-secondary text-primary rounded-pill px-4 py-3" type="button">Añadir Ingrediente...</button>
                            </div>

                            <script>
                                document.getElementById("add-ingr").addEventListener("click", function() {
                                    var container = document.getElementById("ingredientes-container");
                                    var totalIngredientes = container.children.length; // Obtener el número total de ingredientes y sumar 1
                                    
                                    var nuevoPaso = document.createElement("div");
                                    nuevoPaso.className = "border-bottom rounded";
                                    
                                    var nuevoLabel = document.createElement("label");
                                    nuevoLabel.textContent = "Paso " + totalIngredientes;
                                    nuevoLabel.style.paddingRight = "25px";
                                    
                                    var nuevaInput = document.createElement("input");
                                    nuevaInput.type = "text";
                                    nuevaInput.placeholder = "Ingrediente";
                                    nuevaInput.name = "ingrediente[]";
                                    nuevaInput.id="ingrediente"+totalIngredientes;
                                    nuevaInput.className = "form-control border-0 me-4"
                                    
                                    nuevoPaso.appendChild(nuevoLabel);
                                    nuevoPaso.appendChild(nuevaInput);
                                    
                                    container.appendChild(nuevoPaso);
                                });
                            </script>

                            <br>

                            <nav>
                                <div class="nav nav-tabs mb-3">
                                </div>
                            </nav>

                            <div class="col-lg-7">
                                <h4 class="fw-bold mb-3">Instrucciones</h4>
                                <div class="border-bottom rounded" id="instrucciones-container">
                                    <label>Paso 1</label>
                                    <input type="text" class="form-control border-0 me-4" placeholder="Ingresa el paso..." id="instruc" name="instruc[]">
                                </div>
                                <br> 
                                <button id="add-instr" class="btn border border-secondary text-primary rounded-pill px-4 py-3" type="button">Añadir instruccion...</button>
                            </div>

                            <script>
                                document.getElementById("add-instr").addEventListener("click", function() {
                                    var container = document.getElementById("instrucciones-container");
                                    var totalPasos = container.children.length; // Obtener el número total de pasos y sumar 1
                                    
                                    var nuevoPaso = document.createElement("div");
                                    nuevoPaso.className = "border-bottom rounded";
                                    
                                    var nuevoLabel = document.createElement("label");
                                    nuevoLabel.textContent = "Paso " + totalPasos;
                                    nuevoLabel.style.paddingRight = "25px";
                                    
                                    var nuevaInput = document.createElement("input");
                                    nuevaInput.type = "text";
                                    nuevaInput.placeholder = "Ingresa el paso...";
                                    nuevaInput.name = "instruc[]";
                                    nuevaInput.id="instruc"+totalPasos;
                                    nuevaInput.className = "form-control border-0 me-4";
                                    
                                    nuevoPaso.appendChild(nuevoLabel);
                                    nuevoPaso.appendChild(nuevaInput);
                                    
                                    container.appendChild(nuevoPaso);
                                });
                            </script>

                            <br>

                            <nav>
                                <div class="nav nav-tabs mb-3">
                                </div>
                            </nav>

                            <input type="submit" value="Enviar" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
</x-Layout>