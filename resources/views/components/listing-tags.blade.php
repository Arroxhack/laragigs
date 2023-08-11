@props(['tagsCsv']) {{-- Csv = comma separeted value list --}}

@php
    $tags = explode(',',$tagsCsv); // converting comma separeted list from database into an array splitted by commas inside $tags variable
@endphp

<ul class="flex">
    @foreach ($tags as $tag)

    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/laragigs/public/?tag={{$tag}}">{{$tag}}</a>
    </li>

    @endforeach
</ul>