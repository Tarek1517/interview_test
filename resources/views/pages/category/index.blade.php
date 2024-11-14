@extends('layouts.dashboard')
@section('dashboard')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap bg-gray-100">
            <div class="w-12/12 lg:w-12/12 bg-white p-8 rounded-lg shadow-md mx-auto">

                <h2 class="pb-3"><strong>Category List</strong></h2>
                @include('alert.masseges')

                <div class="flex items-center justify-between gap10 flex-wrap pb-5 pt-3">
                    <div class="wg-filter flex-grow">
                        <form class="form-search" method="GET" action="{{ route('category.list') }}">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." name="name"
                                    value="{{ old('name', $search) }}">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>

                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('add.category') }}"><i class="icon-plus"></i>Add
                        new</a>

                    <a class="tf-button style-2" href="{{ route('category.list') }}"><i class="fa-solid fa-broom"></i></a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-center text-gray-600 border border-gray-200"
                                    style="font-size: 20px;">ID</th>
                                <th class="px-4 py-2 text-center text-gray-600 border border-gray-200"
                                    style="font-size: 20px;">Category Name</th>
                                <th class="px-4 py-2 text-center text-gray-600 border border-gray-200"
                                    style="font-size: 20px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_category as $category)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2 text-gray-800 border border-gray-200 text-center"
                                        style="font-size: 17px;">
                                        {{ ($all_category->currentPage() - 1) * $all_category->perPage() + $loop->index + 1 }}
                                    </td>
                                    <td class="px-4 py-2 text-gray-800 border border-gray-200 text-center"
                                        style="font-size: 17px;">
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-4 py-2 border border-gray-200 justify-content-center"
                                        style="font-size: 17px;">
                                        <div class="list-icon-function justify-content-center">
                                            <a href="{{ route('edit.category', $category->id) }}"
                                                class="text-blue-500 hover:text-blue-700 mr-4">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('delete.category', $category->id) }}"
                                                class="text-red-500 hover:text-red-700"  onclick="return confirm('Are you sure you want to delete this item?')"
                                                id="delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                        {{ $all_category->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
