// modules are defined as an array
// [ module function, map of requires ]
//
// map of requires is short require name -> numeric require
//
// anything defined in a previous bundle is accessed via the
// orig method which is the require for previous bundles
parcelRequire = (function (modules, cache, entry, globalName) {
  // Save the require from previous bundle to this closure if any
  var previousRequire = typeof parcelRequire === 'function' && parcelRequire;
  var nodeRequire = typeof require === 'function' && require;

  function newRequire(name, jumped) {
    if (!cache[name]) {
      if (!modules[name]) {
        // if we cannot find the module within our internal map or
        // cache jump to the current global require ie. the last bundle
        // that was added to the page.
        var currentRequire = typeof parcelRequire === 'function' && parcelRequire;
        if (!jumped && currentRequire) {
          return currentRequire(name, true);
        }

        // If there are other bundles on this page the require from the
        // previous one is saved to 'previousRequire'. Repeat this as
        // many times as there are bundles until the module is found or
        // we exhaust the require chain.
        if (previousRequire) {
          return previousRequire(name, true);
        }

        // Try the node require function if it exists.
        if (nodeRequire && typeof name === 'string') {
          return nodeRequire(name);
        }

        var err = new Error('Cannot find module \'' + name + '\'');
        err.code = 'MODULE_NOT_FOUND';
        throw err;
      }

      localRequire.resolve = resolve;
      localRequire.cache = {};

      var module = cache[name] = new newRequire.Module(name);

      modules[name][0].call(module.exports, localRequire, module, module.exports, this);
    }

    return cache[name].exports;

    function localRequire(x){
      return newRequire(localRequire.resolve(x));
    }

    function resolve(x){
      return modules[name][1][x] || x;
    }
  }

  function Module(moduleName) {
    this.id = moduleName;
    this.bundle = newRequire;
    this.exports = {};
  }

  newRequire.isParcelRequire = true;
  newRequire.Module = Module;
  newRequire.modules = modules;
  newRequire.cache = cache;
  newRequire.parent = previousRequire;
  newRequire.register = function (id, exports) {
    modules[id] = [function (require, module) {
      module.exports = exports;
    }, {}];
  };

  var error;
  for (var i = 0; i < entry.length; i++) {
    try {
      newRequire(entry[i]);
    } catch (e) {
      // Save first error but execute all entries
      if (!error) {
        error = e;
      }
    }
  }

  if (entry.length) {
    // Expose entry point to Node, AMD or browser globals
    // Based on https://github.com/ForbesLindesay/umd/blob/master/template.js
    var mainExports = newRequire(entry[entry.length - 1]);

    // CommonJS
    if (typeof exports === "object" && typeof module !== "undefined") {
      module.exports = mainExports;

    // RequireJS
    } else if (typeof define === "function" && define.amd) {
     define(function () {
       return mainExports;
     });

    // <script>
    } else if (globalName) {
      this[globalName] = mainExports;
    }
  }

  // Override the current require with this new one
  parcelRequire = newRequire;

  if (error) {
    // throw error from earlier, _after updating parcelRequire_
    throw error;
  }

  return newRequire;
})({"../node_modules/parcel-bundler/src/builtins/bundle-url.js":[function(require,module,exports) {
var bundleURL = null;

function getBundleURLCached() {
  if (!bundleURL) {
    bundleURL = getBundleURL();
  }

  return bundleURL;
}

function getBundleURL() {
  // Attempt to find the URL of the current script and use that as the base URL
  try {
    throw new Error();
  } catch (err) {
    var matches = ('' + err.stack).match(/(https?|file|ftp|chrome-extension|moz-extension):\/\/[^)\n]+/g);

    if (matches) {
      return getBaseURL(matches[0]);
    }
  }

  return '/';
}

function getBaseURL(url) {
  return ('' + url).replace(/^((?:https?|file|ftp|chrome-extension|moz-extension):\/\/.+)?\/[^/]+(?:\?.*)?$/, '$1') + '/';
}

exports.getBundleURL = getBundleURLCached;
exports.getBaseURL = getBaseURL;
},{}],"../node_modules/parcel-bundler/src/builtins/css-loader.js":[function(require,module,exports) {
var bundle = require('./bundle-url');

function updateLink(link) {
  var newLink = link.cloneNode();

  newLink.onload = function () {
    link.remove();
  };

  newLink.href = link.href.split('?')[0] + '?' + Date.now();
  link.parentNode.insertBefore(newLink, link.nextSibling);
}

var cssTimeout = null;

function reloadCSS() {
  if (cssTimeout) {
    return;
  }

  cssTimeout = setTimeout(function () {
    var links = document.querySelectorAll('link[rel="stylesheet"]');

    for (var i = 0; i < links.length; i++) {
      if (bundle.getBaseURL(links[i].href) === bundle.getBundleURL()) {
        updateLink(links[i]);
      }
    }

    cssTimeout = null;
  }, 50);
}

module.exports = reloadCSS;
},{"./bundle-url":"../node_modules/parcel-bundler/src/builtins/bundle-url.js"}],"../scss/style.scss":[function(require,module,exports) {
var reloadCSS = require('_css_loader');

module.hot.dispose(reloadCSS);
module.hot.accept(reloadCSS);
},{"./abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.eot":[["BodoniModa18pt-BlackItalic.8ec05c9b.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.woff2":[["BodoniModa18pt-BlackItalic.3d108e51.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.woff":[["BodoniModa18pt-BlackItalic.70131f34.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.ttf":[["BodoniModa18pt-BlackItalic.d65a7cb3.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.svg":[["BodoniModa18pt-BlackItalic.1cabfc14.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BlackItalic.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.eot":[["BodoniModa18pt-BoldItalic.d179706e.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.woff2":[["BodoniModa18pt-BoldItalic.83919432.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.woff":[["BodoniModa18pt-BoldItalic.87e304c1.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.ttf":[["BodoniModa18pt-BoldItalic.13081419.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.svg":[["BodoniModa18pt-BoldItalic.24fd50c3.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-BoldItalic.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.eot":[["BodoniModa18pt-MediumItalic.8fd9869f.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.woff2":[["BodoniModa18pt-MediumItalic.ab1eb0ed.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.woff":[["BodoniModa18pt-MediumItalic.0a1820ac.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.ttf":[["BodoniModa18pt-MediumItalic.78fc4301.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.svg":[["BodoniModa18pt-MediumItalic.f6c018c9.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-MediumItalic.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.eot":[["BodoniModa18pt-SemiBold.460d497e.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.woff2":[["BodoniModa18pt-SemiBold.caedd769.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.woff":[["BodoniModa18pt-SemiBold.4e2092b8.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.ttf":[["BodoniModa18pt-SemiBold.bfabff9b.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.svg":[["BodoniModa18pt-SemiBold.40551b9f.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBold.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Regular.eot":[["BodoniModa18pt-Regular.9255fd65.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Regular.woff2":[["BodoniModa18pt-Regular.3c3f9ea5.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Regular.woff":[["BodoniModa18pt-Regular.538cbdeb.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Regular.ttf":[["BodoniModa18pt-Regular.73d17151.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Regular.svg":[["BodoniModa18pt-Regular.4d741e01.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Regular.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Medium.eot":[["BodoniModa18pt-Medium.32b35354.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Medium.woff2":[["BodoniModa18pt-Medium.ca3bafb1.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Medium.woff":[["BodoniModa18pt-Medium.dedfcef1.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Medium.ttf":[["BodoniModa18pt-Medium.b9204127.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Medium.svg":[["BodoniModa18pt-Medium.f77910a6.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Medium.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Black.eot":[["BodoniModa18pt-Black.25fb76cb.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Black.woff2":[["BodoniModa18pt-Black.06c72914.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Black.woff":[["BodoniModa18pt-Black.a2a31dbb.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Black.ttf":[["BodoniModa18pt-Black.f2308d56.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Black.svg":[["BodoniModa18pt-Black.43a05c3b.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Black.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.eot":[["BodoniModa18pt-SemiBoldItalic.9cacdea3.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.woff2":[["BodoniModa18pt-SemiBoldItalic.adfcc796.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.woff":[["BodoniModa18pt-SemiBoldItalic.20dad3d1.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.ttf":[["BodoniModa18pt-SemiBoldItalic.504476d2.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.svg":[["BodoniModa18pt-SemiBoldItalic.693f8a49.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-SemiBoldItalic.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Italic.eot":[["BodoniModa18pt-Italic.d0d1f297.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Italic.woff2":[["BodoniModa18pt-Italic.8a67ea8e.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Italic.woff":[["BodoniModa18pt-Italic.e3581eac.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Italic.ttf":[["BodoniModa18pt-Italic.fca0a69c.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Italic.svg":[["BodoniModa18pt-Italic.fe3a8b1f.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Italic.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.eot":[["BodoniModa18pt-ExtraBold.00efdff1.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.woff2":[["BodoniModa18pt-ExtraBold.9a450594.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.woff":[["BodoniModa18pt-ExtraBold.5ba8a01c.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.ttf":[["BodoniModa18pt-ExtraBold.b8be3ae0.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.svg":[["BodoniModa18pt-ExtraBold.ccb7795c.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBold.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.eot":[["BodoniModa18pt-ExtraBoldItalic.111d31fb.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.woff2":[["BodoniModa18pt-ExtraBoldItalic.a4306797.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.woff":[["BodoniModa18pt-ExtraBoldItalic.910387f7.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.ttf":[["BodoniModa18pt-ExtraBoldItalic.e5bf0060.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.svg":[["BodoniModa18pt-ExtraBoldItalic.71310b6b.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-ExtraBoldItalic.svg"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Bold.eot":[["BodoniModa18pt-Bold.1d9ea788.eot","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.eot"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.eot"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Bold.woff2":[["BodoniModa18pt-Bold.3db756f2.woff2","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.woff2"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.woff2"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Bold.woff":[["BodoniModa18pt-Bold.44e393f6.woff","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.woff"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.woff"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Bold.ttf":[["BodoniModa18pt-Bold.3a681588.ttf","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.ttf"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.ttf"],"./abstracts/fonts/Bodoni/BodoniModa18pt-Bold.svg":[["BodoniModa18pt-Bold.83f465c4.svg","../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.svg"],"../scss/abstracts/fonts/Bodoni/BodoniModa18pt-Bold.svg"],"_css_loader":"../node_modules/parcel-bundler/src/builtins/css-loader.js"}],"../node_modules/parcel-bundler/src/builtins/hmr-runtime.js":[function(require,module,exports) {
var global = arguments[3];
var OVERLAY_ID = '__parcel__error__overlay__';
var OldModule = module.bundle.Module;

function Module(moduleName) {
  OldModule.call(this, moduleName);
  this.hot = {
    data: module.bundle.hotData,
    _acceptCallbacks: [],
    _disposeCallbacks: [],
    accept: function (fn) {
      this._acceptCallbacks.push(fn || function () {});
    },
    dispose: function (fn) {
      this._disposeCallbacks.push(fn);
    }
  };
  module.bundle.hotData = null;
}

module.bundle.Module = Module;
var checkedAssets, assetsToAccept;
var parent = module.bundle.parent;

if ((!parent || !parent.isParcelRequire) && typeof WebSocket !== 'undefined') {
  var hostname = "" || location.hostname;
  var protocol = location.protocol === 'https:' ? 'wss' : 'ws';
  var ws = new WebSocket(protocol + '://' + hostname + ':' + "60567" + '/');

  ws.onmessage = function (event) {
    checkedAssets = {};
    assetsToAccept = [];
    var data = JSON.parse(event.data);

    if (data.type === 'update') {
      var handled = false;
      data.assets.forEach(function (asset) {
        if (!asset.isNew) {
          var didAccept = hmrAcceptCheck(global.parcelRequire, asset.id);

          if (didAccept) {
            handled = true;
          }
        }
      }); // Enable HMR for CSS by default.

      handled = handled || data.assets.every(function (asset) {
        return asset.type === 'css' && asset.generated.js;
      });

      if (handled) {
        console.clear();
        data.assets.forEach(function (asset) {
          hmrApply(global.parcelRequire, asset);
        });
        assetsToAccept.forEach(function (v) {
          hmrAcceptRun(v[0], v[1]);
        });
      } else if (location.reload) {
        // `location` global exists in a web worker context but lacks `.reload()` function.
        location.reload();
      }
    }

    if (data.type === 'reload') {
      ws.close();

      ws.onclose = function () {
        location.reload();
      };
    }

    if (data.type === 'error-resolved') {
      console.log('[parcel] ✨ Error resolved');
      removeErrorOverlay();
    }

    if (data.type === 'error') {
      console.error('[parcel] 🚨  ' + data.error.message + '\n' + data.error.stack);
      removeErrorOverlay();
      var overlay = createErrorOverlay(data);
      document.body.appendChild(overlay);
    }
  };
}

function removeErrorOverlay() {
  var overlay = document.getElementById(OVERLAY_ID);

  if (overlay) {
    overlay.remove();
  }
}

function createErrorOverlay(data) {
  var overlay = document.createElement('div');
  overlay.id = OVERLAY_ID; // html encode message and stack trace

  var message = document.createElement('div');
  var stackTrace = document.createElement('pre');
  message.innerText = data.error.message;
  stackTrace.innerText = data.error.stack;
  overlay.innerHTML = '<div style="background: black; font-size: 16px; color: white; position: fixed; height: 100%; width: 100%; top: 0px; left: 0px; padding: 30px; opacity: 0.85; font-family: Menlo, Consolas, monospace; z-index: 9999;">' + '<span style="background: red; padding: 2px 4px; border-radius: 2px;">ERROR</span>' + '<span style="top: 2px; margin-left: 5px; position: relative;">🚨</span>' + '<div style="font-size: 18px; font-weight: bold; margin-top: 20px;">' + message.innerHTML + '</div>' + '<pre>' + stackTrace.innerHTML + '</pre>' + '</div>';
  return overlay;
}

function getParents(bundle, id) {
  var modules = bundle.modules;

  if (!modules) {
    return [];
  }

  var parents = [];
  var k, d, dep;

  for (k in modules) {
    for (d in modules[k][1]) {
      dep = modules[k][1][d];

      if (dep === id || Array.isArray(dep) && dep[dep.length - 1] === id) {
        parents.push(k);
      }
    }
  }

  if (bundle.parent) {
    parents = parents.concat(getParents(bundle.parent, id));
  }

  return parents;
}

function hmrApply(bundle, asset) {
  var modules = bundle.modules;

  if (!modules) {
    return;
  }

  if (modules[asset.id] || !bundle.parent) {
    var fn = new Function('require', 'module', 'exports', asset.generated.js);
    asset.isNew = !modules[asset.id];
    modules[asset.id] = [fn, asset.deps];
  } else if (bundle.parent) {
    hmrApply(bundle.parent, asset);
  }
}

function hmrAcceptCheck(bundle, id) {
  var modules = bundle.modules;

  if (!modules) {
    return;
  }

  if (!modules[id] && bundle.parent) {
    return hmrAcceptCheck(bundle.parent, id);
  }

  if (checkedAssets[id]) {
    return;
  }

  checkedAssets[id] = true;
  var cached = bundle.cache[id];
  assetsToAccept.push([bundle, id]);

  if (cached && cached.hot && cached.hot._acceptCallbacks.length) {
    return true;
  }

  return getParents(global.parcelRequire, id).some(function (id) {
    return hmrAcceptCheck(global.parcelRequire, id);
  });
}

function hmrAcceptRun(bundle, id) {
  var cached = bundle.cache[id];
  bundle.hotData = {};

  if (cached) {
    cached.hot.data = bundle.hotData;
  }

  if (cached && cached.hot && cached.hot._disposeCallbacks.length) {
    cached.hot._disposeCallbacks.forEach(function (cb) {
      cb(bundle.hotData);
    });
  }

  delete bundle.cache[id];
  bundle(id);
  cached = bundle.cache[id];

  if (cached && cached.hot && cached.hot._acceptCallbacks.length) {
    cached.hot._acceptCallbacks.forEach(function (cb) {
      cb();
    });

    return true;
  }
}
},{}]},{},["../node_modules/parcel-bundler/src/builtins/hmr-runtime.js"], null)
//# sourceMappingURL=/style.1dc133ea.js.map