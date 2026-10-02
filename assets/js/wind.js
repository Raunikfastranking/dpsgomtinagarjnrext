var closeMenu = document.getElementById("closeMenu");
var onMobileEffect = document.getElementById("onMobileEffect");
var NavMenu = document.getElementById("NavMenu");
var menubrop = document.getElementById("menubrop");

if (closeMenu && onMobileEffect && NavMenu) {
  closeMenu.addEventListener("click", function () {
    NavMenu.style.webkitTransform = "translateX(-100%)";
    onMobileEffect.style.webkitTransform = "translateX(-100%)";
  });
}

if (menubrop && NavMenu && onMobileEffect) {
  menubrop.addEventListener("click", function () {
    NavMenu.style.webkitTransform = "translateX(0%)";
    onMobileEffect.style.webkitTransform = "translateX(0%)";
  });
}

document.querySelectorAll("p").forEach(function (paragraph) {
  paragraph.innerHTML = paragraph.innerHTML.replace(/\s([^\s<]{1,10})\s*$/, "&nbsp;$1");
});

function mountGlide(selector, options) {
  if (!document.querySelector(selector)) return;
  var g = new Glide(selector, options);
  g.mount();
}

mountGlide(".heroSlider", {
  type: "carousel",
  focusAt: 1,
  perView: 1,
  autoplay: 3500,
  animationDuration: 700,
  gap: 24,
  classes: {
    activeNav: "[&>*]:bg-slate-700",
  },
  breakpoints: {
    1024: {
      perView: 1,
    },
    640: {
      perView: 1,
    },
  },
});

mountGlide(".philosophy", {
  type: "carousel",
  perView: 3,
  focusAt: "center",
  autoplay: 3500,
  animationDuration: 700,
  gap: 20,
  classes: {
    activeNav: "[&>*]:bg-slate-700",
  },
  breakpoints: {
    1680: {
      perView: 4,
    },
    1380: {
      perView: 3,
    },
    1024: {
      perView: 2,
    },
    767: {
      perView: 2,
    },
    640: {
      perView: 1,
    },
  },
});

mountGlide(".campus", {
  type: "carousel",
  focusAt: 1,
  perView: 3,
  autoplay: 3500,
  animationDuration: 700,
  gap: 24,
  classes: {
    activeNav: "[&>*]:bg-slate-700",
  },
  breakpoints: {
    1680: {
      perView: 3,
    },
    1024: {
      perView: 3,
    },
    820: {
      perView: 2,
    },
    640: {
      perView: 1,
    },
  },
});

mountGlide(".latestNews", {
  type: "carousel",
  focusAt: 1,
  perView: 4,
  autoplay: 3500,
  animationDuration: 700,
  gap: 24,
  classes: {
    activeNav: "[&>*]:bg-slate-700",
  },
  breakpoints: {
    1024: {
      perView: 4,
    },
    640: {
      perView: 1,
    },
  },
});

mountGlide(".about-carousel", {
  type: "carousel",
  focusAt: "center",
  perView: 4,
  autoplay: 3500,
  animationDuration: 700,
  gap: 24,
  classes: {
    activeNav: "[&>*]:bg-slate-700",
  },
  breakpoints: {
    1680: {
      perView: 4,
    },
    1024: {
      perView: 3,
    },
    820: {
      perView: 2,
    },
    640: {
      perView: 1,
    },
  },
});
