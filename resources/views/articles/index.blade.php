<x-app-layout>
    <x-slot name="header">
        <h2>Articles</h2>
        <a href="{{ route('articles.create') }}">+ Nouvel Articles</a>
    </x-slot>
    <div>
        @if ($articles->isEmpty())
            <p>Vous n'avez pas encore d'articles.</p>
        @else


        @if (session('success'))
        <div id="success" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700" >{{ session('success') }}</div>
        
        @endif
  
      
        <div>

            @foreach ($articles as $article)
                <div>
                    <h3>
                        <a href="{{ route('articles.show',$article) }}" class="text-blue-500 hover:underline"> {{ $article->title }}</a>
                       </h3>
                    {{-- @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    @endif --}}
                    <p>PAr {{ $article->user->name }} .{{ $article->created_at }}</p>
                    <p>{{ Str::limit($article->content, 150) }}</p>
                    
                </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
@push('scripts')
<script>
    // Masquer le message de succès après 5 secondes

   