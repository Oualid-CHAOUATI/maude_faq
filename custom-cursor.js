onload = () => {
  const cursor = document.querySelector("#custom-cursor");

  window.addEventListener("mousemove", function (e) {
    // console.log(e);
    let { clientX: x, clientY: y } = e;
    // console.log(x, "--", y);

    cursor.style.setProperty("--x", x + "px");
    cursor.style.setProperty("--y", y + "px");
    // cursor.style.left = x + "px";
    // cursor.style.top = y + "px";
  });

  window.addEventListener("click", function (e) {
    console.log("click");
    const { clientX: x, clientY: y } = e;

    const ripple = document.createElement("div");
    ripple.className = "ripple";
    ripple.style.left = x + "px";
    ripple.style.top = y + "px";

    let animDuration = 1000;
    ripple.style.setProperty("--animation-duration", animDuration + "ms");

    this.setTimeout(() => {
      ripple.remove();
    }, animDuration * 1.5);

    this.document.body.appendChild(ripple);
  });
};
