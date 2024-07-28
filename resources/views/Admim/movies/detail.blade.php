<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container w-50"></div>
    <h1>Đây là chi tiết</h1>

    <form action="{{route('movie.detail', $movie)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$movie->title}} " disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Poster</label>
            {{-- <input class="form-control" type="file" name="poster" disabled> --}}
            <br><img src="{{asset('/storage/'. $movie->poster)}}" width="350" alt="">
          </div>
          <div class="mb-3">
            <label  class="form-label">Intro</label>
            <textarea class="form-control" name="intro" rows="3"  disabled>{{$movie->intro}}</textarea>
          </div>
          <div class="mb-3">
            <label  class="form-label">Release_date</label>
            <input type="date" class="form-label" name="release_date" value="{{$movie->release_date}}" disabled>
          </div>
          <div class="mb-3">
            <label  class="form-label">Genes</label>
            <select class="form-select" name="genre_id" id="" disabled>
                @foreach ($genes as $ge ){
                    <option value="{{$ge->id}}"
                        @if ($ge->id == $movie->genre_id)
                            selected
                        @endif
                        >
                        {{$ge->name}}   
                    </option>
                }                  
                @endforeach
            </select>
            <div class="mb-3">
                <a href="{{route('movie.index')}}" class="btn btn-success">Quay lại</a>
              </div>
          </div>
    </form>
</body>
</html>