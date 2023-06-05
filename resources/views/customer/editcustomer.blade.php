@extends('layouts.layouts')

@section('content')
<div class="relative flex items-top justify-center full-height">
    <div class="content">
        <div class="title m-b-md pt-5">
            Update Customer Details
        </div>
        <br>
        <div>
            <form action="/admin/customers/{{ $customer->id }}" method="POST">
                @csrf
                @method('PUT')

                <label for="stockroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stockroom</label>
                    <select id="stockroom" name='stockroom' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value={{ old('stockroom', $customer->stockroom) }}>{{ old('stockroom', $customer->stockroom) }}</option>
                        @foreach($activeStockrooms as $stockroom)
                            @if ($stockroom->is_active && !$stockroom->is_occupied)
                                <option value="{{ $stockroom->name }}" {{ (old('stockroom', $customer->stockroom) == $stockroom->name) ? 'selected' : '' }}>{{ $stockroom->name }}</option>
                            @endif
                        @endforeach
                    </select>

                <br>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer/Company Name:</label>
                <input type="text" id="name" name='name' value="{{ old('name', $customer->name) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
                <h6>Contract Period</h6><br>
                <label for="start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date:</label>
                <input type="date" id="start" name='start' value="{{ old('start', $customer->start) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <label for="end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date:</label>
                <input type="date" id="end" name='end' value="{{ old('end', $customer->end) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <br>
                <label for="used_access" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer User Access Name:</label>
                <input type="text" id="used_access" name='used_access' value="{{ old('used_access', $customer->used_access) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <br>
                
                <label for="document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documentation Requiremets</label>
                <textarea id="document" rows="4" name='doc_req' value="{{ old('doc_req', $customer->doc_req) }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Delivery Receipt/Transmittal Form..."></textarea>
                <br>
                <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes:</label>
                <textarea id="note" rows="4" name='remarks' value="{{ old('remarks', $customer->remarks) }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Customer's notes and/or other instruction..."></textarea>

                <br>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> 

                <br>
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="{{ old('is_active', $customer->is_active) ? 'checked' : '' }}" name='is_active' class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Activate</span>
                </label>
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="{{ old('with_inventory', $customer->with_inventory) ? 'checked' : '' }}" name='with_inventory' class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">With Inventory</span>
                </label>

                <br>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update Customer</button>
            </form>
            <br>
        </div>
    </div>
</div>

@endsection