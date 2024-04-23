@extends('dashboard')
@section('content')
<div class="bg-white shadow-lg rounded px-8 mt-12 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="mb-6">
      <h1 class="text-2xl">Fill up the form to add new product.</h1>
    </div>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="product_name">
            Product Name
          </label>
          <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="product_name" id="product_name" type="text" placeholder="Please enter product name">
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Category
            </label>
            <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="category_id" id="category_id">
                @foreach($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Brand
            </label>
            <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="brand_id" id="brand_id">
                @foreach($brands as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="price">
              Price
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="price" id="price" type="text" placeholder="Please enter price">
        </div>

      </div>
      <button class="bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-600">Submit</button>
    </form>  
  </div>
  <hr />
  <div class="pt-2">    
      <div class="table w-full p-2">
          <h1 class="pb-3 text-2xl">All Product</h1>
          <table class="w-full border">
              <thead>
                  <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            ID
                        </div>
                    </th>

                    <th class="p-2 border-r w-5/12 text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Product Name
                        </div>
                    </th>

                    <th class="p-2 border-r w-2/12 text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Category
                        </div>
                    </th>

                    <th class="p-2 border-r w-2/12 text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Brand
                        </div>
                    </th>

                    <th class="p-2 border-r w-1/12 text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Price
                        </div>
                    </th>
                      
                    <th class="p-2 border-r w-2/12 text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Action
                        </div>
                    </th>
                  </tr>
              </thead>
              <tbody>
                    @foreach( $products as $key => $product )
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="border-r">{{ ++$key }}</td>
                            <td class="border-r">{{ $product->product_name}}</td>
                            <td class="border-r">{{ $product->category->category_name}}</td>
                            <td class="border-r">{{ $product->brand->brand_name}}</td>
                            <td class="border-r">{{ $product->price}}</td>
                            <td class="flex justify-center space-x-2 p-2">
                                <a href="{{ route('product.edit', $product->id)}}">
                                    <button class="bg-blue-500 hover:bg-blue-600 p-2 text-white hover:shadow-lg rounded-lg text-xs font-thin">Edit</button>
                                </a>
                            
                                <form action="{{ route('product.destroy', $product->id)}}" method="POST">
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