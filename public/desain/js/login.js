$(document).ready(function() {
    var loginText = $("#loginText");
    var text = "Login";
    var index = 0;
    var typingSpeed = 900; 
    var deletingSpeed = 900;
    var cardHeight = $(".card").height();
    var isDeleting = false;
    function type() {
        if (!isDeleting && index < text.length) {
            loginText.append(text.charAt(index));
            index++;
            setTimeout(type, typingSpeed);
        } else if (isDeleting && index >= 0) {
            loginText.text(text.substring(0, index));
            index--;
            setTimeout(type, deletingSpeed);
        } else {
            isDeleting = !isDeleting;
            if (isDeleting) {
                $(".card").height(cardHeight);
            } else {
                loginText.empty();
                index = 0;
            }
            setTimeout(type, typingSpeed);
        }
    }

    type();
});

$(document).ready(function() {
// Saat input berfokus
$('#inputUsername').focus(function() {
  $(this).next('.input-label').addClass('active');
});

// Saat input kehilangan fokus
$('#inputUsername').blur(function() {
  if (!$(this).val()) {
    $(this).next('.input-label').removeClass('active');
  }
});
});

const successAlert = document.getElementById('success-alert');

// Cek apakah elemen pesan ada
if (successAlert) {
    // Setelah 10 detik, sembunyikan elemen pesan
    setTimeout(function() {
        successAlert.style.display = 'none';
    }, 10000); // 10 detik
}