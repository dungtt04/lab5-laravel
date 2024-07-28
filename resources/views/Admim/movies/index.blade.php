<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Danh Sách</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
         <!-- Form tìm kiếm -->
        <form method="GET" action="{{ route('movie.index') }}">
            <input type="text" name="search" placeholder="Tìm kiếm phim" value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-info">Tìm Kiếm</button>
        </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Poster</th>
                <th scope="col">Intro</th>
                <th scope="col">Release_date</th>
                <th scope="col">Genes Name</th>
                <th scope="col">
                    <a href="{{route('movie.genes')}}" class="btn btn-success">Thêm mới</a>
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie )
                <tr>
                    <th scope="row">{{$movie->id}}</th>
                    <td>{{$movie->title}}</td>
                    <td>
                        <img src="{{asset("storage/" . $movie->poster)}}" width="90" alt="" >
                    </td>
                    <td>{{$movie->intro}}</td>
                    <td>{{$movie->release_date}}</td>
                    <td>{{$movie->gene->name}}</td>
                    <td class="d-flex gap-1">
                        <a href="{{route('movie.edit',$movie)}}" class="btn btn-primary">Sửa</a>
                        <form action="{{route('movie.destroy', $movie)}}" method="post">
                            @csrf
                            @method('DELETE')
                             <button onclick="return confirm('bạn có muốn xóa?')" type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                        <a href="{{route('movie.detail',$movie)}}" class="btn btn-warning">CTiet</a>
                    </td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
          <a href="{{route('movie.index')}}" class="btn btn-success">Quay Lại Danh Sách</a> 
          {{$movies->links()}}
    </div>
</body>
</html>