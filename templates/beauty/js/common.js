$(function () { $("#my-menu").mmenu({ extensions: ["theme-black", "pagedim-black", "position-right"], navbar: { title: '<img src="img/logo.svg" alt="Салон красоты BeautySpa">' } }); var e = $("#my-menu").data("mmenu"); function s() { $(".carousel-services__item").each(function () { var e = $(this), s = e.find(".carousel-services__item__content").outerHeight(); e.find(".carousel-services__item__image").css("min-height", s) }) } function i() { $(".carousel-services__item__content").equalHeights() } e.bind("open:finish", function () { $(".hamburger").addClass("is-active") }), e.bind("close:finish", function () { $(".hamburger").removeClass("is-active") }), $(".carousel-services").on("initialized.owl.carousel", function () { setTimeout(function () { s() }, 100) }), $(".carousel-services").owlCarousel({ loop: !1, nav: !0, smartSpeed: 700, navText: ['<i class="fa fa-angle-double-left"></i>', ' <i class="fa fa-angle-double-right"></i>'], dots: !1, responsiveClass: !0, responsive: { 0: { items: 1 }, 650: { items: 2 }, 1200: { items: 3 }, 1920: { items: 4 } } }), s(), i(), window.onresize = function () { i() }, $(".carousel-services__item__content__composition__h3").each(function () { var e = $(this); e.html(e.html().replace(/(\S+)\s*$/, "<span>$1</span>")) }), $(".gallary__h2").each(function () { var e = $(this); e.html(e.html().replace(/^(\S+)/, "<span>$1</span>")) }), $(".review__h2").each(function () { var e = $(this); e.html(e.html().replace(/^(\S+)/, "<span>$1</span>")) }), $("select").selectize({ create: !0, sortField: "text" }), $("form.request__block").submit(function () { var e = $(this); return $.ajax({ type: "POST", url: "mail.php", data: e.serialize() }).done(function () { $(e).find(".request__success").addClass("active").css("display", "flex").hide().fadeIn(), setTimeout(function () { $(e).find(".request__success").removeClass("active").fadeOut(), e.trigger("reset") }, 3e3) }), !1 }), $(".review__carousel").owlCarousel({ loop: !0, items: 1, smartSpeed: 700, nav: !0, navText: ['<i class="fas fa-quote-left"></i>', ' <i class="fas fa-quote-right"></i>'], dots: !0 }), $(".partners__carousel").owlCarousel({ loop: !0, items: 4, smartSpeed: 700, nav: !0, navText: ['<i class="fa fa-angle-left"></i>', ' <i class="fa fa-angle-right"></i>'], dots: !1, responsiveClass: !0, responsive: { 0: { items: 1 }, 550: { items: 2 }, 768: { items: 3 }, 992: { items: 4 } } }) }), document.addEventListener('DOMContentLoaded', () => {$(".preloader").delay(1000).fadeOut("slow")});