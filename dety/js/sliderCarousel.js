'use strict'

function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return !!right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var SliderCarousel =
/*#__PURE__*/
function () {
  function SliderCarousel(_ref) {
    var _this = this;

    var main = _ref.main,
        wrap = _ref.wrap,
        next = _ref.next,
        prev = _ref.prev,
        _ref$infinity = _ref.infinity,
        infinity = _ref$infinity === void 0 ? false : _ref$infinity,
        _ref$position = _ref.position,
        position = _ref$position === void 0 ? 0 : _ref$position,
        _ref$slideToShow = _ref.slideToShow,
        slideToShow = _ref$slideToShow === void 0 ? 3 : _ref$slideToShow,
        _ref$responsive = _ref.responsive,
        responsive = _ref$responsive === void 0 ? [] : _ref$responsive;

    _classCallCheck(this, SliderCarousel);

    _defineProperty(this, "prevSlider", function () {
      if (_this.options.infinity || _this.options.position > 0) {
        --_this.options.position;

        if (_this.options.position < 0) {
          _this.options.position = _this.options.maxPosition;
        }

        _this.wrap.style.transform = "translateX(-".concat(_this.options.position * _this.options.slideCount, "%)"); // !this.options.infinity && this.options.position == this.options.maxPosition ? this.next.style.display = 'none' : this.next.style.display = ''
        // !this.options.infinity && this.options.position == 0 ? this.prev.style.display = 'none' : this.prev.style.display = ''
      }
    });

    _defineProperty(this, "nextSlider", function () {
      if (_this.options.infinity || _this.options.position < _this.options.maxPosition) {
        ++_this.options.position;

        if (_this.options.position > _this.options.maxPosition) {
          _this.options.position = 0;
        }

        _this.wrap.style.transform = "translateX(-".concat(_this.options.position * _this.options.slideCount, "%)"); // !this.options.infinity && this.options.position == this.options.maxPosition ? this.next.style.display = 'none' : this.next.style.display = ''
        // !this.options.infinity && this.options.position == 0 ? this.prev.style.display = 'none' : this.prev.style.display = ''
      }
    });

    _defineProperty(this, "dragStart", function (e) {
      e = e || window.event;

      if (e.type == 'touchstart') {
        _this.postX1 = e.touches[0].clientX;
      } else {
        _this.postX1 = e.clientX;
      }
    });

    _defineProperty(this, "dragAction", function (e) {
      e = e || window.event;

      if (e.type == 'touchmove') {
        _this.postX2 = _this.postX1 - e.touches[0].clientX;
        _this.postX1 = e.touches[0].clientX;
      } else {
        _this.postX2 = _this.postX1 - e.clientX;
        _this.postX1 = e.clientX;
      }
    });

    _defineProperty(this, "dragEnd", function () {
      _this.postX2 < 0 ? _this.prevSlider() : _this.nextSlider();
    });

    this.main = document.querySelector(main);
    this.wrap = document.querySelector(wrap);
    this.slides = document.querySelector(wrap).children;
    this.postX1 = 0, this.postX2 = 0, this.next = document.querySelector(next);
    this.prev = document.querySelector(prev);
    this.slideToShow = slideToShow;
    this.options = {
      position: position,
      maxPosition: this.slides.length - this.slideToShow,
      infinity: infinity,
      slideCount: 100 / this.slideToShow
    }, this.responsive = responsive;
  }

  _createClass(SliderCarousel, [{
    key: "init",
    value: function init() {
      this.addSliderClass();
      this.addStyle(this.options.slideCount); // !this.options.infinity && this.options.position == 0 ? this.prev.style.display = 'none' : this.prev.style.display = ''

      if (this.prev && this.next) {
        this.controlSlider();
      } else {
        this.addArrow();
        this.controlSlider();
      }

      this.responsive ? this.responseInit() : '';
    }
  }, {
    key: "addSliderClass",
    value: function addSliderClass() {
      this.main.classList.add('main-slider');
      this.wrap.classList.add('main-slider-wrap');
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = this.slides[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var item = _step.value;
          item.classList.add('main-slider-wrap--item');
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }
    }
  }, {
    key: "addStyle",
    value: function addStyle(count) {
      var style = document.getElementById('main-slider') || document.createElement('style');
      style.id = 'main-slider';
      style.innerHTML = "\n            .main-slider {\n                overflow: hidden;\n            }\n            .main-slider-wrap {\n                display:-webkit-box;\n                display:-webkit-flex;\n                display:-ms-flexbox;\n                display: flex;\n                transition: transform .5s ease;\n                will-change: transform;\n            }\n            .main-slider-wrap--item {\n                margin: auto 0;\n                -webkit-box-flex:0;\n                -webkit-flex:0 0 ".concat(count, "%;\n                -ms-flex:0 0 ").concat(count, "%;\n                flex:0 0 ").concat(count, "%\n            }\n        ");
      var body = document.body || document.querySelector('body');
      body.appendChild(style);
    }
  }, {
    key: "controlSlider",
    value: function controlSlider() {
      this.prev.addEventListener('click', this.prevSlider);
      this.next.addEventListener('click', this.nextSlider);
      var _iteratorNormalCompletion2 = true;
      var _didIteratorError2 = false;
      var _iteratorError2 = undefined;

      try {
        for (var _iterator2 = this.slides[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
          var item = _step2.value;
          item.addEventListener('touchstart', this.dragStart);
          item.addEventListener('touchmove', this.dragAction);
          item.addEventListener('touchend', this.dragEnd);
        }
      } catch (err) {
        _didIteratorError2 = true;
        _iteratorError2 = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion2 && _iterator2.return != null) {
            _iterator2.return();
          }
        } finally {
          if (_didIteratorError2) {
            throw _iteratorError2;
          }
        }
      }
    }
  }, {
    key: "addArrow",
    value: function addArrow() {
      this.prev = document.createElement('button');
      this.next = document.createElement('button');
      this.prev.className = 'prev';
      this.next.className = 'next';
      this.main.appendChild(this.prev);
      this.main.appendChild(this.next);
      var style = document.createElement('style');
      style.id = 'main-slider--button';
      style.textContent = "\n            .main-slider .prev,\n            .main-slider .next {\n                margin: 0 10px;\n                border: 20px solid transparent;\n                background: transparent;\n                outline: none;\n                cursor: pointer;\n            }\n            .main-slider .prev {\n                border-right-color: #19b5fe\n            }\n            .main-slider .next {\n                border-left-color: #19b5fe\n            }\n        ";
      document.head.appendChild(style);
    }
  }, {
    key: "responseInit",
    value: function responseInit() {
      var _this2 = this;

      var slidesToShowDefault = this.slideToShow;
      var allBreakpoint = this.responsive.map(function (item) {
        return item.breakpoint;
      });
      var maxResponse = Math.max.apply(Math, _toConsumableArray(allBreakpoint));

      var checkResponse = function checkResponse() {
        var widthWindow = window.innerWidth || document.documentElement.clientWidth;

        if (widthWindow < maxResponse) {
          for (var i = 0; i < allBreakpoint.length; i++) {
            if (widthWindow < allBreakpoint[i]) {
              _this2.slideToShow = _this2.responsive[i].slideToShow;
              _this2.options.slideCount = 100 / _this2.slideToShow;
            }
          }
        } else {
          _this2.slideToShow = slidesToShowDefault;
          _this2.options.slideCount = 100 / _this2.slideToShow;
        }

        _this2.addStyle(_this2.options.slideCount);
      };

      document.addEventListener("DOMContentLoaded", function () {
        checkResponse();
      });
      window.addEventListener('resize', function () {
        checkResponse();
      });
    }
  }]);

  return SliderCarousel;
}();