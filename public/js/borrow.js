// * data peminjaman
$(".kembalikan-btn").click(function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Confirm this?",
    text: "You will confirm this borrow!",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, confirm it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).unbind("click").click();
    }
  });
});

$(".confirm-pinjam-btn").on("click", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Confirm this?",
    text: "You will confirm this borrow!",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, confirm it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).unbind("click").click();
    }
  });
});

const donutOptions = {
  maintainAspectRatio: false,
  responsive: true,
};
const pinjam = ["Dikembalikan", "Belum Dikembalikan"];
const pinjamColor = ["#28a745", "#dc3545"];
const kembali = document.querySelector(".barangDikembalikan").dataset.stok;
const belumKembali = document.querySelector(".barangBelumDikembalikan").dataset
  .stok;
if (kembali > 0 || belumKembali > 0) {
  $(".hasData").show();
  $(".noData").hide();
  const pinjamStok = [kembali, belumKembali];
  // ? ubah ke chart
  const donutChartCanvas2 = $("#pinjamChart").get(0).getContext("2d");
  const donutData2 = {
    labels: pinjam,
    datasets: [
      {
        data: pinjamStok,
        backgroundColor: pinjamColor,
      },
    ],
  };

  const donutChart2 = new Chart(donutChartCanvas2, {
    type: "doughnut",
    data: donutData2,
    options: donutOptions,
  });
} else {
  $(".hasData").hide();
  $(".noData").show();
}
