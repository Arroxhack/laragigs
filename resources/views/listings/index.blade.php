<x-layout>

    @include('partials/_hero')    
    @include('partials/_search')
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        
        
        @unless(count($listings) == 0)
        
        @foreach ($listings as $listing) {{-- blade Directives --}}
        
        {{-- Way to access listing-card component --}}
        <x-listing-card :listing="$listing" /> {{-- Syntax to pass a variable (!!!!!!!! IMPORTAN LOS ESPACIOS) :listing='$listing' --}}
        
        @endforeach 
        @else
        <p>No listings found</p>
        @endunless
        
    </div>

    <div class="mt-6 p-4"> {{-- Pagination !!!! --}}
        {{$listings->links()}} {{-- No se para que usa la funcion links(), ya poniendo solo $listings funciona --}}
    </div>
    
</x-layout>
    
    