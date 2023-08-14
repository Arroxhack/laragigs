<x-layout>    
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Gig
            </h2>
            <p class="mb-4">Edit: {{$listing->title}}</p>
        </header>

        <form action="/laragigs/public/listings/{{$listing->id}}" method="POST" enctype="multipart/form-data"> {{-- enctype attribute to use an input type file (for the logo) --}}
            {{-- @csrf Laravel directive when having a POST method, !!!! this prevents cross site scripting attacks --}}
            @csrf
            @method('PUT') {{-- Method directive to be able to use a PUT method --}}
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    value="{{$listing->company}}" {{-- pre field inputs with de data that is already in the database --}}
                />

                @error('company') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{$listing->title}}" {{-- pre field inputs with de data that is already in the database --}}
                />

                @error('title') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{$listing->location}}" {{-- pre field inputs with de data that is already in the database --}}
                />

                @error('location') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{$listing->email}}" {{-- pre field inputs with de data that is already in the database --}}
                />

                @error('email') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{$listing->website}}" {{-- pre field inputs with de data that is already in the database --}}
                />

                @error('website') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{$listing->tags}}" {{-- pre field inputs with de data that is already in the database --}}
                />

                @error('tags') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file" {{-- !!!!!!!! IMPORTANT --}}
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />

                <img
                class="w-48 mr-6 mb-6"
                src="{{$listing-> logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                alt=""
                />

                @error('logo') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc">
                    {{$listing->company}} {{-- pre field inputs with de data that is already in the database --}}
                </textarea>

                @error('description') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Gig
                </button>

                <a href="/" class="bg-black text-white rounded py-2 px-4 hover:bg-gray-400"> Back </a>

            </div>
        </form>
    </div>
</x-layout> 