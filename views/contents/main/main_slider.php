<!-- Start Main-Slider -->
<div class="anbar-slider-wrap">

    <div class="anbar-slider" id="anbarSlider" role="region" aria-label="اسلایدر اصلی">

        <!-- slides -->
        <div class="anbar-slider__track" id="anbarSliderTrack">

            <a class="anbar-slider__slide" href="/cagegorys.php?id=81">
                <img src="/assets/img/main-slider/1.jpg"
                     width="2880" height="600"
                     fetchpriority="high"
                     alt="تاب و سرسره های عنبری تویز">
            </a>

            <a class="anbar-slider__slide" href="/cagegorys.php?id=95">
                <img src="/assets/img/main-slider/2.jpg"
                     width="2880" height="600"
                     loading="lazy"
                     alt="اسکوتر های کودک عنبری تویز">
            </a>

            <a class="anbar-slider__slide" href="/cagegorys.php?id=84">
                <img src="/assets/img/main-slider/3.jpg"
                     width="2880" height="600"
                     loading="lazy"
                     alt="میز و صندلی های کودک عنبری تویز">
            </a>

            <a class="anbar-slider__slide" href="/cagegorys.php?id=93">
                <img src="/assets/img/main-slider/4.jpg"
                     width="2880" height="600"
                     loading="lazy"
                     alt="عروسک های پولیشی عنبری تویز">
            </a>

            <a class="anbar-slider__slide" href="/cagegorys.php?id=96">
                <img src="/assets/img/main-slider/5.jpg"
                     width="2880" height="600"
                     loading="lazy"
                     alt="الاکلنگ تعادلی و واکر کودک عنبری تویز">
            </a>

        </div><!-- /.anbar-slider__track -->

        <!-- arrows -->
        <button class="anbar-slider__arrow anbar-slider__arrow--prev" id="anbarPrev" aria-label="اسلاید قبلی">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </button>
        <button class="anbar-slider__arrow anbar-slider__arrow--next" id="anbarNext" aria-label="اسلاید بعدی">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </button>

        <!-- dots -->
        <div class="anbar-slider__dots" id="anbarDots" role="tablist" aria-label="ناوبری اسلاید"></div>

    </div><!-- /.anbar-slider -->

</div><!-- /.anbar-slider-wrap -->

<script>
(function () {
    var slider  = document.getElementById('anbarSlider');
    var track   = document.getElementById('anbarSliderTrack');
    var btnPrev = document.getElementById('anbarPrev');
    var btnNext = document.getElementById('anbarNext');
    var dotsBox = document.getElementById('anbarDots');
    if (!slider || !track) return;

    var slides  = track.querySelectorAll('.anbar-slider__slide');
    var total   = slides.length;
    var current = 0;
    var timer   = null;
    var DELAY   = 4500;

    /* ساختن dot‌ها */
    slides.forEach(function (_, i) {
        var d = document.createElement('button');
        d.className = 'anbar-slider__dot' + (i === 0 ? ' is-active' : '');
        d.setAttribute('role', 'tab');
        d.setAttribute('aria-label', 'اسلاید ' + (i + 1));
        d.addEventListener('click', function () { goTo(i); restart(); });
        dotsBox.appendChild(d);
    });

    function getDots() { return dotsBox.querySelectorAll('.anbar-slider__dot'); }

    function goTo(idx) {
        slides[current].classList.remove('is-active');
        getDots()[current].classList.remove('is-active');
        current = (idx + total) % total;
        slides[current].classList.add('is-active');
        getDots()[current].classList.add('is-active');
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function restart() {
        clearInterval(timer);
        timer = setInterval(next, DELAY);
    }

    /* فعال کردن اول */
    slides[0].classList.add('is-active');
    restart();

    btnNext.addEventListener('click', function () { next(); restart(); });
    btnPrev.addEventListener('click', function () { prev(); restart(); });

    /* swipe موبایل */
    var startX = 0;
    track.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
    track.addEventListener('touchend', function (e) {
        var dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 40) { dx > 0 ? prev() : next(); restart(); }
    }, { passive: true });

    /* pause روی hover */
    slider.addEventListener('mouseenter', function () { clearInterval(timer); });
    slider.addEventListener('mouseleave', restart);
})();
</script>
<!-- End Main-Slider -->
