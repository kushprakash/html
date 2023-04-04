$("#hot-deals, #best-accessories").owlCarousel({
    autoplay: false,
    smartSpeed: 2000,
    margin: 20,
    items: 3,
    dots: false,
    nav: false,
    loop: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    responsive: {
        0: {
            items: 1,
        },
        767: {
            items: 3
        },
        992: {
            items: 4
        },
        1200: {
            items: 5
        }
    }
});

$("#accerssory-carousel").owlCarousel({
    autoplay: false,
    smartSpeed: 2000,
    margin: 30,
    items: 3,
    autoWidth: true,
    dots: false,
    nav: false,
    loop: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
});

$("#testimonial-carousel").owlCarousel({
    autoplay: false,
    smartSpeed: 2000,
    margin: 20,
    items: 3,
    dots: false,
    nav: true,
    loop: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    responsive: {
        0: {
            items: 1,
        },
        767: {
            items: 1
        },
        992: {
            items: 1
        },
        1200: {
            items: 1
        }
    }
});;