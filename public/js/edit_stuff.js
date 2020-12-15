bsCustomFileInput.init();

$(function () {
  get("#namaBarang").addEventListener("keyup", function () {
    justTextAndAngka(this);
  });

  get("#gambarBarang").addEventListener("change", function () {
    const input = document.getElementById("gambarBarang");
    const imgPreview = document.querySelector("#imgPreview");

    const file = new FileReader();
    file.readAsDataURL(input.files[0]);

    file.onload = function (e) {
      imgPreview.src = e.target.result;
    };
  });

  get("#kategoriBarang").addEventListener("change", function () {
    const val = this.value;
    if (val == "jualan") {
      get("#hargaBarang").removeAttribute("disabled");
    } else {
      get("#hargaBarang").setAttribute("disabled", "disabled");
    }
  });

  $("#submitUpdateStuff").on("click", function (e) {
    e.preventDefault();
    if (!justTextAndAngka(get("#namaBarang"))) {
      return false;
    } else if (get("#jmlBarang").value == "") {
      get("#jmlBarangValidate").innerHTML = "Harus diisi";
      return false;
    } else if (get("#jmlBarang").value < 1) {
      get("#jmlBarangValidate").innerHTML = "Harus lebih dari 0";
      return false;
    } else if (get("#kategoriBarang").value == "") {
      get("#jmlBarangValidate").innerHTML = "";
      get("#validateKategori").innerHTML = "Pilih Kategori";
      return false;
    } else if (get("#kategoriBarang").value == "jualan") {
      get("#jmlBarangValidate").innerHTML = "";
      if (get("#hargaBarang").value == "") {
        get("#hargaBarangValidate").innerHTML = "Harus diisi";
        return false;
      } else if (get("#hargaBarang").value < 1) {
        get("#hargaBarangValidate").innerHTML = "Harus lebih dari 0";
        return false;
      } else {
        get("#hargaBarangValidate").innerHTML = "";
        $(this).unbind("click").click();
      }
    } else {
      get("#jmlBarangValidate").innerHTML = "";
      get("#hargaBarangValidate").innerHTML = "";
      $(this).unbind("click").click();
    }
  });
});

function get(selector) {
  return document.querySelector(selector);
}

function getAll(selector) {
  return document.querySelectorAll(selector);
}

function justText(r, report = true) {
  const id = r.getAttribute("id");
  if (r.value == "") {
    if (report) {
      get("#" + id + "TextValidate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (/^[a-zA-Z][a-z A-Z]*$/.test(r.value)) {
    if (report) {
      get("#" + id + "TextValidate").innerHTML = "";
    }
    return true;
  } else {
    if (report) {
      get("#" + id + "TextValidate").innerHTML =
        "Hanya boleh menggunakan huruf";
    }
    return false;
  }
}

function justTextAndAngka(r, report = true) {
  const id = r.getAttribute("id");
  if (r.value == "") {
    if (report) {
      get("#" + id + "TextValidate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (/^[a-zA-Z][0-9 a-z A-Z]*$/.test(r.value)) {
    if (report) {
      get("#" + id + "TextValidate").innerHTML = "";
    }
    return true;
  } else {
    if (report) {
      get("#" + id + "TextValidate").innerHTML =
        "Hanya boleh menggunakan huruf dan angka";
    }
    return false;
  }
}
