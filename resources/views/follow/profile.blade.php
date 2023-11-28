@extends('layout.master')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('desain/css/profile.css')}}">
@section('content')
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="atas-user">
            @if ($userProfile->user->profileImage)
            <img src="{{ asset('storage/' . $userProfile->user->profileImage->image_path) }}" class="profile-image"
                alt="Foto Profil">
            @else
            <!-- Tampilkan foto profil default jika tidak ada foto profil -->
            <img src="{{ asset('storage/default_profile.png') }}" class="profile-image" alt="Foto Profil Default">
            @endif
            <div class="profile-details ml-3">
                <div class="info">
                    <h5 class="card-title">{{ $userProfile->user->user }}</h5>
                    <!-- Tambahkan tombol untuk mengedit profil dengan modal -->
                    <div class="ml-1">
                        @if (auth()->user()->following->contains($userItem->id))
                        <form action="{{ route('follow.unfollow', ['userId' => $userItem->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Unfollow</button>
                        </form>
                        @else
                        <form action="{{ route('follow.follow', ['userId' => $userItem->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Follow</button>
                        </form>
                        @endif
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog"
                    aria-labelledby="editProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 10px; background-color: #3a3a39">
                            <div class="modal-body">
                                <a href="{{ route('dataAkun.edit', ['user_id' => $userProfile->user->id]) }}"
                                    class="button-modal">Edit profile</a>
                                <hr class="batas">
                                <button type="button" class="btn-close" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br />
        <h5 class="card-title" style="color:#080808">{{ $userProfile->nama_depan }} {{ $userProfile->nama_belakang
            }}</h5>
        <p class="card-alamat" style="color:#080808">{{ $userProfile->biodata }}</p>
        <div class="card-text-container" style="color:#080808">
            <p class="card-text">{{ $statusCount }} Postingan</p>
            <p class="card-text">{{ $userProfile->user->myFollowers_count ?? 0 }} Pengikut</p>
            <p class="card-text">{{ $userProfile->user->myFollowings_count ?? 0 }} Mengikuti</p>
        </div>

        <!-- Tampilkan postingan pengguna -->
        <hr class="garis">
        <div class="center-icon">
            <a class="nav-link" href="{{ route('like.status') }}">
                <i class="bi bi-border-all" style="color: gray; font-size: 1.2em;"> <span>ALL POSTS</span></i>
            </a>
        </div>
        @if ($userProfile->user->myStatuses->isNotEmpty())
        <div class="dalam-postingan">
            @foreach ($userProfile->user->myStatuses->reverse() as $status)
            @if ($status->image)
            <div class="postingan">
            <img src="{{ asset($status->image) }}" alt="Status Image" data-toggle="modal"
            data-target="#profile-modal-{{ $status->id }}">
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="d-flex flex-column align-items-center justify-content-center">
            <i class="bi bi-camera" style="color: gray; font-size: 2em;"></i>
            <p class="mt-3">No Posts Yet.</p>
        </div>
        @endif

        <!-- Modal untuk tampilan foto profil yang diperbesar -->
        @if ($userProfile && $userProfile->user && $userProfile->user->myStatuses &&
        $userProfile->user->myStatuses->isNotEmpty())
        @foreach ($userProfile->user->myStatuses as $status)
        <div class="modal fade" id="profile-modal-{{ $status->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="info-posting">
                            <div class="user-postingan">
                                <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                                    alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                                <h8 class="mb-0" style="margin-left: 10px; color: #080808">{{ $status->user->user }}
                                </h8>
                            </div>
                        </div>
                        <img src="{{ asset($status->image) }}" alt="Status Image" class="img-fluid">
                        <div class="button-user-like-comen">
                            <form action="{{ route('like.add', ['status_id' => $status->id]) }}" method="POST">
                                @csrf
                                <button type="submit" id="like-button"><i class="bi bi-heart"
                                        style="font-size: 1.5em;"></i></button>
                            </form>
                            <a href="{{ route('like.comments', ['status_id' => $status->id]) }}">
                                <i class="far fa-comment" style="font-size: 1.5em;"></i>
                            </a>
                        </div>
                        <h7 class="card-title" style="color: #080808">{{ $status->caption }}</h7>
                        <div style="color: #080808; font-size: 12px; margin-top: 2px">
                            {{ $status->created_at->diffForHumans() }}
                        </div>
                        <div class="mt-2">
                            <span class="mr-3" style="color: #080808">
                                <strong>{{ $status->likes_count }}</strong> Likes
                            </span>
                            <span style="color: #080808">
                                <strong>{{ $status->comments_count }}</strong> Comments
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <!-- Tambahkan bagian footer sesuai kebutuhan -->
    <div class="card-footer">
        <p>Ini adalah footer Anda</p>
    </div>
</div>
@endsection
@push('script')
<script>
    $('.status-image').click(function () {
        var modalId = $(this).data('target');
        $(modalId).modal('show');
    });
</script>
@endpush