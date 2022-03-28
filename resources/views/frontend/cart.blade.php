<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<main class="my-8">
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
              @if ($message = Session::get('success'))
                  <div class="p-4 mb-3 bg-green-400 rounded">
                      <p class="text-green-800">{{ $message }}</p>
                  </div>
              @endif
                <h3 class="text-3xl text-bold">Cart List</h3>
              <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                  <thead>
                    <a href="{{route('home')}}"><button class="btn btn-primary" style="float: right">Back</button></a>
                    <tr class="h-12 uppercase">
                      <th class="hidden md:table-cell"></th>
                      <th class="text-left">Name</th>
                      <th class="pl-5 text-left lg:text-right lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="hidden lg:inline">Quantity</span>
                      </th>
                      <th class="hidden text-right md:table-cell"> price</th>
                      <th class="hidden text-right md:table-cell"> Remove </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($cartItems as $item)
                    <tr>
                      <td class="hidden pb-4 md:table-cell">
                        <a href="#">
                          <img src="{{ asset('image/'.$item->attributes->image) }}" class="w-20 rounded" alt="Thumbnail">
                        </a>
                      </td>
                      <td>
                        <a>
                          <p>{{ $item->name }}</p>
                        </a>
                      </td>
                      <td class="justify-center mt-6 md:justify-end md:flex">
                        <div class="h-10 w-28">
                          <div class="relative flex flex-row w-full h-8">
                            
                            <form action="{{ route('cart.update') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{ $item->id}}" >
                            <input  type="number" name="quantity" value="{{ $item->quantity }}" 
                            class="w-6 text-center" />
                            <button type="submit" class="px-1 pb-1 ml-2 text-white bg-purple-500">update</button>
                            </form>
                          </div>
                        </div>
                      </td>
                      <td class="hidden text-right md:table-cell pb-4">
                        <span class="font-medium lg:text-base ">
                            ${{ $item->price }}
                        </span>
                      </td>
                      <td class="hidden text-right md:table-cell">
                        <form action="{{ route('cart.remove') }}" method="POST">
                          @csrf
                          <input type="hidden" value="{{ $item->id }}" name="id">
                          <button class="px-1 py-2 text-white bg-red-500"><span class="las la-trash"></span></button>
                      </form>
                        
                      </td>
                    </tr>
                    @endforeach
                     
                  </tbody>
                </table>
                <div>
                  <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="px-2 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                    <div style="float: right">
                      Total: ${{ Cart::getTotal() }}
                     </div>
                  </form>
                   <div style="float: right">
                      <a class="btn btn-warning" href="{{route('home')}}">Continue Shopping</a>
                      <a class="btn btn-success" href="{{route('payment')}}">Proceed To Checkout</a> 
                     </div>
                </div>


              </div>
            </div>
          </div>
    </div>
</main>

