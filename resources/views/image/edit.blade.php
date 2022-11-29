<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar imagen') }}
        </h2>
    </x-slot>

    <div class="formulario">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="A" class="bg-white border-b border-gray-200">
                    @if($image->user->image)
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" class="avatar-edit">
                    @endif
                    <form method="POST" action="{{route('image.update')}}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="image_id" value="{{$image->id}}">

                        <div class="mt-4">
                            <label for="image_path">Imagen</label>
                            <x-text-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" autofocus />
                            <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <label for="description">Descripción</label>
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" autofocus value="{{$image->description}}" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Editar publicación') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>