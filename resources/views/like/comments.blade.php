@extends('layout.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="profile-image">
                            <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        </div>
                        <h8 class="mb-0">{{ $status->user->user }}</h8>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ asset('' . $status->image) }}" class="card-img-top" alt="Status Image">
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
                </div>
            </div>
        </div>
    </div>
</div>
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
