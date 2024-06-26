@include('admin.navbar')
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

<div class="text-center mt-5 ">
    <h2 class="text-center mb-3">Choose an option</h2>
    <a href="{{url('write-review')}}"  class="btn btn-primary me-3">Write a review </a>
    <a class="btn btn-primary me-3">View your reviews</a>
    <a class="btn btn-primary me-3">Add a band</a>
    <a class="btn btn-primary">Add style</a>

</div>
@include('admin.footer')
