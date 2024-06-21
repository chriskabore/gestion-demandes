<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-3 px-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <h6>Welcome to your dashboard.</h6>
                      <h5>{{Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
