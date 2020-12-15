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
// * data komputer
const getKom = Array.from(document.querySelectorAll(".komputerTersedia"));
let komA = [];
let kom = [];
let komColorA = [];
let komColor = [];
let komStok = [];
let komStokA = [];
let otherStokKom = 0;

if (getKom.length > 0) {
  getKom.forEach((gB, i) => {
    const stok = gB.dataset.stok;
    komA.push(gB.textContent);
    komColorA.push(allColor[i]);
    komStokA.push(stok);
  });
  const otherKom = Array.from(document.querySelectorAll(".komputerOther"));
  if (otherKom.length > 0) {
    otherKom.forEach((o) => {
      const stokJml = o.dataset.stok;
      otherStokKom += parseInt(stokJml);
    });

    kom = [...komA, "Lainnya"];
    komColor = [...komColorA, allColor[5]];
    komStok = [...komStokA, otherStok];
  } else {
    kom = [...komA];
    komColor = [...komColorA];
    komStok = [...komStokA];
  }
}

// ? ubah ke chart
const donutChartCanvas = $("#komputerChart").get(0).getContext("2d");
const donutData = {
  labels: kom,
  datasets: [
    {
      data: komStok,
      backgroundColor: komColor,
    },
  ],
};

const donutChart = new Chart(donutChartCanvas, {
  type: "doughnut",
  data: donutData,
  options: donutOptions,
});

// * data alat
const getStuff = Array.from(document.querySelectorAll(".barangTersedia"));
let stuffA = [];
let stuff = [];
let stuffColorA = [];
let stuffColor = [];
let stuffStok = [];
let stuffStokA = [];
let otherStokStuff = 0;

if (getStuff.length > 0) {
  getStuff.forEach((gB, i) => {
    const stok = gB.dataset.stok;
    stuffA.push(gB.textContent);
    stuffColorA.push(allColor[i]);
    stuffStokA.push(stok);
  });
  const otherStuff = Array.from(document.querySelectorAll(".barangOther"));
  if (otherStuff.length > 0) {
    otherStuff.forEach((o) => {
      const stokJml = o.dataset.stok;
      otherStokStuff += parseInt(stokJml);
    });

    stuff = [...stuffA, "Lainnya"];
    stuffColor = [...stuffColorA, allColor[5]];
    stuffStok = [...stuffStokA, otherStok];
  } else {
    stuff = [...stuffA];
    stuffColor = [...stuffColorA];
    stuffStok = [...stuffStokA];
  }
}

// ? ubah ke chart
const donutChartCanvas2 = $("#barangChart").get(0).getContext("2d");
const donutData2 = {
  labels: stuff,
  datasets: [
    {
      data: stuffStok,
      backgroundColor: stuffColor,
    },
  ],
};

const donutChart2 = new Chart(donutChartCanvas2, {
  type: "doughnut",
  data: donutData2,
  options: donutOptions,
});

// * data jual
const getsell = Array.from(document.querySelectorAll(".jualTersedia"));
let sellA = [];
let sell = [];
let sellColorA = [];
let sellColor = [];
let sellStok = [];
let sellStokA = [];
let otherStoksell = 0;

if (getsell.length > 0) {
  getsell.forEach((gB, i) => {
    const stok = gB.dataset.stok;
    sellA.push(gB.textContent);
    sellColorA.push(allColor[i]);
    sellStokA.push(stok);
  });
  const othersell = Array.from(document.querySelectorAll(".jualOther"));
  if (othersell.length > 0) {
    othersell.forEach((o) => {
      const stokJml = o.dataset.stok;
      otherStoksell += parseInt(stokJml);
    });

    sell = [...sellA, "Lainnya"];
    sellColor = [...sellColorA, allColor[5]];
    sellStok = [...sellStokA, otherStok];
  } else {
    sell = [...sellA];
    sellColor = [...sellColorA];
    sellStok = [...sellStokA];
  }
}

// ? ubah ke chart
const donutChartCanvas3 = $("#jualanChart").get(0).getContext("2d");
const donutData3 = {
  labels: sell,
  datasets: [
    {
      data: sellStok,
      backgroundColor: sellColor,
    },
  ],
};

const donutChart3 = new Chart(donutChartCanvas3, {
  type: "doughnut",
  data: donutData3,
  options: donutOptions,
});
