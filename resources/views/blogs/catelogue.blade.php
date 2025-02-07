@extends('blogs.blogs')
@section('tilte')
    Tin mới nhất
@endsection
@section('content-post')
    @foreach($data  as $tin)
        @php $tenDanhMuc = $tin->catelogue->ten @endphp
        <div class="col-3 post ms-2">
            <a href="{{route('chitiet',$tin->slug)}}" class="nav-link">
                <img src="{{ \Storage::url($tin->anh) }}" alt="{{ $tin->tieu_de }}">
                <h4>{{ $tin->tieu_de }}</h4>
            </a>
        </div>
    @endforeach
    @section('title-post')
        Danh mục {{$tenDanhMuc}}
    @endsection
@endsection
