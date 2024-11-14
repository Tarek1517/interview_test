@extends('layouts.dashboard')
@section('dashboard')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap bg-gray-100 ">
            <div class="w-12/12 lg:w-12/12 bg-white p-5 rounded-lg shadow-md mx-auto">

                <h2 class="text-center pb-3"><strong>All Products</strong></h2>
                @include('alert.masseges')
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($products as $product)
                        <div class="bg-white p-6 rounded-lg shadow-lg">

                            <a href="{{ route('product.show', $product->id) }}" class="block">

                                <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                    alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">


                                <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
                            </a>
                            <p class="text-gray-400 mt-2 text-lg">
                                @foreach ($product->category as $key => $cat)
                                    {{ $cat->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                            <p class="text-gray-600 mt-2">
                                {{ $product->feature->first()->description ?? 'No description available' }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination pt-5">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>

    </div>
@endsection
