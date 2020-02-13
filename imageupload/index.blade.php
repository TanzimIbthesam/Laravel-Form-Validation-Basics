
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="container">
        <div class="row">
         <div class="card">
             <div class="card-header">
                 File Upload
             </div>
             <div class="card-body">

             <form action="{{'/imageupload/upload'}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="name" name="name" class="form-control" id="">
                </div>
              {{-- <p class="text-danger">
                @error('name')
                {{$message}}
                @enderror
              </p> --}}




                        <div class="form-group">

                  <input type="file" name="upload_image" id="" class="form-control" placeholder="Upload your image" aria-describedby="helpId">
                        </div>
                        <p class="text-danger">
                            @if ($errors->any())

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-warning">{{$error}}</p>
                                    @endforeach
                                </ul>

                        @endif
                            {{-- @error('upload_image')
                            {{$message}}
                            @enderror --}}
                          </p>
                        .<div class="form-group">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>



             </div>
         </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-md-8">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Sl no</th>
                         <th>Name</th>
                         <th>Photo</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>

                     @foreach($images  as $images)

                     <tr>


                     <td>{{$loop->index+1}}</td>

                         <td>
                            @if((!$images->upload_image))
                            <img src="/public2/nopic.jpg" width="50px" height="50px">
                        @else
                         <img src="{{asset('public2')}}/{{$images->upload_image}}" width="50px" height="50px">
                        @endif

                        </td>
                        <td>{{$images->name}}</td>



                     <td><a class="form-control bg-success text-center text-white" href="editimage/{{$images->id}}">Edit</a></td>
                     <td>
                        <form method="post" action="/deleteimage/{{ $images->id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                     <td>
                        <form method="post" action="/deleteallimage/{{ $images->id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete All</button>
                        </form>

                    </td>

                       @endforeach
                 </tbody>
             </table>
           </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

