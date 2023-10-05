<input type="file" name="image" id="image-file">
<input type="text" name="name" class="name">
<button onclick="upload();">Upload</button>

<script>
  function upload() {
    let photo = document.getElementById("image-file").files[0];  // file from input
    let name = document.querySelector(".name");
    let req = new XMLHttpRequest();
    let formData = new FormData();
    
    formData.append("image", photo);   // name input
    formData.append("name", name.value);
    req.open("POST", '/upload.php'); // file php receive data and handle
    req.send(formData);
  }
</script>
