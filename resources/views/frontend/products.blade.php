<link rel="stylesheet" href="css/product.css">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<h1 style="text-align:center"> Features Product </h1>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3"> <span>Hottest Giveaways</span> <span class="custom-badge text-uppercase">See More</span> </div>
    <div class="row">


        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card">
                {{-- <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center time"> <i class="fa fa-clock-o"></i> <small class="ml-1">3 Days</small> </div> <img src="pic/tag.png" width="20">
                </div> --}}
               <a href="{{ url('show/details/'.$product->id) }}"> <div class="text-center"> <img src="{{ asset('image/'.$product->image) }}"> </div></a>
                <div class="text-center">
                    <h5>{{ $product->name }}</h5> <span class="text-success">${{$product->price}}</span>
                </div>
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->name }}" name="name">
                    <input type="hidden" value="{{ $product->price }}" name="price">
                    <input type="hidden" value="{{ $product->image }}"  name="image">
                    <input type="hidden" value="1" name="quantity">
                    <button class="btn btn-outline-dark"><i class="fa fa-plus"></i></button><br>
                </form>
                
            </div>
        </div>
    @endforeach
    </div>
</div>