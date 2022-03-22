<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('All Product') }}
      </h2>
  </x-slot> 
  <br>  


<div class="container">
<div class="col-md-4">

    <form action="{{ url('update/product/'.$products->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{$products->name}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <img src="{{ asset('image/'.$products->image) }}" alt="" style="height: 100px"><br>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1"  value="image/{{ $products->image }}">
            
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" name="price" class="form-control" id="exampleInputEmail1"  value="{{ $products->price }}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1"  value="{{ $products->description }}">
          </div>

       <button name="submit" class="btn btn-primary">Update Product</button>
      </form>


  </div>
</div>

</x-app-layout>