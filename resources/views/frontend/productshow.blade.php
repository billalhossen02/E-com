<style>
       
        .height-100 {
            height: 100vh
        }

        .card {
            width: 100%;
            border: none;
            height: 250px;
            max-width: 380px;
            overflow: hidden;
            position: relative;
            display: flex;
            cursor: pointer;
            justify-content: center;
            transition: all ease 0.4s;
            background-color:transparent;
            
        }

        .card img {
            transition: all ease 0.4s
        }

        .card:hover img {
            margin-top: -80px
        }

        .card .content {
            width: 100%;
            background: rgba(2, 2, 2, 0.425);
            color: rgb(0, 0, 0);
            position: absolute;
            bottom: -60%;
            margin-left: -8px;
            transition: all ease 0.5s;
            border-radius: 4px;
            box-shadow: 0px -3px 4px rgba(10, 10, 10, 0.09);
            border: 2px solid white;
        }

        .card .content .category {
            font-size: 17px;
            font-weight: 600
        }

        .card .content .price {
            font-size: 17px;
            font-weight: 500;
            color: #0d6efd
        }

        .card .content p {
            font-weight: 500;
            font-size: 12px
        }

        .card:hover .content {
            bottom: 0%
        }

        .buttons button {
            border-radius: 1px;
            margin-bottom: 10px;
            transition: all ease 0.3s
        }

        .content {
            padding: 10px
        }

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<body>
    
        <div class="container mt-5 mb-5">
            <div class="row g-2">
                @foreach($data as $item)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card p-2"  style="background-color:transparent;">
                        <a href="{{ url('show/details/'.$item->id) }}"><div class="text-center"> <img src="{{url('image/'.$item->image)}}" class="img-fluid" width="200"/></div></a>
                        <div class="content">
                            <div class="d-flex justify-content-between align-items-center"> <span class="category">{{$item->name}}</span> <span class="price" style="color: aliceblue">${{$item->price}}</span> </div>
                            <p>{{$item->category}}</p>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$item->id }}" name="id">
                                <input type="hidden" value="{{$item->name }}" name="name">
                                <input type="hidden" value="{{$item->price }}" name="price">
                                <input type="hidden" value="{{$item->image }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                <div class="buttons d-flex justify-content-center"><button class="btn btn-warning">Add to cart</button> </div>
                            </form>
                           <div class="d-flex justify-content-center"><a href={{route('payment')}}><button class="btn btn-outline-dark mr-1">Buy Now</button></a> </div> 
                        </div>
                    </div>
                </div>
        @endforeach
            </div>
        </div>
</body>


