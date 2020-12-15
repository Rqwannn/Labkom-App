$(document).ready(function () {
  $("#data_beli").DataTable({
    responsive: true,
    autoWidth: false,
  });

  $("#data_pinjam").DataTable({
    responsive: true,
    autoWidth: false,
  });

  var active = $("#pilihan").val();
  var active2 = $("#pilihan2").val();
  var active3 = $("#pilihan3").val();
  $("#barang" + active).addClass("active");
  $("#komputer" + active2).addClass("active");
  $("#belanja" + active3).addClass("active");
  var maks = $("#barang" + active).data("id");
  var maks2 = $("#komputer" + active2).data("id");
  var maks3 = $("#belanja" + active3).data("id");

  $(window).scroll(function () {
    // alert($(this).scrollTop());
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });

  $(".back-to-top").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutCubic");
  });

  $("#back").on("click", function () {
    $("#pinjam").hide();
    $("#pinjam2").hide();
    $(".menyediakan").fadeIn("slow");
  });

  $("#back2").on("click", function () {
    $("#pinjamKomputer").hide();
    $("#pinjamKomputer2").hide();
    $(".menyediakan").fadeIn("slow");
  });

  $("#back3").on("click", function () {
    $("#belanjaBarang").hide();
    $("#belanjaBarang2").hide();
    $(".menyediakan").fadeIn("slow");
  });

  $(".cardEl").on("click", function () {
    var id = $(this).attr("id");
    switch (id) {
      case "pinjam_barang":
        closeAllExcept("pinjam", "pinjam2");
        break;
      case "sewa_pc":
        closeAllExcept("pinjamKomputer", "pinjamKomputer2");
        break;
      case "jasa_ketik":
        alert("jasa_ketik");
        break;
      case "belanja":
        closeAllExcept("belanjaBarang", "belanjaBarang2");
        break;
    }
  });

  $(".pinjamBarang").on("click", function () {
    var value = $(this).attr("id");
    var stok = $(this).data("id");
    const splitIt = value.split("barang");
    $(".pinjamBarang").removeClass("active");
    $(this).addClass("active");
    $("#banyak_pinjam").removeAttr("disabled");
    $("#banyak_pinjam").focus();
    $("#pilihan").val("");
    $("#pilihan").val(splitIt[1]);
    maks = stok;
  });

  $(".pinjamBarang2").on("click", function () {
    const value = $(this).attr("id");
    const splitIt = value.split("komputer");
    const stok = $(this).data("id");
    $(".pinjamBarang2").removeClass("active");
    $(this).addClass("active");
    $("#banyak_pinjam2").removeAttr("disabled");
    $("#banyak_pinjam2").focus();
    $("#pilihan2").val("");
    $("#pilihan2").val(splitIt[1]);
    maks2 = stok;
  });

  $(".pinjamBarang3").on("click", function () {
    var value = $(this).attr("id");
    var stok = $(this).data("id");
    const splitIt = value.split("belanja");
    $(".pinjamBarang3").removeClass("active");
    $(this).addClass("active");
    $("#banyak_pinjam3").removeAttr("disabled");
    $("#banyak_pinjam3").focus();
    $("#pilihan3").val("");
    $("#pilihan3").val(splitIt[1]);
    maks3 = stok;
  });

  $("#btn-submit").on("click", function (e) {
    e.preventDefault();
    validate("", maks);
  });

  $("#btn-submit2").on("click", function (e) {
    e.preventDefault();
    validate("2", maks2);
  });

  $("#btn-submit3").on("click", function (e) {
    e.preventDefault();
    validate("3", maks3);
  });

  $("#logout").on("click", function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    Swal.fire({
      title: "Apa kamu yakin?",
      text: "Kamu akan logout dari aplikasi!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Logout",
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    });
  });
});

function openGuru() {
  $("#teachTable").css("min-height", "2000px");
  $(".main").addClass("shadow");
  $("#infoGuruTxt").addClass("act");
  // alert($('#teachTable')[0].scrollHeight);
  $("html, body").animate({ scrollTop: 4000 }, 1500, "easeInOutCirc");
  setTimeout(function () {
    $(".wrapGuru2").show();
    $(".wrapGuru").show();
    $("#wrapGuru").addClass("mt-3");
    $("#wrapGuru").addClass("mb-3");
  }, 450);
}

function closeGuru() {
  $("#teachTable").css("min-height", "0");
  $(".wrapGuru2").hide();
  $(".wrapGuru").hide();
  $("#wrapGuru").removeClass("mt-3");
  $("#wrapGuru").removeClass("mb-3");
  $("#infoGuruTxt").removeClass("act");
}

function openSiswa() {
  $("#studentTable").css("min-height", "900px");
  $(".main").addClass("shadow");
  $("#infoSiswaTxt").addClass("act");
  $("html, body").animate({ scrollTop: 1250 }, 1000, "easeInOutCirc");
  setTimeout(function () {
    $(".wrapSiswa2").show();
    $(".wrapSiswa").show();
    $("#wrapSiswa").addClass("mt-5");
    $("#wrapSiswa").addClass("mb-3");
  }, 450);
}

function closeSiswa() {
  $("#studentTable").css("min-height", "0");
  $("#infoSiswaTxt").removeClass("act");
  $(".wrapSiswa2").hide();
  $(".wrapSiswa").hide();
  $("#wrapSiswa").removeClass("mt-5");
  $("#wrapSiswa").removeClass("mb-3");
}

function closeAllExcept(args1, args2) {
  $("#pinjam").hide();
  $("#pinjam2").hide();
  $("#pinjamKomputer").hide();
  $("#pinjamKomputer2").hide();
  $(".menyediakan").hide();
  $("#belanjaBarang").hide();
  $("#belanjaBarang2").hide();
  $(`#${args1}`).show();
  $(`#${args2}`).show();
  $(`#${args1}`).fadeIn("slow");
  $(`#${args2}`).fadeIn("slow");
}

function validate(num = "", maks) {
  var today = new Date();

  var month = today.getMonth() + 1;
  var day = today.getDate();

  var date =
    today.getFullYear() +
    "-" +
    (month < 10 ? "0" : "") +
    month +
    "-" +
    (day < 10 ? "0" : "") +
    day;

  switch ("") {
    case $(`#tglPinjam${num}`).val():
      $(`#tglPinjam`).focus();
      $(`#validateTglPinjam`).html("Tanggal Pinjam Tidak boleh kosong");
      $(`#validateName`).html("");
      $(`#validateBanyakPinjam`).html("");
      $(`#validateClass`).html("");
      return false;
      break;
    case $(`#pilihan`).val():
      $(`#validateBarang${num}`).html(`Pilih Barang terlebih dahulu`);
      $(`#validateName${num}`).html(``);
      $(`#validateClass${num}`).html(``);
      $(`#validateBanyakPinjam${num}`).html(``);
      $(`#validateTglPinjam${num}`).html(``);
      return false;
      break;
    case $(`#banyak_pinjam${num}`).val():
      $(`#validateBanyakPinjam${num}`).html(`Tidak boleh kosong`);
      $(`#validateName${num}`).html(``);
      $(`#validateClass${num}`).html(``);
      $(`#validateTglPinjam${num}`).html(``);
      return false;
      break;
  }

  if ($(`#tglPinjam${num}`).val() < date) {
    $(`#tglPinjam${num}`).focus();
    $(`#validateTglPinjam${num}`).html(`Tidak boleh kurang dari hari ini`);
    $(`#validateName${num}`).html(``);
    $(`#validateClass${num}`).html(``);
    return false;
  } else if ($(`#banyak_pinjam${num}`).val() == 0) {
    $(`#banyak_pinjam${num}`).focus();
    $(`#validateBanyakPinjam${num}`).html(`Tidak boleh 0`);
    $(`#validateName${num}`).html(``);
    $(`#validateClass${num}`).html(``);
    $(`#validateTglPinjam${num}`).html(``);
  } else if ($(`#banyak_pinjam${num}`).val() > maks) {
    $(`#banyak_pinjam${num}`).focus();
    $(`#validateBanyakPinjam${num}`).html(`Maksimal ` + maks);
    $(`#validateName${num}`).html(``);
    $(`#validateClass${num}`).html(``);
    $(`#validateTglPinjam${num}`).html(``);
  } else {
    $(`#validateName${num}`).html(``);
    $(`#validateClass${num}`).html(``);
    $(`#validateTglPinjam${num}`).html(``);
    $(`#validateBanyakPinjam${num}`).html(``);
    $(`#btn-submit${num}`).unbind(`click`).click();
  }
}
