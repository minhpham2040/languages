loadingLazy() {
  function load(img) {
    let url = img.getAttribute("lazy-src");
    img.src = url;
    img.removeAttribute("lazy-src");
  }
  if ("IntersectionObserver" in window) {
    let images = document.querySelectorAll("[lazy-src]");

    let observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          load(entry.target);
          observer.unobserve(entry.target);
        }
      });
    });

    images.forEach((image) => {
      observer.observe(image);
    });
  }
}
