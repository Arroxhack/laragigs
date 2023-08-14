@props(['listing']) {{-- we passed the listing prop --}}

<x-card> {{-- this matches with the {{$sloth}} thats inside card.blade file --}}
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            {{-- src="{{asset('images/no-image.png')}}" --}}
            src="{{$listing-> logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{url('listing', $listing->id)}}">{{$listing->title}}</a> {{-- eloquent collection syntax instead of $listing["title"] --}}
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
            </div>
        </div>
    </div>
</x-card>
