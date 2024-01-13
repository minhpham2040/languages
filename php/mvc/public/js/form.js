class Form extends Cart {
  validate(t) {
    let par = t.parentElement;
    let v = t.value;

    if (v === "") {
      par.children[2].innerHTML = "Enter this field, please!";
    } else {
      let xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          par.children[2].innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "/mvc/ajax/form/validate.php?v=" + v, true);
      xmlhttp.send();
    }
  }

  validateEmpty(t) {
    let par = t.parentElement;
    let v = t.value;

    par.children[2].innerHTML = "";

    if (v === "") {
      par.children[2].innerHTML = "Enter this field, please!";
    }
  }

  validateForm(event) {
    let form = event.target;
    let fgs = form.querySelectorAll(".form-group");
    let is = true;

    for (let i = 0; i < fgs.length; i++) {
      let input = fgs[i].children[1];
      let span = fgs[i].children[2];
      if (span.innerHTML != "") {
        is = false;
      }
      if (input.value == "") {
        is = false;
        span.innerHTML = "Enter this field, please!";
        continue;
      }
      span.innerHTML = "";
    }
    return is;
  }

  validateEmail(t) {
    let par = t.parentElement;
    let v = t.value;
    let a = v.indexOf("@");
    let b = v.lastIndexOf(".");
    par.children[2].innerHTML = "";

    if (a < 1 || b - a < 2) {
      par.children[2].innerHTML = "This field must is email!";
    }

    if (v === "") {
      par.children[2].innerHTML = "Enter this field, please!";
    }
  }
}
