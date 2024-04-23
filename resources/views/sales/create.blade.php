@extends('dashboard')
@section('content')
<div class="bg-white shadow-lg rounded px-8 mt-12 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="mb-6">
      <h1 class="text-2xl">Sales</h1>
    </div>
    <form method="POST" action="#" id="frmInvoice">
        @csrf
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="#">
            Product Code
          </label>
          <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="barcode" id="barcode" type="text" placeholder="Product ID" required>
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="#">
              Product Name
            </label>
            <input class="appearance-none block w-full bg-gray-300 text-grey-darker border border-red rounded py-3 px-4 mb-3" name="pname" id="pname" type="text" placeholder="Product Name" disabled>
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="#">
              Price
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="pro_price" id="pro_price" type="text" placeholder="Price">
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="#">
              Quantity
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="qty" id="qty" type="text" placeholder="Quantity" required>
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="#">
              Amount
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="total_cost" id="total_cost" type="text" placeholder="Please enter #">
        </div>

      </div>
      <button onclick="addProduct()" class="bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-600">Add</button>
    </form>  
  </div>
  <hr />
  <div class="pt-2">    
      <div class="table w-full p-2">
          <h1 class="pb-3 text-2xl">Product</h1>
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
                    
              </tbody>
          </table>
      </div>
  </div>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

var version_id = null;
var current_stock = 0;
var product_no = 0;

getProductCode();

function getProductCode() {
    $('#barcode').empty();
    $('#barcode').keyup(function(e) {
        var q = $('#barcode').val();
        if($('#barcode').val() == '') {
            $.alert({
                title: 'Error',
                content: 'Please select customer',
                type: 'red',
                autoClose: 'ok|2000'
            })
            return false;
        }
        $.ajax({
            type: 'POST',
            url: '{{ route('search')}}',
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            data: {
                barcode: $('#barcode').val(),_token: '{{csrf_token}}'
            },
            success: function(data) {
                console.log(data);
                $('#pname').val(data[0].product_name);
                $('#pro_price').val(data[0].price)
            },
            error: function(xhr, status, error) {

            }
        })
    })
}

function addProduct() {
    var product = {
        barcode: $('#barcode').val(),
        pname: $('#pname').val(),
        pro_price: $('#pro_price').val(),
        qty: $('#qty').val(),
        total_cost: $('#total_cost').val(),
        button: '<button type="button" class="bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-600">delete</button>'
    };
    addRow(product);
    $('frmInvoice')[0].reset();
}

var total = 0;
var discount = 0;
var grossTotal = 0;
var qtye = 0;
var barcode = 0;

function addRow(product) {
    console.log(product.total_cot);
    var $tableB = $('#product_list tbody');
    var $row = $('<tr><td><button type="button" name="record" class="bg-blue-500 hover:bg-blue-600 p-2 text-white hover:shadow-lg rounded-lg text-xs font-thin" onclick="deleteRow(this)">Delete</td>' + "<td>" + product.barcode + "</td><td class=\"price\">" + product.pname + "</td><td>" + product.pro_price + "</td><td>" + product.qty + "</td><td>" + product.total_cost)
    $row.data("barcode", product.product_code);
    $row.data("pname", product.product_name);
    $row.data("pro_price", product.price);
    $row.data("qty", product.qty);
    $row.data("total_cost", product.total_cost);
    total += Number(product.total_cost);
    $("#total").val(total);
    console.log(product.total_cost);
    qtye += Number(product.qty);

    $row.find("deleteRow").click(function(event) {
        deleteRow($(event.currentTarget).parent('tr'));
    })
    $tableB.append($row);
}
</script> --}}
@endsection