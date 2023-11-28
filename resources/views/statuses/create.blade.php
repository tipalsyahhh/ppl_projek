@extends('layout.master')

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

<style>
    .create-status {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    h3.create-status {
        color: black;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .user-postingan {
        display: flex;
        align-items: center;
    }

    .img-profile {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-postingan p {
        margin: 0;
        color: black;
        font-weight: bold;
    }

    .button-image {
        border: 1px solid #ccc;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 10px;
        margin-bottom: 20px;
        width: 100%;
    }

    .image-status {
        visibility: hidden;
        /* tambahkan gaya sesuai kebutuhan desain Anda */
    }

    #closeImageStatusButton {
        display: none;
        /* tambahkan gaya sesuai kebutuhan desain Anda */
    }

    .image-status {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 20px;
        width: 100%;
        /* Sesuaikan lebar sesuai kebutuhan */
        margin-bottom: 10px;
        text-align: center;
        margin-top: 10px;
        position: relative;
    }

    .image-status label {
        display: block;
        margin-bottom: 10px;
    }

    .image-status input {
        padding: 8px;
        box-sizing: border-box;
    }

    .selected-image {
        max-width: 100%;
        margin-top: 10px;
    }

    .selected-img {
        width: 60%;
        height: auto;
    }

    .button-image p {
        color: black;
        font-weight: bold;
    }

    .button-image button {
        border: none;
        /* Menghilangkan border pada tombol */
        background-color: transparent;
        /* Menghilangkan latar belakang tombol */
        cursor: pointer;
        color: #08885d;
        /* Ganti warna teks tombol sesuai kebutuhan */
    }
</style>
@section('content')
<div class="judul-status">
    <h3 class="create-status">Buat postingan</h3>
</div>
<div class="user-postingan">
    <img class="img-profile rounded-circle"
        src="{{ $user->profileImage ? asset('storage/' . $user->profileImage->image_path) : asset('storage/default_profile.png') }}"
        style="width: 40px; height: 40px; margin-top:10px;">
    <p>{{ $user->user }}</p>
</div>
<form action="{{ route('statuses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-caption">
        <textarea name="caption" class="form-control" placeholder="apa yang anda fikirkan, {{ $user->namadepan }}?"
            style="border: none; border-radius: 0; margin-left: -7px; margin-bottom: -35px;  position: relative;" required></textarea>
    </div>
    <div class="image-status">
        <label for="image">
            <i class="bi bi-file-earmark-image-fill" style="font-size: 2rem; color: green;"></i>
        </label>
        <input type="file" name="image" id="imageInput" class="form-control-file" required onchange="displayImage()">
        <div id="selectedImage" class="selected-image"></div>
    </div>

    <div class="button-image">
        <p style="color: black;">Tambahkan ke postingan anda</p>
        <button id="showImageStatusButton"><i class="bi bi-images" style="font-size: 1.5rem;"></i></button>
        <button id="closeImageStatusButton"><i class="bi bi-x" style="font-size: 1.5rem;"></i></button>
    </div>

    <button type="submit" class="btn btn-warning" style="width: 100%;">Create Status</button>
</form>

<script>
    var showButton = document.getElementById('showImageStatusButton');
    var closeButton = document.getElementById('closeImageStatusButton');
    var imageStatusDiv = document.querySelector('.image-status');

    showButton.addEventListener('click', function () {
        imageStatusDiv.style.visibility = 'visible';
        showButton.style.display = 'none';
        closeButton.style.display = 'block';
    });

    closeButton.addEventListener('click', function () {
        imageStatusDiv.style.visibility = 'hidden';
        showButton.style.display = 'block';
        closeButton.style.display = 'none';
    });

    function displayImage() {
        var input = document.getElementById('imageInput');
        var selectedImageDiv = document.getElementById('selectedImage');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                selectedImageDiv.innerHTML = '<img src="' + e.target.result + '" alt="Selected Image" class="selected-img">';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<<<<<<< HEAD
@endsection
=======
@endsection
=======
@section('content')
<div class="container">
    <h1>Create New Status</h1>
    <form action="{{ route('statuses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="caption">Caption:</label>
            <textarea name="caption" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Status</button>
    </form>
</div>
@endsection
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
