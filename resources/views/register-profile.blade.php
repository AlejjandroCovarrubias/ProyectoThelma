<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('img/c-cocino.png') }}" width="160" height="165" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <p class="mb-4 text-sm text-gray-600">En C-COCINO queremos brindarte las mejores opciones de recetas de cocina. Para ello, necesitamos conocer un poco más de ti.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$email" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="nickname" value="Nickname" />
                <x-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="$nickname" required />
            </div>

            <div class="mt-4">
                <x-label for="description" value="{{ __('Profile Description') }}" />
                <textarea id="description" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" required>{{ old('description') }}</textarea>
            </div>

            <div class="mt-4">
                <x-label for="country" value="{{ __('Country') }}" />
                <select id="country" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="country" required>
                    <option value="US">Estados Unidos (USA)</option>
                    <option value="GB">Reino Unido (UK)</option>
                    <option value="CA">Canadá</option>
                    <option value="AU">Australia</option>
                    <option value="NZ">Nueva Zelanda</option>
                    <option value="IE">Irlanda</option>
                    <option value="ZA">Sudáfrica</option>
                    <option value="JM">Jamaica</option>
                    <option value="MX">México</option>
                    <option value="ES">España</option>
                    <option value="AR">Argentina</option>
                    <option value="BR">Brasil</option>
                    <option value="CO">Colombia</option>
                    <option value="PE">Perú</option>
                    <option value="EC">Ecuador</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="birthdate" value="{{ __('Date of Birth') }}" />
                <x-input id="birthdate" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="date" name="birthdate" :value="old('birthdate')" required />
            </div>

            <div class="mt-4">
                <p class="text-sm text-gray-600">Selecciona las categorías de recetas que te gustaría ver en tu página de inicio.</p>
                
                <div class="mt-4 grid grid-cols-2 gap-4">
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Pan</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Desayunos</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Desayunos</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Comidas</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Cenas</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Pastas</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Comida italiana</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Comida china</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Pollo</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Res</button>
                    <button onclick="toggleCategory(this)" class="block w-full h-12 rounded-md border border-gray-300 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" type="Button">Pescado</button>
                </div>
            </div>

            <div class="mt-8">
                <x-button class="ms-4">
                    {{ __('Continue') }}
                </x-button>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                
            @endif
        </form>
    </x-authentication-card>
    <script>
        function toggleCategory(element) {
            element.classList.toggle('bg-gray-200');
        }
    </script>
</x-guest-layout>
