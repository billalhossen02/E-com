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



    <table class=   "table table-user-information">
        <tbody>
          <tr>
            <td>Name:</td>
            <td>{{ $products->name }}</td>
          </tr>
          <tr>
            <td>Image:</td>
            <td><img src="{{ asset('image/'.$products->image) }}" alt="" style="height: 100px"></td>
          </tr>

           <tr>
            <td>Price:</td>
            <td>{{ $products->price }}</td>
          </tr>

          <tr>
            <td>Description:</td>
            <td>{{ $products->description }}</td>
          </tr>
       </tbody>
      </table>  




</div>
</x-app-layout>