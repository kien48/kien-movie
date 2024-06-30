@extends('blogs.blogs')
@section('tilte')
    Tin mới nhất
@endsection
@section('content-post')
    @foreach($dataPosts  as $tin)
        <div class="col-3 post ms-2">
            <a href="{{route('chitiet',$tin[0]->slug)}}" class="nav-link">
                <img src="{{ \Storage::url($tin[0]->anh) }}" alt="{{ $tin[0]->tieu_de }}">
                <h4>{{ $tin[0]->tieu_de }}</h4>
            </a>
        </div>
    @endforeach
    @section('title-post')
        Tag {{$end}}
    @endsection
@endsection
