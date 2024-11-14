@extends('layouts.dashboard')
@section('dashboard')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap bg-gray-100 pt-10 pb-20">
            <div class="w-10/12 lg:w-8/12 bg-white p-8 rounded-lg shadow-md mx-auto">
                
                <h2 class="text-center pb-3"><strong>Add Category</strong></h2>
                @include('alert.masseges')
                <form action="{{ route('store.category') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-lg font-bold text-gray-700 mb-1">Category Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full px-4 py-3 mt-3 border border-gray-300 rounded-lg shadow-sm 
                                  focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400"
                            placeholder="Category name" value="{{ old('name') }}" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg 
                                   hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 
                                   focus:ring-offset-2">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
