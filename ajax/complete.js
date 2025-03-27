$(document).ready(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault(); // Form submit रोकें

        $(".error").hide(); // पहले से दिखे error हटाएं

        var name = $("input[name='name']").val().trim();
        var username = $("input[name='username']").val().trim();
        var dob = $("input[name='dob']").val().trim();
        var gender = $("input[name='gender']:checked").val();
        var phone = $("input[name='phone']").val().trim();

        var errorFlag = false;

        if (name === "") {
            $("#errorName").show();
            errorFlag = true;
        }
        if (username === "") {
            $("#errorUsername").show();
            errorFlag = true;
        }
        if (dob === "") {
            $("#errorDob").show();
            errorFlag = true;
        }
        if (!gender) {
            /* alert("Please select gender"); */
            errorFlag = true;
        }
        if (phone === "") {
            $("#errorPhone").show();
            errorFlag = true;
        }

        // 2 सेकंड में error messages hide करने का function
        if (errorFlag) {
            setTimeout(function () {
                $(".error").fadeOut();
            }, 2000);
            return;
        }

        $.ajax({
            url: "complete.php",
            type: "POST",
            data: {
                name: name,
                username: username,
                dob: dob,
                gender: gender,
                phone: phone
            },
            success: function (response) {
                if (response.trim() === "success") {
                    window.location.href = "document.html"; // Success होने पर redirect
                } else {
                    alert("Something went wrong! Please try again.");
                }
            },
            error: function () {
                alert("Server error! Please try again later.");
            }
        });
    });
});
