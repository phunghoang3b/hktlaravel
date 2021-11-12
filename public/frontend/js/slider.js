const glide1 = document.getElementById("glide1");
if (glide1)
    new Glide(glide1, {
        type: "carousel",
        startAt: 0,
        perView: 5,
        hoverpause: false,
        autoplay: 2000,
        animationDuration: 800,
        animationTimingFunc: "linear",
        breakpoints: {
            1200: {
                perView: 3,
            },
            768: {
                perView: 2,
            },
        },
    }).mount();


