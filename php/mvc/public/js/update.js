class Up extends Form {
  pagesAdmin() {
    let a = "/mvc/views/pages/admin/";
    return a;
  }

  xml(fileName, str, elem) {
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        elem.innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      `/mvc/views/pages/admin/${fileName}.php?v=` + str,
      true,
    );
    xmlhttp.send();
  }

  newItem(t) {
    let par = t.parentElement.parentElement.parentElement;
    let children1 = par.children[1];
    let elm = document.createElement("div");
    elm.classList.add("flex");
    elm.classList.add("under-line");
    elm.style.alignItems = "center";

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        elm.innerHTML = this.responseText;
        children1.insertBefore(elm, children1.children[0]);
      }
    };
    xmlhttp.open("GET", "/mvc/views/pages/admin/new.php", true);
    xmlhttp.send();
  }

  newItem1(t) {
    let par = t.parentElement.parentElement.parentElement;
    let children1 = par.children[1];
    let elm = document.createElement("div");
    elm.classList.add("flex");
    elm.classList.add("under-line");

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        elm.innerHTML = this.responseText;
        children1.insertBefore(elm, children1.children[0]);
      }
    };
    xmlhttp.open("GET", "/mvc/views/pages/admin/new1.php", true);
    xmlhttp.send();
  }

  newItem2(t) {
    let par = t.parentElement.parentElement.parentElement;
    let children1 = par.children[1];
    let elm = document.createElement("div");
    elm.classList.add("flex");
    elm.classList.add("under-line");

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        elm.innerHTML = this.responseText;
        children1.insertBefore(elm, children1.children[0]);
      }
    };
    xmlhttp.open("GET", "/mvc/views/pages/admin/new2.php", true);
    xmlhttp.send();
  }

  chooseImage(t) {
    let fr = new FileReader();
    fr.readAsDataURL(t.files[0]);
    fr.onload = function () {
      document.querySelector(".image-wrapper").innerHTML =
        `<img class='full' src='${fr.result}'>`;
    };
  }

  updateAvatar(t) {
    let fr = new FileReader();
    fr.readAsDataURL(t.files[0]);
    fr.onload = function () {
      document.querySelector(".avatarWrapper").innerHTML =
        `<img src='${fr.result}'>`;
    };
    let form = new FormData();
    form.append("file", t.files[0]);
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        t.dataset.avatar = JSON.parse(this.responseText);
      }
    };
    xmlhttp.open(
      "POST",
      "/mvc/views/pages/user/updateAvatar.php?username=" +
        t.dataset.username +
        "&avatar=" +
        JSON.stringify(t.dataset.avatar),
      true,
    );
    xmlhttp.send(form);
  }

  createItem(t) {
    let modal = document.querySelector(".modal");
    let par = modal.parentElement;
    let inputs = par.querySelectorAll("[type='text']");
    let is = [...inputs].every((input) => {
      return input.value != "";
    });
    if (document.querySelector("[type='file']").files[0] && is) {
      let formData = new FormData();
      formData.append("file", document.querySelector("[type='file']").files[0]);
      let line = inputs[0].value.replaceAll(" ", "-");
      for (let i = 1; i < inputs.length; i++) {
        line += "$" + inputs[i].value.replaceAll(" ", "-");
      }

      let xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          modal.remove();
          par.innerHTML = this.responseText;
        }
      };
      xmlhttp.open(
        "POST",
        "/mvc/views/pages/admin/createItem.php?v=" + line,
        true,
      );
      xmlhttp.send(formData);
    } else {
      document.querySelector(".error").innerText =
        "Please choose image and type these fiels.";
    }
  }

  clearInput(t) {
    document.querySelector(".modal").parentElement.remove();
  }

  update(t) {
    let par = t.parentElement.parentElement;
    let modal = document.createElement("div");
    modal.classList.add("modal");
    let str = t.getAttributeNode("data").value;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        modal.innerHTML = this.responseText;
        par.appendChild(modal);
      }
    };
    xmlhttp.open("GET", `/mvc/views/pages/admin/update.php?v=` + str, true);
    xmlhttp.send();
  }

  save(t) {
    let arr = [];
    let par = document.querySelector(".modal").parentElement;
    let inputs = par.querySelectorAll("input");
    for (let i = 1; i < inputs.length; i++) {
      arr.push(inputs[i].value.replaceAll(" ", "-"));
    }
    arr.push(inputs[0].dataset.image);
    arr = arr.join("$");

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        par.innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "POST",
      `/mvc/views/pages/admin/save.php?v=${arr}&n=${t.dataset.name}`,
      true,
    );
    xmlhttp.send();
  }

  cancel(t) {
    let par = document.querySelector(".modal").parentElement;
    let str = t.getAttributeNode("data").value;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        par.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", `/mvc/views/pages/admin/cancel.php?v=` + str, true);
    xmlhttp.send();
  }

  cancel1(t) {
    document.querySelector(".modal").remove();
  }

  noti(t, fileName) {
    let par = t.parentElement.parentElement;
    let elem = document.createElement("div");
    elem.classList.add("modal");
    let img = t.dataset.image;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        elem.innerHTML = this.responseText;
        par.insertBefore(elem, par.children[0]);
      }
    };
    xmlhttp.open(
      "GET",
      "/mvc/views/pages/admin/" +
        fileName +
        ".php?v=" +
        t.getAttribute("data") +
        "&image=" +
        img,
      true,
    );
    xmlhttp.send();
  }

  closeNoti(t) {
    let par = t.parentElement.parentElement.parentElement;
    par.remove();
  }

  moveto(t, from, to) {
    let par = t.parentElement.parentElement.parentElement.parentElement;
    let name = t.getAttribute("data");
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        par.remove();
      }
    };
    xmlhttp.open(
      "GET",
      "/mvc/views/pages/admin/moveTo.php?v=" + name + `&from=${from}&to=${to}`,
      true,
    );
    xmlhttp.send();
  }

  deleteOne(t) {
    let par = t.parentElement.parentElement.parentElement.parentElement;
    let name = t.getAttribute("data");
    let img = t.dataset.image;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        par.remove();
      }
    };
    xmlhttp.open(
      "GET",
      "/mvc/views/pages/admin/delete.php?v=" + name + "&image=" + img,
      true,
    );
    xmlhttp.send();
  }

  deleteAll(t) {
    let par =
      t.parentElement.parentElement.parentElement.parentElement.parentElement;
    let arr = [];
    document.querySelectorAll(".delete-one").forEach((i) => {
      arr.push(i.dataset.image);
    });
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        par.children[2].remove();
        par.children[1].remove();
        par.children[0].remove();
      }
    };
    xmlhttp.open(
      "GET",
      "/mvc/views/pages/admin/deleteAll.php?images=" + JSON.stringify(arr),
      true,
    );
    xmlhttp.send();
  }
}
let up = new Up();
