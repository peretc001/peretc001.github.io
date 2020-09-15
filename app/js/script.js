document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.hamburger')) {
        const hamburger = document.querySelector('.hamburger')
        const menu = document.querySelector('.mobile-menu-dropdown')

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open')
            menu.classList.toggle('open')
            document.body.classList.toggle('no-scroll')
        })

        const modalLink = menu.querySelectorAll('[data-toggle="modal"]')
        modalLink.forEach(item => {
            item.addEventListener('click', () => {
                hamburger.classList.remove('open')
                menu.classList.remove('open')
                document.body.classList.remove('no-scroll')
            })
        })

        const openSearch = document.querySelectorAll('.open-search')
        const search = document.querySelector('.search-form')
        openSearch.forEach(item => {
            item.addEventListener('click', () => {
                div = document.createElement('div')
                div.classList.add('layout')
                document.body.appendChild(div)

                document.body.classList.add('no-scroll')

                div.addEventListener('click', hideSearch)

                setTimeout(() => {
                    div.classList.add('open')
                    search.classList.add('open')
                }, 100)
            })
        })

        function hideSearch() {
            search.classList.remove('open')
            document.querySelector('.layout').parentNode.removeChild(document.querySelector('.layout'))
            if (!document.querySelector('.mobile-menu-dropdown.open'))
                document.body.classList.remove('no-scroll')
        }
    }

    if (document.querySelector('.thumbnails')) {
        $('.thumbnails').slick({
            vertical: true,
            infinite: true,
            slidesToShow: 3,
            asNavFor: '.gallery-column',
            focusOnSelect: true,
            arrows: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        asNavFor: false,
                    }
                }
            ]
        });

        $('.gallery-column').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            asNavFor: '.thumbnails',
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        asNavFor: false,
                    }
                }
            ]
        });
    }

    if (document.querySelector('.recent-products')) {
        $('.recent-products').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            draggable: true,
            arrows: true,
            dots: false,
            responsive: [
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        });
    }

    if (document.querySelector('.product-item--size')) {
        const sizes = document.querySelectorAll('.product-item--size .size-items label')
        const sizeBlock = document.querySelector('.sizes-hover')
        sizes.forEach(x => {
            x.addEventListener('mouseover', () => {
                sizeBlock.style.display = 'flex'
                sizeBlock.style.top = (x.offsetTop - 130) + 'px'
                sizeBlock.style.left = x.offsetLeft + 'px'

                const tableSize = document.querySelector('[data-sizes="' + x.dataset.size + '"]')

                sizeBlock.querySelector('.a-size').textContent = tableSize.children[1].textContent
                sizeBlock.querySelector('.b-size').textContent = tableSize.children[2].textContent
                sizeBlock.querySelector('.c-size').textContent = tableSize.children[3].textContent
            })
            x.addEventListener('mouseout', () => {
                sizeBlock.style.display = 'none'
            })
        })


        const modalSize = document.querySelectorAll('.table-size td:first-child')
        const modalSizeInfo = document.querySelector('.table-size-info')

        modalSize.forEach(x => {
            x.addEventListener('click', () => {
                document.querySelector('.table-size .active')
                    ? document.querySelector('.table-size .active').classList.remove('active')
                    : ''

                x.classList.toggle('active')

                const id = x.dataset.size

                const currentSize = document.querySelector('.table-size [data-sizes="' + id + '"]')

                modalSizeInfo.querySelector('.a-size').textContent = currentSize.children[1].textContent
                modalSizeInfo.querySelector('.b-size').textContent = currentSize.children[2].textContent
                modalSizeInfo.querySelector('.c-size').textContent = currentSize.children[3].textContent

            })
        })
    }

    if ( document.querySelector('.product-item--tabs') ) {
        const tabs = [...document.querySelector('.product-item--tabs').children]
        const tabsItem = document.querySelectorAll('.tabs-item')

        tabs.forEach((item,i) => {
            item.addEventListener('click', () => {
                tabs.forEach(item => item.classList.contains('active') ? item.classList.remove('active') : '')
                tabsItem.forEach(item => item.classList.contains('active') ? item.classList.remove('active') : '')
                item.classList.add('active')
                tabsItem[i].classList.add('active')
            })
        })
    }

    if (document.querySelector('.footer')) {
        const footerList = document.querySelectorAll('h5')
        footerList.forEach(item => {
            item.addEventListener('click', () => {
                item.parentNode.classList.toggle('active')
            })
        })
    }

    if (document.querySelector('.slider')) {
        $('.slider').slick({
            draggable: true,
            slidesToShow: 1,
            swipeToSlide: true,
            infinite: true,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000
        });
    }

    if (document.querySelector('.fp-categories__slider')) {
        $('.fp-categories__slider').slick({
            draggable: true,
            slidesToShow: 3,
            swipeToSlide: true,
            infinite: true,
            arrows: true,
            dots: false,
            autoplay: false,
            autoplaySpeed: 3000
        });
    }

    let inputs = document.querySelectorAll('.phone_mask');

    Array.prototype.forEach.call(inputs, function(input) {
        new InputMask({
            selector: input,
            layout: input.dataset.mask
        })
        input.addEventListener('click', function() {
            if (this.value == '+7') this.setSelectionRange(2,2);
        })
    })

});

function InputMask(options) {
    this.el = this.getElement(options.selector);
    this.layout = options.layout || '+7 (9__) ___-__-__';
    this.maskreg = this.getRegexp();
    this.setListeners();
}

InputMask.prototype.getRegexp = function() {
    var str = this.layout.replace(/_/g, '\\d')
    str = str.replace(/\(/g, '\\(')
    str = str.replace(/\)/g, '\\)')
    str = str.replace(/\+/g, '\\+')
    str = str.replace(/\s/g, '\\s')

    return str;
}

InputMask.prototype.mask = function(e) {
    var _this = e.target,
        matrix = this.layout,
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = _this.value.replace(/\D/g, "");

    if (def.length >= val.length) val = def;

    _this.value = matrix.replace(/./g, function(a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
    });

    if (e.type == "blur") {
        var regexp = new RegExp(this.maskreg);
        if (!regexp.test(_this.value)) _this.value = "";
    } else {
        this.setCursorPosition(_this.value.length, _this);
    }
}

InputMask.prototype.setCursorPosition = function(pos, elem) {
    elem.focus();
    if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
    else if (elem.createTextRange) {
        var range = elem.createTextRange();
        range.collapse(true);
        range.moveEnd("character", pos);
        range.moveStart("character", pos);
        range.select()
    }
}

InputMask.prototype.setListeners = function() {
    this.el.addEventListener("input", this.mask.bind(this), false);
    this.el.addEventListener("focus", this.mask.bind(this), false);
    this.el.addEventListener("blur", this.mask.bind(this), false);
}

InputMask.prototype.getElement = function(selector) {
    if (selector === undefined) return false;
    if (this.isElement(selector)) return selector;
    if (typeof selector == 'string') {
        var el = document.querySelector(selector);
        if (this.isElement(el)) return el;
    }
    return false
}

InputMask.prototype.isElement = function(element) {
    return element instanceof Element || element instanceof HTMLDocument;
}

