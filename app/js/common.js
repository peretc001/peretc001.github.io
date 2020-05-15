let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
const preventDefault = (e) => {
    e.preventDefault();
}
const disableScroll = () => {
    if ( width < 767 ) {
        document.body.classList.add('no-scroll')
    } else {
        document.body.addEventListener('touchmove', preventDefault, { passive: false });
        window.addEventListener('DOMMouseScroll', preventDefault, false);
        document.addEventListener('wheel', preventDefault, {passive: false});
    }
}
const enableScroll = () => {
    if ( width < 767 ){
        document.body.classList.remove('no-scroll')
    } else {
        document.body.removeEventListener('touchmove', preventDefault, { passive: false });
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        document.removeEventListener('wheel', preventDefault, {passive: false});
    }
}

function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return !!right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Flipbook = function () {
  function Flipbook(_ref) {
    var _this = this;

    var wrap = _ref.wrap,
        _next = _ref.next,
        _prev = _ref.prev,
        _ref$delay = _ref.delay,
        delay = _ref$delay === void 0 ? 500 : _ref$delay,
        startBtn = _ref.startBtn;

    _classCallCheck(this, Flipbook);

    _defineProperty(this, "prevPage", function () {
      if (_this.position >= 2) {
        _this.position -= 2;
      }

      var prev = _this.position;
      var current = _this.position + 1;
      var next = _this.position + 2;
      _this.children[prev].style.transform = 'rotateY(0)';
      _this.children[current].style.transform = 'rotateY(0)';
      _this.children[prev].style.zIndex = parseInt(_this.children[prev].dataset.count) - 1;
      _this.children[current].style.zIndex = parseInt(_this.children[current].dataset.count) - 1;
      _this.children[next].style.zIndex = parseInt(_this.children[next].dataset.count) - 1;
      _this.children[current].style.opacity = 0;
      setTimeout(function () {
        _this.children[next].style.opacity = 0;
      }, 100);

      _this.controls();
    });

    _defineProperty(this, "nextPage", function () {
      if (_this.position < _this.maxPosition - 2) {
        _this.position += 2;
      }

      var prev = _this.position - 2;
      var current = _this.position - 1;
      var next = _this.position;
      _this.children[prev].style.transform = 'rotateY(-180deg)';
      _this.children[current].style.transform = 'rotateY(-180deg)';
      _this.children[prev].style.zIndex = parseInt(_this.children[prev].dataset.count) + 1;
      _this.children[current].style.zIndex = parseInt(_this.children[current].dataset.count) + 1;
      _this.children[next].style.zIndex = parseInt(_this.children[next].dataset.count) + 1;
      _this.children[current].style.opacity = 1;
      setTimeout(function () {
        _this.children[next].style.opacity = 1;
      }, 100);

      _this.controls();
    });

    _defineProperty(this, "controls", function () {
      if (_this.position == 0) {
        _this.prev.classList.add('disabled');

        _this.next.classList.add('disabled');
      } else {
        _this.prev.classList.contains('disabled') ? _this.prev.classList.remove('disabled') : '';
        _this.next.classList.contains('disabled') ? _this.next.classList.remove('disabled') : '';
      }

      if (_this.position >= _this.maxPosition - 2) {
        _this.next.classList.add('disabled');
      }

      if (_this.startBtn && _this.position > 0) {
        _this.startBtn.classList.add('disabled');
      } else if (_this.startBtn && _this.position == 0) {
        _this.startBtn.classList.remove('disabled');
      }
    });

    this.wrap = document.querySelector(wrap);
    this.children = document.querySelector(wrap).children;
    this.next = document.querySelector(_next);
    this.prev = document.querySelector(_prev);
    this.position = null;
    this.maxPosition = this.children.length;
    this.delay = delay;
    this.startBtn = startBtn ? document.querySelector(startBtn) : '';
  }

  _createClass(Flipbook, [{
    key: "init",
    value: function init() {
      this.prev.addEventListener('click', this.prevPage);
      this.next.addEventListener('click', this.nextPage);

      if (this.position == null) {
        this.prev.classList.add('disabled');
        this.next.classList.add('disabled');
      }

      for (var index = 0; index < this.children.length; index++) {
        this.children[index].style.zIndex = 1;
        this.delay ? this.children[index].style.transition = 'transform ' + this.delay / 1000 + 's ease, opacity ' + this.delay / 2000 + 's ease' : '';
      }
    }
  }]);

  return Flipbook;
}();

document.addEventListener("DOMContentLoaded", function() {

    const navMenu = document.querySelector('.navbar-menu')
    const hamburger = document.querySelector('.hamburger')

    const openMenu = () => {
        const close = document.createElement('span')
        close.classList.add('closeMenu')

        navMenu.classList.add('fade')
        hamburger.classList.add('open')
        setTimeout(() => {
            navMenu.classList.add('open')
            navMenu.appendChild(close)
        }, 100);
        close.addEventListener('click', closeMenu)
        document.addEventListener('click', (e) => { 
            navMenu.classList.contains('open') && !e.target.contains(navMenu) ? closeMenu() : '' 
        })
    }

    const closeMenu = () => {
        const close = document.querySelector('.navbar-menu .closeMenu')
        navMenu.classList.remove('open')
        hamburger.classList.remove('open')
        setTimeout(() => {
            navMenu.classList.remove('fade')
            close.parentNode.removeChild(close)
        }, 100);
        // close.removeEventListener('click', closeMenu)
    }
    
    hamburger.addEventListener('click', openMenu)


    const anchors = document.querySelectorAll('.line-hover');
    for (let anchor of anchors) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault()
            let block = anchor.getAttribute('href');

            const blockID = block.replace('/','');
            
            document.querySelector('' + blockID).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
            })
        })
    };
    
    const form = document.querySelectorAll('.callback__form');
    form.forEach(item => {
        const formBtn = item.querySelector('.callback__form__button');
        const checkBtn = item.querySelector('.robot__check');

        formBtn.disabled = true;
        checkBtn.addEventListener('click', () => {
            checkBtn.classList.add('active');
        
            item.action = '/thankyou.php';
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "human");
            input.setAttribute("value", "human");
            input.classList.add('human');
            item.appendChild(input);
            formBtn.disabled = false;
        })
    })

    const photoGallery = document.querySelectorAll('.photo--item')

    const openGallery = (e) => {
        e.preventDefault();
        const div = document.createElement('div')
        const sliderBlock = document.createElement('div')
        const sliderTitle = document.createElement('div')
        const sliderProgress = document.createElement('div')
        div.classList.add('js-gallery')
        sliderTitle.classList.add('js-gallery-title')
        sliderBlock.classList.add('js-gallery-block')
        sliderProgress.classList.add('js-gallery-progress')
        
        let currentIndex = parseInt(e.target.dataset.count)
        let maxIndex
        width > 991 ? maxIndex = photoGallery.length-2 : maxIndex = photoGallery.length-1

        document.body.appendChild(div)
        div.innerHTML = '<div class="close"></div>'
        div.appendChild(sliderTitle)
        div.appendChild(sliderBlock)

        photoGallery.forEach(item => {
            const wrap = document.createElement('div')
            const link = document.createElement('span')
            wrap.appendChild(item.querySelector('img').cloneNode(true))
            link.innerHTML = '<a href="'+ item +'" download></a>'
            wrap.appendChild(link)
            sliderBlock.appendChild(wrap)
        })

        sliderTitle.appendChild(photoGallery[currentIndex].querySelector('.text-bottom').cloneNode(true))

        $('.js-gallery-block').slick({
            draggable: true,
            slidesToShow: 2,
            swipeToSlide: true,
            infinite: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
        $('.js-gallery-block').slick('slickGoTo', currentIndex)

        disableScroll()

        div.appendChild(sliderProgress)
        sliderProgress.innerHTML = `<div class="js-gallery-thumb"></div><div class="js-gallery-count"><p class="start">0</p><p class="end">${width > 991 ? maxIndex+2 : maxIndex + 1}</p></div>`
        currentIndex != 0 ? sliderProgress.querySelector('.js-gallery-thumb').style.width = (currentIndex/maxIndex)*100 + '%' : sliderProgress.querySelector('.js-gallery-thumb').style.width = ''


        $('.js-gallery-block').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            nextSlide != 0 ? sliderProgress.querySelector('.js-gallery-thumb').style.width = (nextSlide/maxIndex)*100 + '%' : sliderProgress.querySelector('.js-gallery-thumb').style.width = ''
            sliderTitle.innerHTML = ''
            sliderTitle.appendChild(photoGallery[nextSlide].querySelector('.text-bottom').cloneNode(true))
        });

        document.querySelector('.close').addEventListener('click', closeGallery)
    }

    const closeGallery = (e) => {
        const jsGallery = document.querySelector('.js-gallery')
        jsGallery.parentElement.removeChild(jsGallery)
        $('.js-gallery-block').slick('unslick')
        enableScroll()
    }

    photoGallery.forEach((item,i) => {
        item.addEventListener('click', openGallery)
    })

    const myFlipbook = new Flipbook({
        wrap: '#flipbook',
        prev: '.button.prev',
        next: '.button.next',
        delay: 500,
        startBtn: '.open-menu'
    });
    myFlipbook.init()

    document.querySelector('.open-menu').addEventListener('click', function() {
        document.querySelector('.open-menu').classList.add('disabled')        
        myFlipbook.nextPage()
    })



    // const openFlipbook = document.querySelector('.open-menu')
    // openFlipbook.addEventListener('click', function() {
    //     flipbookChildren[0].classList.add('last')
    // })
    

});


$( document ).ready(function() {

    $('#navbarToggle').on('show.bs.collapse', function () {
        $('.hamburger').addClass('open')
    })
    $('#navbarToggle').on('hide.bs.collapse', function () {
        $('.hamburger').removeClass('open')
    })

    // $(".phone_mask").mask("8-999-999-99-99");

    $('.lazy').Lazy();
});