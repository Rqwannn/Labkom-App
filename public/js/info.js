$(document).ready(function () {
  $("#data_siswa").DataTable({
    responsive: true,
    autoWidth: false,
  });

  $("#card-guru").on("click", function () {
    if ($("#teachTable").css("min-height") == "0px") {
      openGuru();
      closeSiswa();
    } else {
      closeGuru();
      $(".main").removeClass("shadow");
    }
  });

  $("#card-siswa").on("click", function () {
    if ($("#studentTable").css("min-height") == "0px") {
      openSiswa();
      closeGuru();
    } else {
      closeSiswa();
      $(".main").removeClass("shadow");
    }
  });
});
