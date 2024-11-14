@extends('layouts.dashboard')
@section('dashboard')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap bg-gray-100 pt-10 pb-20">
            <div class="w-10/12 lg:w-8/12 bg-white p-8 rounded-lg shadow-md mx-auto">

                <h2 class="text-center pb-3"><strong>Add Product</strong></h2>
                @include('alert.masseges')
                <form action="{{ route('product.update', $editProduct->id) }}" method="post" class="space-y-6"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mb-2" style="font-size: 14px; font-weight: 700;">
                            Product Name <span class="text-red-500">*</span>
                        </div>
                        <input type="text" name="name" id="name"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400"
                            placeholder="Product Name" value="{{ $editProduct->name }}" required>
                    </div>

                    <div class="mt-6">
                        <div class="mb-2" style="font-size: 14px; font-weight: 700;">
                            Category <span class="text-red-500">*</span>
                        </div>
                        <div>
                            <select
                                class="your-select2-dropdown js-example-basic-multiple block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                name="category_id[]" multiple required>
                                @foreach ($all_categories as $category)
                                    <option value="{{ $category->id }}" @if ($editProduct->category->contains('id', $category->id)) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div>
                        <div class="body-title mb-10">Upload images <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style=" border-radius: 10px;">
                                <img src="{{ asset('storage/images/products/') }}/{{ $editProduct->image }}" class="effect8"
                                    alt="">
                            </div>
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to
                                            browse</span></span>
                                            <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                    @foreach ($editProduct->feature as $features)
                        <div>
                            <div class="mb-2" style="font-size: 14px; font-weight: 700;">
                                Features Description <span class="text-red-500">*</span>
                            </div>
                            <textarea name="description[]" id="description"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-[12px] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400"
                                placeholder="Features Description" required>{{ $features->description }}</textarea>
                        </div>
                    @endforeach
                    <span id="moreFeatures" class="form-style-1 mt-5"></span>

                    <div class="bot d-md-flex justify-content-md-end">
                        <div></div>
                        <button type="button" class="btn btn-outline-primary px-5 py-2" data-toggle="modal"
                            id="btn-Features">Add More</button>
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
