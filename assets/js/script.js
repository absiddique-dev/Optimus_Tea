document.addEventListener("DOMContentLoaded", function () {
  var navbar = document.getElementById("navbar");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 0) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });
  window.addEventListener("scroll", function () {
    if (window.scrollY > 500) {
      navbar.classList.add("text-black");
    } else {
      navbar.classList.remove("text-black");
    }
  });
});

// whatsapp widget
function iconPress() {
  var whatsappWidget = document.getElementById("whatsapp-widget");
  var wpIcon = document.getElementById("wp-icon");
  // Set display property to block
  whatsappWidget.style.display = "block";
  wpIcon.style.display = "none";
  setTimeout(() => {
    document.getElementsByClassName("status")[0].innerText = "Online";
  }, 2000);
}
function removeMsgContainer() {
  var whatsappWidget = document.getElementById("whatsapp-widget");
  var wpIcon = document.getElementById("wp-icon");
  // Set display property to block
  whatsappWidget.style.display = "none";
  wpIcon.style.display = "flex";
}

// send mgs
function sentMsg() {
  var textInput = document.getElementById("textInput").value;
  var sendIcon = document.getElementsByName("sendIcon")[0];
  if (textInput) {
    window.location.href = "https://wa.me/+918141100044/?text=" + encodeURIComponent(textInput);
  }
}

// javaScript for sidebar
function toggleChange(data) {
  const show = document.getElementById("show");
  const close = document.getElementById("close");
  const sidebar = document.getElementById("sidebar");
  const btnWraper = document.getElementById("btnWrapper");

  if (data == "show") {
    sidebar.style.right = "0";
    btnWraper.style.right = "320px";
    show.style.display = "none";
    close.style.display = "block";
  } else {
    sidebar.style.right = "-400px";
    btnWraper.style.right = "20px";
    show.style.display = "block";
    close.style.display = "none";
  }
}

function hideSidebar() {
  const sidebar = document.getElementById("sidebar");
  const close = document.getElementById("close");
  const btnWrapper = document.getElementById("btnWrapper");

  sidebar.style.right = "-400px";
  close.style.display = "none";
  show.style.display = "block";
  btnWrapper.style.right = "20px";
}

