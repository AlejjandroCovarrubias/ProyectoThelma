<x-Layout titulo="C-COCINO">
    <link href="{{asset('css/barralateralstyles.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <body>
        <div class="menu"></div>
        <br>
        <br>
        <br>

        <div style="background-color: #f8f9fa; padding: 20px; text-align: center;"></div>
        
        <div class="barra-lateral">
            <div>
                <div class="nombre-pagina">
                    <!-- <ion-icon id="cloud" name="cloud-outline"></ion-icon> <!---->
                    <img id="cloud" class="logo" src="{{asset('img/dashboard_moderator.png')}}" alt="">
                    <div class="textos">
                        <span class="spanbar dashboard">Dashboard</span>
                        <span class="spanbar">Moderador</span>
                    </div>
                </div>
            </div>

            <div class="linea"></div>

            <nav class="navegacion">
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item" onclick="toggleSidebar()">
                        <a href="#" class="sidebar__menu-link">
                            <i class="fas fa-utensils"></i>
                            <span class="spanbar">Recetas</span>
                        </a>
                    </li>                
                    <li class="sidebar__menu-item">
                        <a href="{{route('usuario.moderador', Auth::user()->id)}}" class="sidebar__menu-link">
                            <i class="fas fa-comments"></i> 
                            <span class="spanbar">Comentarios</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="{{route('usuario.moderadorAdd', Auth::user()->id)}}" class="sidebar__menu-link">
                            <i class="fas fa-user-circle"></i> 
                            <span class="spanbar">Añadir moderadores</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>

        <!-- Adentro de aqui va el contenido de las vistas del moderador -->
        <main class="option-grid">

            {{$slot}}

        </main>


        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script src="{{asset('js/sideBar.js')}}"></script>
    </body>
</x-Layout>