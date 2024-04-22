@extends('dashboard')
@section('content')
<div class="bg-white shadow-lg rounded px-8 mt-12 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="mb-6">
      <h1 class="text-2xl">Fill up the form to add new brand.</h1>
    </div>
    <form method="POST" action="{{ route('brand.store') }}">
        @csrf
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="brand_name">
            Brand Name
          </label>
          <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="brand_name" id="brand_name" type="text" placeholder="Please enter brand name">
        </div>
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">
              Status
            </label>
            <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="status" id="status">
                <option selected>Please select status</option>
                <option value="1">Available</option>
                <option value="2">Not available</option>
            </select>
          </div>
      </div>
      <button class="bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-600">Submit</button>
    </form>  
  </div>
  <hr />
  <div class="pt-2">    
      <div class="table w-full p-2">
          <h1 class="pb-3 text-2xl">All Brand</h1>
          <table class="w-full border">
              <thead>
                  <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            ID
                        </div>
                    </th>

                    <th class="p-2 border-r w-9/12 text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Name
                        </div>
                    </th>

                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Status
                        </div>
                    </th>
                      
                      <th class="p-2 border-r text-sm font-thin text-gray-500">
                          <div class="flex items-center justify-center">
                              Action
                          </div>
                      </th>
                  </tr>
              </thead>
              <tbody>
                    @foreach( $brands as $key => $brand )
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="border-r">{{ ++$key }}</td>
                            <td class="border-r">{{ $brand->brand_name}}</td>
                            <td class="border-r">
                                @if ( $brand->status == 1)
                                    Available
                                @else
                                    Not available
                                @endif
                            </td>
                            <td class="flex justify-center space-x-2 p-2">
                                <a href="{{ route('brand.edit', $brand->id)}}">
                                    <button class="bg-blue-500 hover:bg-blue-600 p-2 text-white hover:shadow-lg rounded-lg text-xs font-thin">Edit</button>
                                </a>
                            
                                <form action="{{ route('brand.destroy', $brand->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 p-2 text-white hover:shadow-lg rounded-lg text-xs font-thin">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
          </table>
      </div>
  </div>
@endsection