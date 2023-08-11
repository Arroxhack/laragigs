@if(session()->has('message')) {{-- session helper ->has('message'), we put the string we used, message, success, error, etc --}}

    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" {{-- !!!! x-data="{show: true}" this is Alpine JS. We want the message to disapear in a certain amountof time --}}
    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3"
    > 
        <p>
            {{session('message')}}
        </p>
    </div>

@endif