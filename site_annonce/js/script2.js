$(document).ready(function() {
    $(".email").click(function() {
        $(".email").removeClass("error");
        $(".error_email").hide();
    });

    $(".password3").click(function() {
        $(".password3").removeClass("error");
        $(".error_email").hide();
    });

    $(".password1").keypress(function() {
        $(".password2").addClass("error");
        $(".password2").removeClass("correct");
        $(".error_password").show();
    });

    $("body").click(function() {
        if ($(".password1").val() != "" && $(".password2").val() != "") {
            if ($(".password1").val() == $(".password2").val()) {
                $(".password2").removeClass("error");
                $(".password2").addClass("correct");
                $(".error_password").hide();
                $(".submit").prop("disabled", false);
            } else {
                $(".password2").addClass("error");
                $(".password2").removeClass("correct");
                $(".error_password").show();
                $(".submit").prop("disabled", true);
            }
        } else if ($(".password1").val() == "" && $(".password2").val() == "") {
            $(".password2").removeClass("error");
            $(".password2").removeClass("correct");
            $(".error_password").hide();
        } else if ($(".password1").val() == "" || $(".password2").val() == "") {
            $(".password2").addClass("error");
            $(".password2").removeClass("correct");
            $(".error_password").show();
            $(".submit").prop("disabled", true);
        }
    });

    $(".ajout_fav").click(function() {
        var idannonce = $(this).attr("id");
        $.post(
            "./traitement/ajout_favoris.php", { idannonce: idannonce },
            function(data) {
                if (data == "false") {
                    window.location.href = "./login.php";
                } else if (data != "") {
                    $(".ici").html(data);
                    alert("Ajouté aux favoris");
                } else {
                    alert("Vous avez déjà ajouté cette annonce");
                }
            }
        );
    });

    $(".delete_fav").click(function() {
        var idannonce = $(this).attr("id");
        $(this).parent().parent().remove();
        $.post(
            "./traitement/delete_favoris.php", { idannonce: idannonce },
            function(data) {
                $(".ici").html(data);
            }
        );
    });
});