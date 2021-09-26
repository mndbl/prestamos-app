<section id="assign-roles" class="mt-4 bg-white rounded-md">
    <header class="border-2 border-blue-600 py-2 text-blue-600 px-6 text-center rounded-t-md">
        Asignar Roles
    </header>
    <div class="flex divide-x-2">
        <div class="w-1/2 divide-y-2">
            <div class="w-full bg-blue-600 text-white font-bold text-center">Perfiles</div>
            <div class="w-full">
                <button wire:click="$toggle('mostrarPerfiles')"
                    class="px-4 w-full py-2 rounded-md border-2 border-blue-600 text-gray-600">
                    Seleccionar Perfil
                </button>

                @if ($mostrarPerfiles)
                    <div class="relative bg-white">
                        <div class="relative bg-white">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </span>

                            <input type="text"
                                class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                placeholder="Search" />
                        </div>
                        <div class="py-2">
                            @forelse ($perfiles as $perfil)
                                <button wire:click="$set('profile_idSel', {{ $perfil->id }})"
                                    class="flex items-center px-4 py-3 transition-colors duration-200 transform border-b hover:bg-gray-100 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <img class="object-cover w-8 h-8 mx-1 rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        alt="avatar">
                                    <p class="mx-2 text-sm text-gray-600 dark:text-white">
                                        <span class="font-bold">{{ $perfil->user->name }}</span>
                                    </p>
                                </button>
                            @empty

                            @endforelse
                        </div>

                    </div>
                @endif
            </div>
        </div>
        <div class="w-1/2 divide-y-2">
            <div class="w-full bg-blue-600 text-white font-bold text-center">Roles</div>
            <div class="w-full">
                <select name="roles" id="roles" class="px-4 w-full rounded-md border-2 border-blue-600 text-gray-600">
                    <option value="">Seleccione Rol</option>
                    @forelse ($roles as $rol)
                        <option value={{ $rol->id }}>{{ $rol->nombre }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
    </div>
</section>
