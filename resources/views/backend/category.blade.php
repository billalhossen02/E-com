<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category') }}
        </h2>
    </x-slot> 
    <br> 
    <div class="container">
        <div class="row">
            <div class="col-md-8">
     
                <table class="table">
                    <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach ($categories as $category)
            
                    <tr>    
                        <td>{{ $i++ }}</td>
                        <td>{{$category->name}}</td>
                        <td><img style="height: 60px; width: 70px" src="{{asset('Category/'.$category->image)}}" alt=""></td>
                        <td><a href="{{url('category/delete/'.$category->id)}}"><button class="btn btn-danger"><span class="la la-trash"></span></button></a></td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
         <div class="col-md-3">
        <h4 class="">Add Category</h4><br>
        <form action="{{ route('addCategory') }}" method="post" enctype="multipart/form-data">
            @csrf
           

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Name">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
              </div>

           <button name="submit" class="btn btn-primary">Add Category</button>
          </form>

      </div>
    </div>

</x-app-layout>



