<x-app-layout>
    <x-slot name="header">
        <div>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
               <!-- Titre de l'article -->
                    <x-input-label for="title" :value="Title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block">

               <!--Image-->
               
                    <x-input-label for="image" :value="Image" />
                    <input id="image" name="image" type="file" class="mt-1 block text-sm w-full border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline:none" />
              

                <!-- Contenu de l'article -->
                
                    <x-input-label for="content" :value="Contenu" />
                    <textarea id="content" name="content" rows="10" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>

                    <!--Button Soumettre-->
                    <x-primary-button class="mt-4">Publier l'article</x-primary-button>

            </form>
        </div>
    </x-slot>
</x-app-layout>
