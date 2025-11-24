<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <!-- Image de couverture-->
    @if ($article->image_path)
    <div class="mb-4">
        <img src="{{ asset('storage/'.$article->image_path) }}" alt="Image de couverture" class="w-full h-auto rounded">

    </div>
    
    @endif

    <div class="prose prose-lg">
        {!! nl2br(e($article->content)) !!}
</x-app-layout>
