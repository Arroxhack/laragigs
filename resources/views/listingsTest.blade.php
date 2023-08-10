@extends('layout')

@section('content')
    

{{-- 
@php /* Raw php blade directives */ /* This can help doing smth like filtering, smth you cant do in your controller or route and you can do it in your view */
    $test = 1;
    echo $test;
    echo "<br>"
@endphp
{{$test}}
 --}}

 {{-- @if(count($listings) == 0)
 <p>No listings found</p>
 @endif --}}

<h1>{{$heading}}</h1> {{-- Similar to jsx syntax --}}



@unless(count($listings) == 0)
    @foreach ($listings as $listing) {{-- blade Directives --}}
        <h2>
            <a href="{{url('listing', $listing['id'])}}">{{$listing['title']}}</a> {{-- Forma de sintaxis con href!!!! --}}
        </h2>
        <p>
            {{$listing['description']}}
        </p>
    @endforeach
    @else
    <p>No listings found</p>
@endunless



@endsection


