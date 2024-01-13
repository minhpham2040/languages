class Upload {
  uploads(t) {
    let input = document.querySelector("[type='file']");
    let file = input.files[0];
    let form = new FormData();
    form.append("file", file);
    let xml = new XMLHttpRequest();

    xml.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        input.dataset.image = JSON.parse(this.responseText);
      }
    };
    xml.open(
      "POST",
      "/mvc/ajax/admin/products/upload.php?oldimage=" +
        input.dataset.image +
        "&name=" +
        t.dataset.name,
      true,
    );
    xml.send(form);
  }
}
let uplo = new Upload();
