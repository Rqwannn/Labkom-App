const donutOptions = {
  maintainAspectRatio: false,
  responsive: true,
};
const allColor = [
  "#f56954",
  "#00a65a",
  "#f39c12",
  "#00c0ef",
  "#3c8dbc",
  "#7D34F4",
];
// * data barang
const getBarang = Array.from(document.querySelectorAll(".availBarang"));
let barangA = [];
let barang = [];
let barangColorA = [];
let barangColor = [];
let barangStok = [];
let barangStokA = [];
let otherStok = 0;

if (getBarang.length > 0) {
  $(".hasData2").show();
  $(".noData2").hide();
  getBarang.forEach((gB, i) => {
    const stok = gB.dataset.stok;
    barangA.push(gB.textContent);
    barangColorA.push(allColor[i]);
    barangStokA.push(stok);
  });
  const other = Array.from(document.querySelectorAll(".other"));
  if (other.length > 0) {
    other.forEach((o) => {
      const stokJml = o.dataset.stok;
      otherStok += parseInt(stokJml);
    });

    barang = [...barangA, "Lainnya"];
    barangColor = [...barangColorA, allColor[5]];
    barangStok = [...barangStokA, otherStok];
  } else {
    barang = [...barangA];
    barangColor = [...barangColorA];
    barangStok = [...barangStokA];
  }

  // ? ubah ke chart
  const donutChartCanvas = $("#barangChart").get(0).getContext("2d");
  const donutData = {
    labels: barang,
    datasets: [
      {
        data: barangStok,
        backgroundColor: barangColor,
      },
    ],
  };

  const donutChart = new Chart(donutChartCanvas, {
    type: "doughnut",
    data: donutData,
    options: donutOptions,
  });
} else {
  $(".hasData2").hide();
  $(".noData2").show();
}

// * data peminjaman

const pinjam = ["Dikembalikan", "Belum Dikembalikan"];
const pinjamColor = ["#28a745", "#dc3545"];
const kembali = document.querySelector(".barangDikembalikan").dataset.stok;
const belumKembali = document.querySelector(".barangBelumDikembalikan").dataset
  .stok;
if (kembali > 0 || belumKembali > 0) {
  $(".noData").hide();
  $(".hasData").show();
  const pinjamStok = [kembali, belumKembali];
  // ? ubah ke chart
  const donutChartCanvas2 = $("#peminjamanChart").get(0).getContext("2d");
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

// * data pembelian

const beli = ["Lunas", "Belum Lunas"];
const beliColor = ["#28a745", "#dc3545"];
const lunas = document.querySelector(".lunas").dataset.stok;
const belumLunas = document.querySelector(".belumLunas").dataset.stok;
const check = parseInt(lunas) + parseInt(belumLunas);
if (check > 0) {
  $(".hasData3").show();
  $(".noData3").hide();
  const beliStok = [lunas, belumLunas];
  // ? ubah ke chart
  const donutChartCanvas3 = $("#pembelianChart").get(0).getContext("2d");
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
  $(".hasData3").hide();
  $(".noData3").show();
}
