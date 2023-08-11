<x-layout>    
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Gig
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        <form action="/laragigs/public/listings" method="POST">
            {{-- @csrf Laravel directive when having a POST method, !!!! this prevents cross site scripting attacks --}}
            @csrf

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
                    value="{{old('company')}}" {{-- old helper to keep data if error in input --}}
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
                    value="{{old('title')}}" {{-- old helper to keep data if error in input --}}
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
                    value="{{old('location')}}" {{-- old helper to keep data if error in input --}}
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
                    value="{{old('email')}}" {{-- old helper to keep data if error in input --}}
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
                    value="{{old('website')}}" {{-- old helper to keep data if error in input --}}
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
                    value="{{old('tags')}}" {{-- old helper to keep data if error in input --}}
                />

                @error('tags') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            {{-- <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                    value="{{old('logo')}}" 
                />

                @error('logo') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div> --}}

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
                    placeholder="Include tasks, requirements, salary, etc"
                >{{old('description')}} {{-- !!!! different because its a text area old helper to keep data if error in input --}}
                </textarea>

                @error('description') {{-- error directive passing the name of the field --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>{{-- do something if this fails --}}
                @enderror

            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Gig
                </button>

                <a href="/" class="bg-black text-white rounded py-2 px-4 hover:bg-gray-400"> Back </a>

            </div>
        </form>
    </div>
</x-layout> 