<link rel="stylesheet" href="css/product.css">

        <h3 style="text-align:left" class="pt-10">Top Trendings Category</h3>
                <div class="owl-theme owl-carousel posi">
                    @foreach($categories as $category)
                    <div class="item"><img class="img" src="{{asset('Category/'.$category->image)}}" alt=""><h5><span class="title">{{$category->name }}</span></h5></div>
                    @endforeach
                </div>
            
<h3 style="text-align:center" class="pt-10"> Features Product </h3>

<div class="container">
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

