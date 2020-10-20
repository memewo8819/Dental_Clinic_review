@extends('layouts.app')
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3">
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    @foreach($clinic->images as $image)
                        <img src="{{ $image->image_path }}" class="rounded-circle" width="100" height="100">
                    @endforeach    
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0">
                            {{ $clinic->clinic_name }}<br>
                            {{ $clinic->postal_code }}<br>
                            {{ $clinic->pref }}{{ $clinic->city }}{{ $clinic->town }}
                        </p>
                        <a href="" class="text-secondary"></a>
                    </div>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <p class="mb-0 text-secondary"></p>
                    </div>
                </div>

                <div class="card-body">
                    {{-- @foreach($clinic->comments as $comment)
                        <p>{{ $comment->post_name }}{{ $comment->created_at }}
                        <p>{{ $comment->text }}</p>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10 mb-3">
            <div class="card">
            <div id="map" style="width:100%; height:400px">Gmap</div>
                <script type='text/javascript'>
                    var map;
                    function map_canvas() {

                        //初期位置に上記配列の最初の緯度経度を格納
                        var latlng = new google.maps.LatLng({!! $clinic->lat !!}, {!! $clinic->lng !!});
                        var opts = {
                            zoom: 18,
                            center: latlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                        }

                        //地図を表示させるエリアのidを指定
                        var map = new google.maps.Map(document.getElementById('map'), opts);
                        var bounds = new google.maps.LatLngBounds();
                        var infoWindow = new google.maps.InfoWindow();
                        
                        //マーカーの配置
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng({lat: {!! $clinic->lat !!}, lng: {!! $clinic->lng !!}}),
                            map: map
                        });
                    }
                    google.maps.event.addDomListener(window, 'load', map_canvas);
                </script>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10 mb-3">
            <ul class="list-group">
                @forelse ($comments as $comment)
                    <li class="list-group-item">
                        <div class="py-3 w-100 d-flex">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $comment->post_name }}</p>
                            </div>
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ config('score')[$comment->review] }}</p>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="py-3">
                            {!! nl2br(e($comment->text)) !!}
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">
                        <p class="mb-0 text-secondary">コメントはまだありません。</p>
                    </li>
                @endforelse
                <li class="list-group-item">
                    <div class="py-3">
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
                                    <input type="text" name="post_name" value="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <select type="text" name="review" class="form-control">
                                        @foreach(config('score') as $key => $score)
                                            <option value="{{ $key }}">{{ $score }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <textarea class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" rows="4">{{ old('text') }}</textarea>
                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-right">
                                    <p class="mb-4 text-danger">500文字以内</p>
                                    <button type="submit" class="btn btn-primary">
                                        コメントする
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $comments->links() }}
    </div>
</div>
@endsection