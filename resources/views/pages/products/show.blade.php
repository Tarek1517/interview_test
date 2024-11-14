@extends('layouts.dashboard')
@section('dashboard')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap bg-gray-100 ">
            <div class="w-12/12 lg:w-12/12 bg-white p-5 rounded-lg shadow-md mx-auto">

                <h2 class="text-center pb-3"><strong>Product Details</strong></h2>
                @include('alert.masseges')

                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    <!-- Back Link -->
                    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 mb-6 inline-block">← Back to Products</a>
            
                    <!-- Product Details -->
                    <div class="bg-white rounded-lg shadow-lg p-6 md:flex">
                        <!-- Product Image -->
                        <div class="md:w-1/2 mb-6 md:mb-0">
                            <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg">
                        </div>
            
                        <!-- Product Information -->
                        <div class="md:w-1/2 md:pl-8">
                            <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
            
                            <!-- Categories -->
                            <p class="text-gray-600 mt-2 text-lg">
                                Categories: 
                                @foreach ($product->category as $cat)
                                    <span class="text-gray-800">{{ $cat->name }}</span>@if (!$loop->last), @endif
                                @endforeach
                            </p>
            
                            <!-- Description -->
                            <div class="mt-4">
                                <h2 class="text-2xl font-semibold text-gray-800">Description</h2>
                                @foreach ($product->feature as $feature)
                                    <p class="text-gray-600 mt-2">{{ $feature->description }}</p>
                                @endforeach
                            </div>
        
                        </div>
                    </div>
                </div>
               
            </div>

        </div>

    </div>
@endsection
