const formatter = new FormatMoney();
const total = Array.from(document.querySelectorAll(".totalInAdmin"));
if (total && total.length > 0) {
  total.forEach((t) => {
    let format = formatter.toRupiah(t.textContent);
    t.innerHTML = format;
  });
}

$(".beliNow").on("click", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "This order'll be paid off",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, paid it off!",
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).unbind("click").click();
    }
  });
});

// * data pembelian
const donutOptions = {
  maintainAspectRatio: false,
  responsive: true,
};
const beli = ["Lunas", "Belum Lunas"];
const beliColor = ["#28a745", "#dc3545"];
const lunas = document.querySelector(".lunas").dataset.stok;
const belumLunas = document.querySelector(".belumLunas").dataset.stok;
const check = parseInt(lunas) + parseInt(belumLunas);
if (check > 0) {
  $(".hasData").show();
  $(".noData").hide();
  const beliStok = [lunas, belumLunas];
  // ? ubah ke chart
  const donutChartCanvas3 = $("#beliChart").get(0).getContext("2d");
  const donutData3 = {
    labels: beli,
    datasets: [
      {
        data: beliStok,
        backgroundColor: beliColor,
      },
    ],
  };

  const donutChart3 = new Chart(donutChartCanvas3, {
    type: "doughnut",
    data: donutData3,
    options: donutOptions,
  });
} else {
  $(".hasData").hide();
  $(".noData").show();
}
