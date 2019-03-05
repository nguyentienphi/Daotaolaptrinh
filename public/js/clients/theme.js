/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/clients/theme.js":
/*!***************************************!*\
  !*** ./resources/js/clients/theme.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  "use strict";

  var nav_offset_top = $("header").height() + 50;
  /*-------------------------------------------------------------------------------
   Navbar 
  -------------------------------------------------------------------------------*/
  //* Navbar Fixed

  function navbarFixed() {
    if ($(".header_area").length) {
      $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= nav_offset_top) {
          $(".header_area").addClass("navbar_fixed");
        } else {
          $(".header_area").removeClass("navbar_fixed");
        }
      });
    }
  }

  navbarFixed(); // Search Toggle

  $("#search_input_box").hide();
  $("#search").on("click", function () {
    $("#search_input_box").slideToggle("slow");
    $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
    $("#search_input_box").slideUp("slow");
  });
  /*----------------------------------------------------*/

  /*  Course Slider
    /*----------------------------------------------------*/

  function active_course() {
    if ($(".active_course").length) {
      $(".active_course").owlCarousel({
        loop: true,
        margin: 20,
        items: 3,
        nav: true,
        autoplay: 2500,
        smartSpeed: 1500,
        dots: false,
        responsiveClass: true,
        thumbs: true,
        thumbsPrerendered: true,
        navText: ["<img src='img/prev.png'>", "<img src='img/next.png'>"],
        responsive: {
          0: {
            items: 1,
            margin: 0
          },
          991: {
            items: 2,
            margin: 30
          },
          1200: {
            items: 3,
            margin: 30
          }
        }
      });
    }
  }

  active_course();
  /*----------------------------------------------------*/

  /*  Event Slider
    /*----------------------------------------------------*/

  function active_event() {
    if ($(".active_event").length) {
      $(".active_event").owlCarousel({
        loop: true,
        margin: 30,
        items: 2,
        nav: false,
        autoplay: 2500,
        smartSpeed: 1500,
        dots: false,
        responsiveClass: true,
        thumbs: true,
        thumbsPrerendered: true
      });
    }
  }

  active_event();
  /*----------------------------------------------------*/

  /*  Testimonials Slider
    /*----------------------------------------------------*/

  function testimonials_slider() {
    if ($(".testi_slider").length) {
      $(".testi_slider").owlCarousel({
        loop: true,
        margin: 30,
        items: 2,
        autoplay: 2500,
        smartSpeed: 2500,
        dots: true,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1
          },
          991: {
            items: 2
          }
        }
      });
    }
  }

  testimonials_slider();
  /*----------------------------------------------------*/

  /*  MailChimp Slider
    /*----------------------------------------------------*/

  function mailChimp() {
    $("#mc_embed_signup").find("form").ajaxChimp();
  }

  mailChimp();
  $("select").niceSelect();
  /*----------------------------------------------------*/

  /*  Google map js
    /*----------------------------------------------------*/

  if ($("#mapBox").length) {
    var $lat = $("#mapBox").data("lat");
    var $lon = $("#mapBox").data("lon");
    var $zoom = $("#mapBox").data("zoom");
    var $marker = $("#mapBox").data("marker");
    var $info = $("#mapBox").data("info");
    var $markerLat = $("#mapBox").data("mlat");
    var $markerLon = $("#mapBox").data("mlon");
    var map = new GMaps({
      el: "#mapBox",
      lat: $lat,
      lng: $lon,
      scrollwheel: false,
      scaleControl: true,
      streetViewControl: false,
      panControl: true,
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      zoom: $zoom,
      styles: [{
        featureType: "water",
        elementType: "geometry.fill",
        stylers: [{
          color: "#dcdfe6"
        }]
      }, {
        featureType: "transit",
        stylers: [{
          color: "#808080"
        }, {
          visibility: "off"
        }]
      }, {
        featureType: "road.highway",
        elementType: "geometry.stroke",
        stylers: [{
          visibility: "on"
        }, {
          color: "#dcdfe6"
        }]
      }, {
        featureType: "road.highway",
        elementType: "geometry.fill",
        stylers: [{
          color: "#ffffff"
        }]
      }, {
        featureType: "road.local",
        elementType: "geometry.fill",
        stylers: [{
          visibility: "on"
        }, {
          color: "#ffffff"
        }, {
          weight: 1.8
        }]
      }, {
        featureType: "road.local",
        elementType: "geometry.stroke",
        stylers: [{
          color: "#d7d7d7"
        }]
      }, {
        featureType: "poi",
        elementType: "geometry.fill",
        stylers: [{
          visibility: "on"
        }, {
          color: "#ebebeb"
        }]
      }, {
        featureType: "administrative",
        elementType: "geometry",
        stylers: [{
          color: "#a7a7a7"
        }]
      }, {
        featureType: "road.arterial",
        elementType: "geometry.fill",
        stylers: [{
          color: "#ffffff"
        }]
      }, {
        featureType: "road.arterial",
        elementType: "geometry.fill",
        stylers: [{
          color: "#ffffff"
        }]
      }, {
        featureType: "landscape",
        elementType: "geometry.fill",
        stylers: [{
          visibility: "on"
        }, {
          color: "#efefef"
        }]
      }, {
        featureType: "road",
        elementType: "labels.text.fill",
        stylers: [{
          color: "#696969"
        }]
      }, {
        featureType: "administrative",
        elementType: "labels.text.fill",
        stylers: [{
          visibility: "on"
        }, {
          color: "#737373"
        }]
      }, {
        featureType: "poi",
        elementType: "labels.icon",
        stylers: [{
          visibility: "off"
        }]
      }, {
        featureType: "poi",
        elementType: "labels",
        stylers: [{
          visibility: "off"
        }]
      }, {
        featureType: "road.arterial",
        elementType: "geometry.stroke",
        stylers: [{
          color: "#d6d6d6"
        }]
      }, {
        featureType: "road",
        elementType: "labels.icon",
        stylers: [{
          visibility: "off"
        }]
      }, {}, {
        featureType: "poi",
        elementType: "geometry.fill",
        stylers: [{
          color: "#dadada"
        }]
      }]
    });
  }
})(jQuery);

/***/ }),

/***/ 3:
/*!*********************************************!*\
  !*** multi ./resources/js/clients/theme.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/nguyentienphi/Daotaolaptrinh/resources/js/clients/theme.js */"./resources/js/clients/theme.js");


/***/ })

/******/ });