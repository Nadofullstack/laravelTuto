<x-app-layout>
    <x-slot name="header">
        <h2>article</h2>
    </x-slot>

    <div>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <x-input-label for="title" value="Title" />
                <x-text-input id="title" name="title" type="text">

                
                <x-input-label for="image" value="Image" />
                <x-text-input id="image" name="image" type="file"/>
                    
                </x-text-input>
                <x-input-label for="content" value="Contenu" />
                <textarea id="content" name="content" rows="10" ></textarea>

                <!--Button Soumettre-->
                <x-primary-button >Publier l'article</x-primary-button>

        </form>
    </div>
  
</x-app-layout>
