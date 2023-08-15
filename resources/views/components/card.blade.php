

<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}> {{-- attributes variable to change specific card, will use this class by default but it will also MERGE any other classes that we add --}}
     
    {{$slot}} {{-- Lo que hacemos de esta forma es colocar lo que queremos tenga este formato entre tags <x-card> </x-card>, {{$slot}} representa lo que vamos a colocar --}}
</div>