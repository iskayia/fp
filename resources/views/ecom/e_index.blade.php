<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ecom</title>

   
</head>
<body>
    <h3>Fitri Parfume</h3>

    <table border="1">
        <tr>
            <th>Nama Parfum</th>
            <th>Harga</th>
            <th>gambar produk</th>
        </tr>

        @foreach($produk as $p)
        <tr>
            <td>{{$p->nama_produk}}</td>
            <td>{{$p->harga_produk}}</td>
            <td>
               <img src="{{env('URL_IMAGE') . $p->gambar_produk}}" alt="">
            </td>
        </tr>
       @endforeach

       
    </table>

    <div class="container">
        
        <div class="panel panel-primary">
          <div class="panel-body">
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            <img src="images/{{ Session::get('image') }}">
            @endif
           
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
       
                <div class="mb-3">
                    <label class="form-label" for="inputImage">Image:</label>
                    <input
                        type="file"
                        name="image"
                        id="inputImage"
                        class="form-control @error('image') is-invalid @enderror">
       
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            
            </form>
           
          </div>
        </div>
    </div> 
</body>

</html>