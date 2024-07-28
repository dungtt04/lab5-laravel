<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container w-50"></div>
    <h1>Thêm mới phim</h1>
    
    <form action="{{route('movie.genes')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="mb-3">
            <label class="form-label">Poster</label>
            <input class="form-control" type="file" name="poster">
          </div>
          <div class="mb-3">
            <label  class="form-label">Intro</label>
            <textarea class="form-control" name="intro" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label  class="form-label">Release_date</label>
            <input type="date" class="form-label" name="release_date">
          </div>
          <div class="mb-3">
            <label  class="form-label">Genes</label>
            <select class="form-select" name="genre_id" id="">
                @foreach ($genes as $ge ){
                    <option value="{{$ge->id}}">
                        {{$ge->name}}   
                    </option>
                }                  
                @endforeach
            </select>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{route('movie.index')}}" class="btn btn-success">Danh Sách</a>
              </div>
          </div>
    </form>
</body>
</html>