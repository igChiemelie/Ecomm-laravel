@extends('layouts.app')

@section('content')

 <div id="editModal" class="modal">
        <div class="modal-content container">
            <h4>Edit Product</h4>

           

            <div class="row card">
            <!-- SHOW D USERS PARTICULAR POST -->
                <form method="POST" action="/pages/{{$product->id}}" enctype="multipart/form-data" >

                    @csrf
                    @method('PUT')
                    <div class="input-field col s6">
                        <input type="text" id="productName" name="productName" value="{{$product->productName}}"  class="val" placeholder="Product Name">
                        <label for="productName">Product Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="productPrice" name="productPrice" value="{{$product->productPrice}}"  class="val2" placeholder="Product Price">
                        <label for="productPrice">Product Price</label>
                    </div>
                    
                    <div class="input-field col s12">
                       <input type="text" id="productDetail" name="productDetail" value="{{$product->productDetail}}"  class="val3" placeholder="Product Description">
                        <label for="proDetails">Product Description</label>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="editproductId" id="editproductId">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right"  type="submit" name="productEditBtn" id="productEditBtn">Edit
                                <i class="material-icons right">edit</i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
