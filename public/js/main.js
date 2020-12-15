$(document).ready(function(){
    var reg = /^[a-z A-Z 0-9]+$/
    var reg2 = /^[a-zA-Z0-9_]+$/

    check2()
    if (check2() == true) {
        $('#loginBtn').removeAttr('disabled')
    }

    check()
    if (check() == true) {
        $('#registBtn').removeAttr('disabled')
    }

    $('#logUsername').keyup(function(){
        if ($(this).val() == "") {
            $("#validateLogUsername").html("Harus Diisi")
            if (check2() == false) {
                $("#loginBtn").attr('disabled', 'disabled')
            }else{
                $('#loginBtn').removeAttr('disabled')
            }
        }else{
            $("#validateLogUsername").html("")
            if (check2() == true) {
                $("#loginBtn").removeAttr('disabled')
            }
        }
    })

    $('#logPass').keyup(function(){
        if ($(this).val() == "") {
            $("#validateLogPass").html("Harus Diisi")
            if (check2() == false) {
                $("#loginBtn").attr('disabled', 'disabled')
            }else{
                $('#loginBtn').removeAttr('disabled')
            }
        }else{
            $("#validateLogPass").html("")
            if (check2() == true) {
                $("#loginBtn").removeAttr('disabled')
            }
        }
    })

    get(".slideToRegist").addEventListener('click', function(e){
        e.preventDefault()
        get("#slideToRegist").classList.add("active")
        get("#slideToLogin").classList.remove("active")
        get("#regist").style.position = "sticky"
        get("#regist").style.transform = "translate(0, 0)"
        get("#login").style.transform = "translate(1500px, 10px)"
        get("#login").style.position = "fixed"
        // $('#namaDepan').focus()
    })

    get(".slideToLogin").addEventListener("click", function(e){
        e.preventDefault()
        get("#slideToRegist").classList.remove("active")
        get("#slideToLogin").classList.add("active")
        get("#regist").style.position = "fixed"
        get("#login").style.transform = "translate(0, 0)"
        get("#regist").style.transform = "translate(1500px, 10px)"
        get("#login").style.position = "sticky"
    })

    $("#namaDepan").keyup(function(){
        if ($(this).val() == "") {
            $("#validateNamaDepan").html("")
            $("#validateNamaDepan").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if (!reg.test($(this).val())) {
            $("#validateNamaDepan").html("")
            $("#validateNamaDepan").html("Tidak boleh menggunakan karakter aneh")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validateNamaDepan").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $("#namaBelakang").keyup(function(){
        if ($(this).val() == "") {
            $("#validateNamaBelakang").html("")
            $("#validateNamaBelakang").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if (!reg.test($(this).val())) {
            $("#validateNamaBelakang").html("")
            $("#validateNamaBelakang").html("Tidak boleh menggunakan karakter aneh")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validateNamaBelakang").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $("#kelas").keyup(function(){
        if ($(this).val() == "") {
            $("#validateKelas").html("")
            $("#validateKelas").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if (!reg.test($(this).val())) {
            $("#validateKelas").html("")
            $("#validateKelas").html("Tidak boleh menggunakan karakter aneh")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validateKelas").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $("#tglLahir").on("change", function(){
        var today = new Date();

        var month = today.getMonth()+1;
        var day = today.getDate();

        var date = today.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;

        if ($("#tglLahir").val() == "") {
            $("#validateTglLahir").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if ($(this).val() > date) {
            $("#validateTglLahir").html("Waw, anda belum lahir")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if($(this).val() == date){
         $("#validateTglLahir").html("Anda baru lahir?")
         if(check() == false){
            $('#registBtn').attr('disabled', 'disabled')
        }
    }else{
        $("#validateTglLahir").html("")
        if(check() == true){
         $("#registBtn").removeAttr("disabled")
     }
 }
})

    $("#nis").keyup(function(){
        if ($(this).val() == "") {
            $("#validateNis").html("")
            $("#validateNis").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validateNis").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $("#nisn").keyup(function(){
        if ($(this).val() == "") {
            $("#validateNisn").html("")
            $("#validateNisn").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validateNisn").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $("#username").keyup(function(){
        if ($(this).val() == "") {
            $("#validateUsername").html("")
            $("#validateUsername").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if (!reg2.test($(this).val())) {
            $("#validateUsername").html("")
            $("#validateUsername").html("Tidak boleh menggunakan karakter aneh atau spasi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if ($(this).val().length <= 3) {
            $("#validateUsername").html("")
            $("#validateUsername").html("Minimal 4 Karakter")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if ($(this).val().length > 10) {
            $("#validateUsername").html("")
            $("#validateUsername").html("Maksimal 10 Karakter")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validateUsername").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $("#password").keyup(function(){
        if ($(this).val() == "") {
            $("#validatePassword").html("")
            $("#validatePassword").html("Harus Diisi")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if ($(this).val().length <= 3) {
            $("#validatePassword").html("")
            $("#validatePassword").html("Minimal 4 Karakter")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else if ($(this).val().length > 10) {
            $("#validatePassword").html("")
            $("#validatePassword").html("Maksimal 10 Karakter")
            if(check() == false){
                $('#registBtn').attr('disabled', 'disabled')
            }
        }else{
            $("#validatePassword").html("")
            if(check() == true){
             $("#registBtn").removeAttr("disabled")
         }
     }
 })

    $('#registBtn').on('click', function(e){
        e.preventDefault()
        if(check() == false){
            $(this).attr("disabled", "disabled")
        }else{
            $(this).removeAttr("disabled")
            $(this).unbind('click').click()
        }
    })

})

function get(string){
    return document.querySelector(string)
}

function check(){
    var reg = /^[a-z A-Z 0-9]+$/
    var reg2 = /^[a-zA-Z0-9_]+$/

    var today = new Date();

    var month = today.getMonth()+1;
    var day = today.getDate();

    var date = today.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

    if ($("#namaDepan").val() == "") {
        $("#validateNamaDepan").html("")
        $("#validateNamaDepan").html("Harus Diisi")
        return false
    }else if (!reg.test($("#namaDepan").val())) {
        $("#validateNamaDepan").html("")
        $("#validateNamaDepan").html("Tidak boleh menggunakan karakter aneh")
        return false
    }else if ($("#namaBelakang").val() == "") {
        $("#validateNamaBelakang").html("")
        $("#validateNamaBelakang").html("Harus Diisi")
        return false
    }else if (!reg.test($("#namaBelakang").val())) {
        $("#validateNamaBelakang").html("")
        $("#validateNamaBelakang").html("Tidak boleh menggunakan karakter aneh")
        return false
    }else if ($("#kelas").val() == "") {
        $("#validateKelas").html("")
        $("#validateKelas").html("Harus Diisi")
        return false
    }else if (!reg.test($("#kelas").val())) {
        $("#validateKelas").html("")
        $("#validateKelas").html("Tidak boleh menggunakan karakter aneh")
        return false
    }else if ($("#tglLahir").val() == "") {
        $("#validateTglLahir").html("Harus Diisi")
        return false
    }else if ($("#tglLahir").val() > date) {
        $("#validateTglLahir").html("Waw, anda belum lahir")
        return false
    }else if($("#tglLahir").val() == date){
       $("#validateTglLahir").html("Anda baru lahir?")
       return false
   }else if ($("#nis").val() == "") {
    $("#validateNis").html("")
    $("#validateNis").html("Harus Diisi")
    return false
}else if ($("#nisn").val() == "") {
    $("#validateNisn").html("")
    $("#validateNisn").html("Harus Diisi")
    return false    
}else if ($("#username").val() == "") {
    $("#validateUsername").html("")
    $("#validateUsername").html("Harus Diisi")
    return false
}else if (!reg2.test($("#username").val())) {
    $("#validateUsername").html("")
    $("#validateUsername").html("Tidak boleh menggunakan karakter aneh atau spasi")
    return false
}else if ($("#username").val().length <= 3) {
    $("#validateUsername").html("")
    $("#validateUsername").html("Minimal 4 Karakter")
    return false
}else if ($("#username").val().length > 10) {
    $("#validateUsername").html("")
    $("#validateUsername").html("Maksimal 10 Karakter")
    return false
}else if ($("#password").val() == "") {
    $("#validatePassword").html("")
    $("#validatePassword").html("Harus Diisi")
    return false
}else if ($("#password").val().length <= 3) {
    $("#validatePassword").html("")
    $("#validatePassword").html("Minimal 4 Karakter")
    return false
}else if ($("#password").val().length > 10) {
    $("#validatePassword").html("")
    $("#validatePassword").html("Maksimal 10 Karakter")
    return false
}else{
 return true
}



}

function toLogin(){
    get("#slideToRegist").classList.remove("active")
    get("#slideToLogin").classList.add("active")
    get("#regist").style.position = "fixed"
    get("#login").style.transform = "translate(0, 0)"
    get("#regist").style.transform = "translate(1500px, 10px)"
    get("#login").style.position = "sticky"
}

function toRegist(){
    get("#slideToRegist").classList.add("active")
    get("#slideToLogin").classList.remove("active")
    get("#regist").style.position = "sticky"
    get("#regist").style.transform = "translate(0, 0)"
    get("#login").style.transform = "translate(1500px, 10px)"
    get("#login").style.position = "fixed"
}

function check2(){
    if ($("#logUsername").val() == "") {
        $("#validateLogUsername").html("Harus Diisi")
        return false
    }else if ($("#logPass").val() == "") {
        $("#validateLogPass").html("Harus Diisi")
        return false
    }else{
        return true
    }
}
