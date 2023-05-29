@if(session()->has('errors'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
         class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white text-center px-20 py-3">
        @foreach(session()->get('errors')->all() as $error)
            <p>
                {{$error}}
            </p>
        @endforeach
    </div>
@endif


