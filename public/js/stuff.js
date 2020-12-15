$(".btn-hapus").on("click", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Delete this?",
    text: "You will delete this stuff permanent!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
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
