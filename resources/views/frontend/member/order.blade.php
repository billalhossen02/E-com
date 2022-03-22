<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">




<div class="container">
    <div class="row">
        <div class="col-md-8">
 
            <table class="table">
                <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach ($products as $product)
        
                <tr>    
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ asset('image/'.$product->image) }}" alt="" style="height: 40px"></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>

                        <a href="{{ url('show/product/'.$product->id) }}">  <button class="btn btn-primary"><i class="las la-eye"></i></button></a>
                       <a href="{{ url('edit/product/'.$product->id) }}"> <button class="btn btn-success "><i class="las la-edit"></i></button></a>
                      <button class="btn btn-warning"><i class="la la-automobile"></i></button>
                      <a href="{{ url('delete/product/'.$product->id) }}">   <button class="btn btn-danger"><i class="las la-trash"></i></button></a>

                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>