function sliderShow() {
  const btnPre = document.getElementById("prev");
  const btnNext = document.getElementById("next");
  const slide = document.querySelector(".banner-container");
  const imgItem = document.querySelectorAll(".img-item");
  const dots = document.querySelectorAll(".dots li");

  let index = 0;
  const lengthImg = imgItem.length - 1;

  let autoReload = setInterval(() => btnNext.click(), 2500);

  function reloadSlider() {
    slide.style.transform = `translateX(-${imgItem[index].offsetLeft}px)`;
    document.querySelector(".dots li.active").classList.remove("active");
    dots[index].classList.add("active");
  }

  dots.forEach((li, key) =>
    li.addEventListener("click", () => {
      index = key;
      reloadSlider();
    })
  );

  btnNext.onclick = () => {
    index = index === lengthImg ? 0 : index + 1;
    reloadSlider();
    clearInterval(autoReload);
  };

  btnPre.onclick = () => {
    index = index === 0 ? lengthImg : index - 1;
    reloadSlider();
    clearInterval(autoReload);
  };
}

sliderShow();

// slider card
function initSlider(
  containerSelector,
  itemSelector,
  nextBtnSelector,
  prevBtnSelector,
  autoScrollTime = 2500,
  numberOffset
) {
  const container = document.querySelector(containerSelector);
  const item = document.querySelector(itemSelector);

  const widthItem = item.offsetWidth + parseInt(numberOffset);
  const btnNext = document.querySelector(nextBtnSelector);
  const btnPrev = document.querySelector(prevBtnSelector);

  function scrollNext() {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  }

  function scrollPrev() {
    if (container.scrollLeft <= 0) {
      container.scrollLeft = container.scrollWidth - container.offsetWidth;
    } else {
      container.scrollLeft -= widthItem;
    }
  }

  let autoScrollInterval = setInterval(scrollNext, autoScrollTime);

  container.addEventListener("mouseover", () =>
    clearInterval(autoScrollInterval)
  );
  container.addEventListener(
    "mouseout",
    () => (autoScrollInterval = setInterval(scrollNext, autoScrollTime))
  );

  if (btnNext) btnNext.addEventListener("click", scrollNext);
  if (btnPrev) btnPrev.addEventListener("click", scrollPrev);
}
initSlider(
  ".products-bestseller-container",
  ".item-bestseller",
  ".next-bestseller",
  ".prev-bestseller",
  1500,
  20
);
