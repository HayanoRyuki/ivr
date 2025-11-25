
/* ===================================================
他のページへの影響を防ぐため「.lp-connect」内でのみ実行
=====================================================*/

/* ================================
viewport設定
==================================*/
!(function () {
  const lp = document.querySelector('.lp-connect');
  if (!lp) return;// ★「lp-connect」でなければ何も実行しない
  const viewport = document.querySelector('meta[name="viewport"]');
  function switchViewport() {
    const value =
      window.outerWidth > 375
        ? 'width=device-width,initial-scale=1'
        : 'width=375';
    if (viewport.getAttribute('content') !== value) {
      viewport.setAttribute('content', value);
    }
  }
  addEventListener('resize', switchViewport, false);
  switchViewport();
})();

/* ================================
スクロール監視（IntersectionObserver）
==================================*/
(function () {
  const lp = document.querySelector('.lp-connect');
  if (!lp) return;// ★「lp-connect」でなければ何も実行しない

  const intersectionObserver = new IntersectionObserver(function(entries){
    entries.forEach(function(entry) {
      if(entry.isIntersecting){
        entry.target.classList.add("is-in-view");
      } else {
        //entry.target.classList.remove("is-in-view");
      }
    });
  });

  const inViewItems = document.querySelectorAll(".js-in-view");
  inViewItems.forEach(function(item) {
    intersectionObserver.observe(item);
  });

})();


/* ===================================================
固定CTA表示制御
=====================================================*/
(function () {
  const lp = document.querySelector(".lp-connect");
  if (!lp) return; // ★「lp-connect」でなければ何も実行しない

  const fixedCta = document.getElementById("js-fixedCta");
  if (!fixedCta) return;

  function toggleFixedCta() {
    if (window.innerWidth > 767) {
      fixedCta.classList.remove("isShow");
      return;
    }

    if (window.scrollY > 80) {
      fixedCta.classList.add("isShow");
    } else {
      fixedCta.classList.remove("isShow");
    }
  }

  window.addEventListener("scroll", toggleFixedCta);
  window.addEventListener("resize", toggleFixedCta);
  toggleFixedCta();
})();

/* ===================================================
スムーススクロール
=====================================================*/
(function () {
  const lp = document.querySelector(".lp-connect");
  if (!lp) return; // ★「lp-connect」でなければ何も実行しない
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(item => {
      item.addEventListener("click", event => {
        event.preventDefault();
        const targetId = item.getAttribute("href");
        const target = document.querySelector(targetId);
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        }
      });
    });
})();

