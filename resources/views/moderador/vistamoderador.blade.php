<x-Layout titulo="C-COCINO">
    <link href="{{asset('css/barralateralstyles.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <body>
        <div class="menu">
            <ion-icon name="menu-outline"></ion-icon>
            <ion-icon name="close-outline"></ion-icon>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
        </div>

        <div class="menu">
            <ion-icon name="menu-outline"></ion-icon>
            <ion-icon name="close-outline"></ion-icon>
        </div>
        
        <div class="barra-lateral">
            <div>
                <div class="nombre-pagina">
                    <img id="cloud" class="logo" src="{{asset('img/c-cocino.png')}}" alt="">
                    <span class="spanbar">C-COCINO</span>
                </div>
            </div>

            <div class="linea"></div>

            <nav class="navegacion">
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item" id="inicio" onclick="toggleSidebar()">
                        <a href="#" class="sidebar__menu-link">
                            <i class="fas fa-home"></i>
                            <span class="spanbar">Inicio</span>
                        </a>
                    </li>                
                    <li class="sidebar__menu-item" id="inventario">
                        <a href="{{ route('receta.create')}}" class="sidebar__menu-link" onclick="toggleSubMenu('submenu-inventario')">
                            <i class="fas fa-comment-dots"></i>
                            <span class="spanbar">Comentarios reportados</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-item" id="ventas">
                        <a href="#" class="sidebar__menu-link" onclick="toggleSubMenu('submenu-ventas')">
                            <i class="fas fa-book-open"></i> 
                            <span class="spanbar">Recetas reportadas</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-item" id="compras">
                        <a href="#" class="sidebar__menu-link" onclick="toggleSubMenu('submenu-compras')">
                            <i class="fas fa-user"></i>
                            <span class="spanbar">Cuentas reportadas</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Adentro de aqui va el contenido de las vistas del moderador -->
        <main class="option-grid">
            <div>
                <span>
                    cdsivhsdiuvnsdkvhdskvnds
                </span>
            </div>
        </main>
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


        <script>
            function toggleSubMenu(submenuId) {
            var submenu = document.getElementById(submenuId);
            submenu.classList.toggle('show');
            }
        </script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{asset('js/sideBar.js')}}"></script>
    </body>
</x-Layout>