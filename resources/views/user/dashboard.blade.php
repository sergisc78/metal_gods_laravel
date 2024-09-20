@include('user.navbar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="text-center mt-5 w-100">
    <h2 class="text-center mb-4 choose-option">{{Auth::user()->name}}, choose an option</h2>
    <a href="{{url('user/reviews')}}"  class="btn btn-dark me-3 mb-2" title="Reviews"><img src="{{url('img/document.png')}}" alt="review_icon" width="100px" height="50px" title="Reviews"></a>
    <a href="{{url('user/bands')}}" class="btn btn-dark me-3 mb-2"><img src="{{url('img/band.png')}}" alt="bands_icon" width="100px" height="50px" title="Bands"></a>
    <a href="{{url('user/genres')}}" class="btn btn-dark mb-2"><img src="{{url('img/devil.png')}}" width="100px" height="30px" alt="devil_icon" title="Genres"></a>

</div>
@include('admin.footer')