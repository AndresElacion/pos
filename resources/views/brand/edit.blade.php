@extends('dashboard')
@section('content')
<button>
    <a href="/brand" class="bg-gray-400 hover:bg-gray-500 text-white p-2 rounded-lg">back</a>
</button>
<div class="bg-white shadow-md rounded px-8 mt-12 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="mb-6">
        <h1 class="text-2xl">Edit brand.</h1>
    </div>
    <form method="POST" action="{{ route('brand.update', $brand->id) }}">
        @csrf
        @method('PATCH')
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="brand_name">
            Brand Name
          </label>
          <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="brand_name" id="brand_name" type="text" value="{{ $brand->brand_name }}">
        </div>
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">
              Status
            </label>
            <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="status" id="status">
                <option selected disabled>Please select status</option>
                <option value="1" {{ $brand->status == 1 ? 'selected' : ''}}>Available</option>
                <option value="2" {{ $brand->status == 2 ? 'selected' : ''}}>Not available</option>
            </select>
          </div>
      </div>
      <button class="bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-600">Update</button>
    </form>  
  </div>
@endsection