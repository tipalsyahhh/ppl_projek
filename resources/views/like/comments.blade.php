@extends('layout.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('desain/css/comentar.css')}}">

=======
<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('desain/css/comentar.css')}}">

=======
<style>
    #comment-form {
        display: none;
    }
    .comment-list {
        list-style: none;
        padding: 0;
    }

    .comment-list li {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius : 10px;
    }

    .comment-list li strong {
        font-weight: bold;
    }

    /* Gaya untuk nama pengguna */
    .comment-list .comment-user {
        color: #333;
    }

    .comment-list .comment-text {
        color: #666;
    }

    #add-comment-button {
        margin-bottom: 10px;
    }

    #comment-created-at {
        float: right;
        margin-top: -20px;
        margin-right: 10px;
    }
</style>
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="profile-image">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
                            <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                                alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        </div>
                        <h8 class="mb-0" style="margin-left: 10px;">{{ $status->user->user }}</h8>
<<<<<<< HEAD
=======
=======
                            <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        </div>
                        <h8 class="mb-0">{{ $status->user->user }}</h8>
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ asset('' . $status->image) }}" class="card-img-top" alt="Status Image">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
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
<<<<<<< HEAD
=======
=======
                </div>
                <div class="card-footer">
                    <h6>Comments:</h6>
                    <button type="button" id="add-comment-button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Comentar</button>
                    <button type="button" id="cancel-comment-button" class="btn btn-primary btn-sm" style="display: none;"><i class="bi bi-repeat"></i> Batal</button>
                    <form method="post" action="{{ route('comment.add', ['status_id' => $status->id]) }}" class="mt-3" id="comment-form">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment" class="form-control" rows="2" placeholder="Add a comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i> Post</button>
                        </form>
                        <ul class="list-unstyled comment-list">
                            @foreach ($likes as $like)
                                @if ($like->comentar)
                                    <li>
                                        <strong class="comment-user">{{ $like->user->user }}</strong><br>
                                        <strong class="comment-text">{{ $like->comentar }}</strong>
                                        <br>
                                        <small class="text-muted" id="comment-created-at">{{ $like->created_at }}</small>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

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
<<<<<<< HEAD
@endsection
=======
@endsection
=======
<script>
    var commentFormVisible = false;
    var addCommentButton = document.getElementById("add-comment-button");
    var cancelCommentButton = document.getElementById("cancel-comment-button");
    var commentForm = document.getElementById("comment-form");

    addCommentButton.addEventListener("click", function () {
        // Tampilkan formulir komentar
        commentForm.style.display = "block";
        addCommentButton.style.display = "none";
        cancelCommentButton.style.display = "block";
        commentFormVisible = true;
    });

    cancelCommentButton.addEventListener("click", function () {
        // Sembunyikan formulir komentar
        commentForm.style.display = "none";
        addCommentButton.style.display = "block";
        cancelCommentButton.style.display = "none";
        commentFormVisible = false;
    });
</script>
@endsection
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
