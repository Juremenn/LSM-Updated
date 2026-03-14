const sliderItems = document.querySelectorAll(".slider-items");
const prevButton = document.querySelector(".slider-prev");
const nextButton = document.querySelector(".slider-next");
const dotsContainer = document.querySelector(".slider-dots");
const navbar = document.querySelector("nav");

let sliderActive = 0;
let autoSlideTimer = null;

if (sliderItems.length > 0) {
  const dotButtons = [];

  const updateDots = (activeIndex) => {
    dotButtons.forEach((dotButton, dotIndex) => {
      const isActive = dotIndex === activeIndex;
      dotButton.classList.toggle("is-active", isActive);
      dotButton.setAttribute("aria-current", isActive ? "true" : "false");
    });
  };

  const showSlide = (index) => {
    sliderItems.forEach((slider, itemIndex) => {
      slider.setAttribute("data-show", itemIndex === index ? "show" : "hidden");
    });
    updateDots(index);
  };


  const nextSlide = () => {
    sliderActive = (sliderActive + 1) % sliderItems.length;
    showSlide(sliderActive);
  };

  const prevSlide = () => {
    sliderActive = (sliderActive - 1 + sliderItems.length) % sliderItems.length;
    showSlide(sliderActive);
  };

  const startAutoSlide = () => {
    autoSlideTimer = setInterval(nextSlide, 10000);
  };

  const restartAutoSlide = () => {
    clearInterval(autoSlideTimer);
    startAutoSlide();
  };

  if (dotsContainer) {
    sliderItems.forEach((_, index) => {
      const dotButton = document.createElement("button");
      dotButton.type = "button";
      dotButton.className = "dot-btn";
      dotButton.setAttribute("aria-label", `Go to slide ${index + 1}`);

      dotButton.addEventListener("click", () => {
        sliderActive = index;
        showSlide(sliderActive);
        restartAutoSlide();
      });

      dotsContainer.appendChild(dotButton);
      dotButtons.push(dotButton);
    });
  }

  showSlide(sliderActive);
  startAutoSlide();

  if (nextButton) {
    nextButton.addEventListener("click", () => {
      nextSlide();
      restartAutoSlide();
    });
  }

  if (prevButton) {
    prevButton.addEventListener("click", () => {
      prevSlide();
      restartAutoSlide();
    });
  }
}

if (navbar) {
  navbar.classList.add("is-scrolled");
}

const smoothScrollTargets = new Set(["#partnership-section", "#contact"]);
const smoothScrollStorageKey = "pendingSmoothScrollTarget";

const pulseScrollTarget = (targetElement) => {
  if (!targetElement) {
    return;
  }

  targetElement.classList.remove("scroll-target-pulse");
  // Force reflow so repeated clicks retrigger the animation class.
  // eslint-disable-next-line no-unused-expressions
  targetElement.offsetWidth;
  targetElement.classList.add("scroll-target-pulse");

  window.setTimeout(() => {
    targetElement.classList.remove("scroll-target-pulse");
  }, 950);
};

const normalizePathname = (pathname) => {
  if (!pathname) {
    return "/";
  }

  return pathname.endsWith("/") && pathname.length > 1
    ? pathname.slice(0, -1)
    : pathname;
};

const getScrollOffset = () => {
  const navHeight = navbar ? navbar.getBoundingClientRect().height : 0;
  return Math.max(12, Math.round(navHeight + 8));
};

const smoothScrollToHash = (hash, shouldUpdateHash = true) => {
  if (!hash || !smoothScrollTargets.has(hash)) {
    return false;
  }

  const target = document.querySelector(hash);
  if (!target) {
    return false;
  }

  const targetTop = Math.max(0, window.scrollY + target.getBoundingClientRect().top - getScrollOffset());
  window.scrollTo({
    top: targetTop,
    behavior: "smooth",
  });

  window.setTimeout(() => {
    pulseScrollTarget(target);
  }, 280);

  if (shouldUpdateHash && window.history?.replaceState) {
    window.history.replaceState(null, "", hash);
  }

  return true;
};

const handlePendingSmoothScroll = () => {
  let pendingHash = "";
  try {
    pendingHash = window.sessionStorage.getItem(smoothScrollStorageKey) || "";
  } catch (_) {
    pendingHash = "";
  }

  if (!pendingHash && smoothScrollTargets.has(window.location.hash)) {
    pendingHash = window.location.hash;
  }

  if (!pendingHash || !smoothScrollTargets.has(pendingHash)) {
    return;
  }

  requestAnimationFrame(() => {
    const isScrolled = smoothScrollToHash(pendingHash, false);
    if (isScrolled) {
      try {
        window.sessionStorage.removeItem(smoothScrollStorageKey);
      } catch (_) {
        // noop
      }
    }
  });
};

handlePendingSmoothScroll();

window.addEventListener("load", () => {
  if (smoothScrollTargets.has(window.location.hash)) {
    smoothScrollToHash(window.location.hash, false);
  }
});

document.querySelectorAll("nav a[href*='#']").forEach((link) => {
  link.addEventListener("click", (event) => {
    const href = link.getAttribute("href");
    if (!href || !href.includes("#")) {
      return;
    }

    let targetUrl;
    try {
      targetUrl = new URL(href, window.location.href);
    } catch (_) {
      return;
    }

    const targetHash = targetUrl.hash;
    if (!smoothScrollTargets.has(targetHash) || targetUrl.origin !== window.location.origin) {
      return;
    }

    const currentPath = normalizePathname(window.location.pathname);
    const targetPath = normalizePathname(targetUrl.pathname);

    if (currentPath === targetPath) {
      event.preventDefault();
      smoothScrollToHash(targetHash);
      return;
    }

    try {
      window.sessionStorage.setItem(smoothScrollStorageKey, targetHash);
    } catch (_) {
      // noop
    }
  });
});

const mobileMenuButton = document.querySelector(".nav-mobile-menu");
const mobileNavList = document.querySelector("#primary-nav");

if (navbar && mobileMenuButton && mobileNavList) {
  const mobileMenuIcon = mobileMenuButton.querySelector("i");
  const navDropdownParents = Array.from(mobileNavList.querySelectorAll(".nav-has-dropdown"));
  const navDropdownToggles = Array.from(mobileNavList.querySelectorAll(".nav-dropdown-toggle"));

  const closeNavDropdowns = () => {
    navDropdownParents.forEach((item) => item.classList.remove("is-open"));
  };

  const setMobileNavState = (isOpen) => {
    navbar.classList.toggle("nav-mobile-open", isOpen);
    mobileMenuButton.setAttribute("aria-expanded", isOpen ? "true" : "false");

    if (mobileMenuIcon) {
      mobileMenuIcon.classList.toggle("bi-list", !isOpen);
      mobileMenuIcon.classList.toggle("bi-x", isOpen);
    }

    if (!isOpen) {
      closeNavDropdowns();
    }
  };

  mobileMenuButton.addEventListener("click", () => {
    const isOpen = navbar.classList.contains("nav-mobile-open");
    setMobileNavState(!isOpen);
  });

  mobileNavList.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      setMobileNavState(false);
    });
  });

  navDropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const parent = toggle.closest(".nav-has-dropdown");
      if (!parent) {
        return;
      }

      const nextState = !parent.classList.contains("is-open");
      closeNavDropdowns();
      parent.classList.toggle("is-open", nextState);
    });
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      setMobileNavState(false);
      closeNavDropdowns();
    }
  });
}

const featureCards = Array.from(document.querySelectorAll(".feature-card"));
const featurePrev = document.querySelector(".feature-prev");
const featureNext = document.querySelector(".feature-next");
const featureDots = document.querySelector(".feature-dots");
const featureTabs = Array.from(document.querySelectorAll(".feature-tab"));
const featureDescription = document.querySelector(".feature-carousel-description");

if (featureCards.length > 0 && featureDots) {
  let activeGroup = featureTabs.find((tab) => tab.classList.contains("is-active"))?.dataset.featureGroup
    || featureCards[0].dataset.featureGroup;
  let activeFeature = 0;
  let featureTimer = null;
  let dots = [];

  const cardsByGroup = (group) => featureCards.filter((card) => card.dataset.featureGroup === group);
  const getActiveCards = () => cardsByGroup(activeGroup);

  const stopFeatureAutoPlay = () => {
    clearInterval(featureTimer);
    featureTimer = null;
  };

  const applyFeatureClasses = (activeIndex) => {
    const activeCards = getActiveCards();
    if (activeCards.length === 0) {
      return;
    }

    const lastIndex = activeCards.length - 1;
    const prevIndex = activeIndex === 0 ? lastIndex : activeIndex - 1;
    const nextIndex = activeIndex === lastIndex ? 0 : activeIndex + 1;

    featureCards.forEach((card) => {
      card.classList.remove("is-active", "is-prev", "is-next", "is-hidden");
      card.classList.remove("is-filtered-out");

      if (card.dataset.featureGroup !== activeGroup) {
        card.classList.add("is-filtered-out");
      }
    });

    activeCards.forEach((card, index) => {
      if (index === activeIndex) {
        card.classList.add("is-active");
      } else if (index === prevIndex) {
        card.classList.add("is-prev");
      } else if (index === nextIndex) {
        card.classList.add("is-next");
      } else {
        card.classList.add("is-hidden");
      }
    });

    dots.forEach((dot, index) => {
      dot.classList.toggle("is-active", index === activeIndex);
      dot.setAttribute("aria-current", index === activeIndex ? "true" : "false");
    });
  };

  const goToFeature = (index) => {
    const activeCards = getActiveCards();
    if (activeCards.length === 0) {
      return;
    }

    const safeIndex = ((index % activeCards.length) + activeCards.length) % activeCards.length;
    activeFeature = safeIndex;
    applyFeatureClasses(activeFeature);
  };

  const renderDots = () => {
    const activeCards = getActiveCards();
    featureDots.innerHTML = "";
    dots = [];

    activeCards.forEach((_, index) => {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.className = "feature-dot";
      dot.setAttribute("aria-label", `Go to feature ${index + 1}`);
      dot.addEventListener("click", () => {
        goToFeature(index);
        restartFeatureAutoPlay();
      });

      featureDots.appendChild(dot);
      dots.push(dot);
    });
  };

  const setActiveGroup = (group) => {
    const targetCards = cardsByGroup(group);
    if (targetCards.length === 0) {
      return;
    }

    activeGroup = group;
    activeFeature = 0;
    featureTabs.forEach((tab) => {
      const isActive = tab.dataset.featureGroup === group;
      tab.classList.toggle("is-active", isActive);
      tab.setAttribute("aria-pressed", isActive ? "true" : "false");
    });
    const activeTab = featureTabs.find((tab) => tab.dataset.featureGroup === group);
    if (featureDescription && activeTab?.dataset.featureDesc) {
      featureDescription.textContent = activeTab.dataset.featureDesc;
    }

    renderDots();
    applyFeatureClasses(activeFeature);
  };

  const nextFeature = () => {
    const activeCards = getActiveCards();
    if (activeCards.length < 2) {
      return;
    }

    const targetIndex = (activeFeature + 1) % activeCards.length;
    goToFeature(targetIndex);
  };

  const prevFeature = () => {
    const activeCards = getActiveCards();
    if (activeCards.length < 2) {
      return;
    }

    const targetIndex = (activeFeature - 1 + activeCards.length) % activeCards.length;
    goToFeature(targetIndex);
  };

  const startFeatureAutoPlay = () => {
    const activeCards = getActiveCards();
    if (activeCards.length < 2) {
      return;
    }

    featureTimer = setInterval(nextFeature, 5500);
  };

  const restartFeatureAutoPlay = () => {
    stopFeatureAutoPlay();
    startFeatureAutoPlay();
  };

  featureTabs.forEach((tab) => {
    tab.setAttribute("aria-pressed", tab.classList.contains("is-active") ? "true" : "false");
    tab.addEventListener("click", () => {
      const targetGroup = tab.dataset.featureGroup;
      if (!targetGroup || targetGroup === activeGroup) {
        return;
      }

      setActiveGroup(targetGroup);
      restartFeatureAutoPlay();
    });
  });

  setActiveGroup(activeGroup);
  startFeatureAutoPlay();

  if (featureNext) {
    featureNext.addEventListener("click", () => {
      nextFeature();
      restartFeatureAutoPlay();
    });
  }

  if (featurePrev) {
    featurePrev.addEventListener("click", () => {
      prevFeature();
      restartFeatureAutoPlay();
    });
  }
}

const revealSelectors = [
  "section",
  ".slider-content",
  ".about-card",
  ".news-featured-card",
  ".news-mini-card",
  ".feature-carousel-badges",
  ".alumni-card-item",
  ".contact-header",
  ".contact .row",
  ".partner-group",
  ".partner-logo-card",
  ".footer-brand",
  ".footer-posts",
  ".footer-links",
  ".footer-contact-map",
];

const revealTargets = Array.from(
  new Set(revealSelectors.flatMap((selector) => Array.from(document.querySelectorAll(selector)))),
).filter((element) => !element.classList.contains("slider-items"));

if (revealTargets.length > 0 && "IntersectionObserver" in window) {
  revealTargets.forEach((element, index) => {
    element.classList.add("reveal");
    element.style.setProperty("--reveal-delay", `${(index % 8) * 45}ms`);
  });

  const revealObserver = new window.IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.14,
      rootMargin: "0px 0px -8% 0px",
    },
  );

  revealTargets.forEach((element) => revealObserver.observe(element));
}

window.addEventListener("load", () => {
  const alumniRoot = document.querySelector(".alumni-slide-container.swiper");
  if (!alumniRoot || typeof window.Swiper === "undefined") {
    return;
  }

  // eslint-disable-next-line no-new
  new window.Swiper(alumniRoot, {
    slidesPerView: 1.1,
    centeredSlides: true,
    spaceBetween: 16,
    loop: true,
    speed: 750,
    grabCursor: true,
    parallax: true,
    autoplay: {
      delay: 4200,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".alumni-section .swiper-pagination",
      clickable: true,
      renderBullet(index, className) {
        const slideNumber = `${index + 1}`.padStart(2, "0");
        return `<button type="button" class="${className}" aria-label="Go to alumni slide ${slideNumber}">${slideNumber}</button>`;
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 1.35,
        spaceBetween: 18,
      },
      768: {
        slidesPerView: 1.8,
        spaceBetween: 20,
      },
      1100: {
        slidesPerView: 2.45,
        spaceBetween: 24,
      },
    },
  });
});
