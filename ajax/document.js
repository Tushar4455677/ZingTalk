$(document).ready(function () {
    $('.flash').hide();

    $('#submit').click(function (event) {
        event.preventDefault();
        $('.error').hide();

        var avatar = $('#profilePicture')[0].files[0];
        var bio = $('#bio').val().trim();
        var location = $('#location').val().trim();
        var interests = $('#interests').val().trim();  // ✅ Fix for interests
        var profession = $('#profession').val();  // ✅ Fix for profession
        var portfolio = $('#portfolio').val();

        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!avatar) {
            $('#errorpic').text("Please select your photo").show();
            setTimeout(() => $('#errorpic').hide(), 3000);
            return false;
        } else if (!allowedExtensions.exec(avatar.name)) {
            $('#errorpic').text("Only .jpg, .jpeg, .png files are allowed").show();
            setTimeout(() => $('#errorpic').hide(), 3000);
            return false;
        }

        if (bio === '') {
            $('#errorbio').text('Please enter a Bio').show();
            setTimeout(() => $('#errorbio').hide(), 3000);
            return false;
        }
        if (location === '') {
            $('#errorlocation').text('Please enter your location').show();
            setTimeout(() => $('#errorlocation').hide(), 3000);
            return false;
        }

        if (!profession) {
            $('#errorprof').text('Please select your profession').show();
            setTimeout(() => $('#errorprof').hide(), 3000);
            return false;
        }

        if (interests === '') {
            $('#errorinterest').text('Please enter your interests').show();
            setTimeout(() => $('#errorinterest').hide(), 3000);
            return false;
        }

        if (portfolio === '') {
            $('#errorport').text('Please enter your Portfolio/Website link').show();
            setTimeout(() => $('#errorport').hide(), 3000);
            return false;
        }

        var formData = new FormData();
        formData.append('avatar', avatar);
        formData.append('bio', bio);
        formData.append('location', location);
        formData.append('interests', interests);  // ✅ Fix for interests
        formData.append('profession', profession);  // ✅ Fix for profession
        formData.append('portfolio', portfolio);

        console.log([...formData.entries()]); // ✅ Debugging

        $.ajax({
            type: 'POST',
            url: 'document.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log("Server Response: " + response);
                if (response.trim() === 'success') {
                    window.location.href = "mainPage.html";
                } else {
                    $('#msg').text(response).fadeIn().delay(3000).fadeOut();
                }
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error: " + error);
                console.log("Server Response: " + xhr.responseText);
            }
        });
    });
});
