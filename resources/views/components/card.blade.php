<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}> {{-- attributes variable to change specific card, will use this class by default but it will also MERGE any other classes that we add --}}
     
    {{$slot}} {{-- whatever we pass in this variable will be output here --}}
</div>