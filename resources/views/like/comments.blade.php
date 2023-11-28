@extends('layout.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('desain/css/comentar.css')}}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="profile-image">
                            <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                                alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        </div>
                        <h8 class="mb-0" style="margin-left: 10px;">{{ $status->user->user }}</h8>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ asset('' . $status->image) }}" class="card-img-top" alt="Status Image">
                    <div class="caption">
                        <p>{{ $status->caption }}</p>
                    </div>
                </div>
                <div class="judul-comentar">
                    <h6>Commentar</h6>
                </div>
                <div class="isi-comentar">
                    @foreach ($likes as $like)
                    @if ($like->comentar)
                    <div class="comentar-item">
                        <img src="{{ $like->user->profileImage ? asset('storage/' . $like->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                            alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        <div class="comentar-details">
                            <strong class="comment-user">{{ $like->user->user }}</strong>
                            <p>{{ $like->comentar }}</p>
                            <div class="comentar-user">
                                @foreach($likes as $likeComment)
                                @if($likeComment->comentar && $likeComment->id === $like->id)
                                <p id="{{ $likeComment->id }}">{{ $likeComment->created_at->diffForHumans() }}</p>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="garis-comentar"></div>
                @include('like.emoticon')
                <div class="form-comentar">
                    <div class="user-info">
                        <img class="img-profile-comentar rounded-circle" style="width: 40px; height: 40px;"
                            src="{{ $user->profileImage ? asset('storage/' . $user->profileImage->image_path) : asset('storage/default_profile.png') }}">
                    </div>
                    <form method="post" action="{{ route('comment.add', ['status_id' => $status->id]) }}" class="mt-3"
                        id="comment-form">
                        @csrf
                        <div class="comen-group">
                            <input type="text" name="comment" class="form-control" placeholder="Add a comment...">
                            <div class="input-group-icon-comentar">
                                <button type="button" id="emoticon-button">
                                    <i
                                        class="bi bi-emoji-smile"></i><!-- Ganti dengan ikon emotikon sesuai kebutuhan -->
                                </button>
                                <button type="submit" class="kirim-comentar">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menyisipkan emotikon ke dalam input teks
    function insertEmoticon(emoticon) {
        var commentInput = document.querySelector('input[name="comment"]');
        commentInput.value += emoticon;
    }

    // Fungsi untuk menampilkan/sembunyikan kontainer emotikon saat tombol diklik
    document.getElementById('emoticon-button').addEventListener('click', function() {
    // Skrip pertama
    var emoticonContainer = document.getElementById('emoticon-container');
    emoticonContainer.style.display = (emoticonContainer.style.display === 'none' || emoticonContainer.style.display === '') ? 'block' : 'none';

    // Skrip kedua
    var emoticonHeader = document.getElementById('emoticon-header');
    emoticonHeader.style.display = (emoticonHeader.style.display === 'none' || emoticonHeader.style.display === '') ? 'block' : 'none';
});
</script>
@endsection