<x-Layout titulo="formulario">
<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="border rounded">
                            <input type="file">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <p class="mb-3">Creador: Juan Rios</p>
                        <div class="d-flex mb-4">
                            <label for="miCombobox">Publicación:</label>
                            <select id="miCombobox" name="miCombobox">
                                <option value="opcion1">Publica</option>
                                <option value="opcion2">Privada</option>
                            </select>
                        </div>
                        <h4 class="fw-bold mb-3">Nombre de la receta</h4>
                        <input type="text" class="form-control" placeholder="Añade un titulo a la receta">
                        <h4 class="fw-bold mb-3">Descripcion</h4>
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="4" placeholder="Añade una pequeña descripcion de lo que va tu receta"></textarea>

                    </div>

                    <nav>
                        <div class="nav nav-tabs mb-3">
                        </div>
                    </nav>
                    <div class="col-lg-5">
                        <h4 class="fw-bold mb-3">Ingredientes</h4>
                        <div class="instruction-step">
                            <label>Paso 1</label>
                            <input type="text" placeholder="Ingresa un Ingrediente...">
                            <button class="delete-btn">X</button>
                        </div>
                        <button id="add-step">Añadir Ingrediente...</button>
                        
                    </div>
                    <div class="col-lg-7">
                        <h4 class="fw-bold mb-3">Instrucciones</h4>
                        <div class="instruction-step">
                            <label>Paso 1</label>
                            <input type="text" placeholder="Ingresa la instrución...">
                            <button class="delete-btn">X</button>
                        </div>
                        <button id="add-step">Añadir paso...</button>
                    </div>


                    <nav>
                        <div class="nav nav-tabs mb-3">
                        </div>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
</div>
</x-Layout>