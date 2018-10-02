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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/*!***********************!*\
  !*** ./src/blocks.js ***!
  \***********************/
/*! no exports provided */
/*! all exports used */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("Object.defineProperty(__webpack_exports__, \"__esModule\", { value: true });\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__block_block_js__ = __webpack_require__(/*! ./block/block.js */ 1);\n/**\n * Gutenberg Blocks\n *\n * All blocks related JavaScript files should be imported here.\n * You can create a new block folder in this dir and include code\n * for that block here as well.\n *\n * All blocks should be included here since this is the file that\n * Webpack is compiling as the input file.\n */\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MuanM/N2I1YiJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEd1dGVuYmVyZyBCbG9ja3NcbiAqXG4gKiBBbGwgYmxvY2tzIHJlbGF0ZWQgSmF2YVNjcmlwdCBmaWxlcyBzaG91bGQgYmUgaW1wb3J0ZWQgaGVyZS5cbiAqIFlvdSBjYW4gY3JlYXRlIGEgbmV3IGJsb2NrIGZvbGRlciBpbiB0aGlzIGRpciBhbmQgaW5jbHVkZSBjb2RlXG4gKiBmb3IgdGhhdCBibG9jayBoZXJlIGFzIHdlbGwuXG4gKlxuICogQWxsIGJsb2NrcyBzaG91bGQgYmUgaW5jbHVkZWQgaGVyZSBzaW5jZSB0aGlzIGlzIHRoZSBmaWxlIHRoYXRcbiAqIFdlYnBhY2sgaXMgY29tcGlsaW5nIGFzIHRoZSBpbnB1dCBmaWxlLlxuICovXG5cbmltcG9ydCAnLi9ibG9jay9ibG9jay5qcyc7XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2tzLmpzXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///0\n");

/***/ }),
/* 1 */
/*!****************************!*\
  !*** ./src/block/block.js ***!
  \****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__style_scss__ = __webpack_require__(/*! ./style.scss */ 2);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__style_scss___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__style_scss__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__editor_scss__ = __webpack_require__(/*! ./editor.scss */ 3);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__editor_scss___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__editor_scss__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__edit__ = __webpack_require__(/*! ./edit */ 4);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__save__ = __webpack_require__(/*! ./save */ 5);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__attributes__ = __webpack_require__(/*! ./attributes */ 6);\n/**\n * BLOCK: employee-name\n */\n\n\n\n\n\n\n\n\nvar __ = wp.i18n.__; // Import __() from wp.i18n\n\nvar registerBlockType = wp.blocks.registerBlockType; // Import registerBlockType() from wp.blocks\n\n/**\n * Register a Gutenberg Block.\n *\n * @link \t\thttps://wordpress.org/gutenberg/handbook/block-api/\n * @param \t\t{string} \t\tname \t\t\tBlock name.\n * @param \t\t{Object} \t\tsettings \t\tBlock settings.\n * @return \t\t{?WPBlock} \t\t\t\t\t\tThe block, if it has been successfully\n * \t\t\t\t\t\t\t\t\t\t\t\t\tregistered; otherwise `undefined`.\n */\n\nregisterBlockType('employees/employee-name-block', {\n\ttitle: __('Employee Name'),\n\ticon: 'admin-users',\n\tcategory: 'employees',\n\tkeywords: [__('Employee Name'), __('Employees')],\n\tattributes: __WEBPACK_IMPORTED_MODULE_4__attributes__[\"a\" /* default */],\n\tedit: function edit(props) {\n\t\treturn wp.element.createElement(__WEBPACK_IMPORTED_MODULE_2__edit__[\"a\" /* default */], props);\n\t},\n\tsave: function save(props) {\n\t\treturn wp.element.createElement(__WEBPACK_IMPORTED_MODULE_3__save__[\"a\" /* default */], props);\n\t}\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9ibG9jay5qcz85MjFkIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogQkxPQ0s6IGVtcGxveWVlLW5hbWVcbiAqL1xuXG5pbXBvcnQgJy4vc3R5bGUuc2Nzcyc7XG5pbXBvcnQgJy4vZWRpdG9yLnNjc3MnO1xuXG5pbXBvcnQgRWRpdCBmcm9tICcuL2VkaXQnO1xuaW1wb3J0IFNhdmUgZnJvbSAnLi9zYXZlJztcbmltcG9ydCBhdHRyaWJ1dGVzIGZyb20gJy4vYXR0cmlidXRlcyc7XG5cbnZhciBfXyA9IHdwLmkxOG4uX187IC8vIEltcG9ydCBfXygpIGZyb20gd3AuaTE4blxuXG52YXIgcmVnaXN0ZXJCbG9ja1R5cGUgPSB3cC5ibG9ja3MucmVnaXN0ZXJCbG9ja1R5cGU7IC8vIEltcG9ydCByZWdpc3RlckJsb2NrVHlwZSgpIGZyb20gd3AuYmxvY2tzXG5cbi8qKlxuICogUmVnaXN0ZXIgYSBHdXRlbmJlcmcgQmxvY2suXG4gKlxuICogQGxpbmsgXHRcdGh0dHBzOi8vd29yZHByZXNzLm9yZy9ndXRlbmJlcmcvaGFuZGJvb2svYmxvY2stYXBpL1xuICogQHBhcmFtIFx0XHR7c3RyaW5nfSBcdFx0bmFtZSBcdFx0XHRCbG9jayBuYW1lLlxuICogQHBhcmFtIFx0XHR7T2JqZWN0fSBcdFx0c2V0dGluZ3MgXHRcdEJsb2NrIHNldHRpbmdzLlxuICogQHJldHVybiBcdFx0ez9XUEJsb2NrfSBcdFx0XHRcdFx0XHRUaGUgYmxvY2ssIGlmIGl0IGhhcyBiZWVuIHN1Y2Nlc3NmdWxseVxuICogXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRyZWdpc3RlcmVkOyBvdGhlcndpc2UgYHVuZGVmaW5lZGAuXG4gKi9cblxucmVnaXN0ZXJCbG9ja1R5cGUoJ2VtcGxveWVlcy9lbXBsb3llZS1uYW1lLWJsb2NrJywge1xuXHR0aXRsZTogX18oJ0VtcGxveWVlIE5hbWUnKSxcblx0aWNvbjogJ2FkbWluLXVzZXJzJyxcblx0Y2F0ZWdvcnk6ICdlbXBsb3llZXMnLFxuXHRrZXl3b3JkczogW19fKCdFbXBsb3llZSBOYW1lJyksIF9fKCdFbXBsb3llZXMnKV0sXG5cdGF0dHJpYnV0ZXM6IGF0dHJpYnV0ZXMsXG5cdGVkaXQ6IGZ1bmN0aW9uIGVkaXQocHJvcHMpIHtcblx0XHRyZXR1cm4gd3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KEVkaXQsIHByb3BzKTtcblx0fSxcblx0c2F2ZTogZnVuY3Rpb24gc2F2ZShwcm9wcykge1xuXHRcdHJldHVybiB3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoU2F2ZSwgcHJvcHMpO1xuXHR9XG59KTtcblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9ibG9jay9ibG9jay5qc1xuLy8gbW9kdWxlIGlkID0gMVxuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///1\n");

/***/ }),
/* 2 */
/*!******************************!*\
  !*** ./src/block/style.scss ***!
  \******************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9zdHlsZS5zY3NzPzgwZjMiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW5cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9ibG9jay9zdHlsZS5zY3NzXG4vLyBtb2R1bGUgaWQgPSAyXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUEiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///2\n");

/***/ }),
/* 3 */
/*!*******************************!*\
  !*** ./src/block/editor.scss ***!
  \*******************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9lZGl0b3Iuc2Nzcz80OWQyIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2svZWRpdG9yLnNjc3Ncbi8vIG1vZHVsZSBpZCA9IDNcbi8vIG1vZHVsZSBjaHVua3MgPSAwIl0sIm1hcHBpbmdzIjoiQUFBQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///3\n");

/***/ }),
/* 4 */
/*!***************************!*\
  !*** ./src/block/edit.js ***!
  \***************************/
/*! exports provided: default */
/*! exports used: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("var __ = wp.i18n.__;\nvar TextControl = wp.components.TextControl;\n\n\nvar Edit = function Edit(props) {\n\tvar setAttributes = props.setAttributes;\n\tvar _props$attributes = props.attributes,\n\t    prefix = _props$attributes.prefix,\n\t    nameFirst = _props$attributes.nameFirst,\n\t    nameLast = _props$attributes.nameLast,\n\t    suffix = _props$attributes.suffix;\n\n\treturn wp.element.createElement(\n\t\t\"div\",\n\t\t{ className: \"employee-name-edit-wrap\" },\n\t\twp.element.createElement(TextControl, {\n\t\t\tclassName: \"field-prefix\",\n\t\t\tlabel: __('Prefix'),\n\t\t\tonChange: function onChange(newPrefix) {\n\t\t\t\treturn setAttributes({ prefix: newPrefix });\n\t\t\t},\n\t\t\tvalue: prefix\n\t\t}),\n\t\twp.element.createElement(TextControl, {\n\t\t\tclassName: \"field-name-first\",\n\t\t\tlabel: __('First Name'),\n\t\t\tonChange: function onChange(newNameFirst) {\n\t\t\t\treturn setAttributes({ nameFirst: newNameFirst });\n\t\t\t},\n\t\t\tvalue: nameFirst\n\t\t}),\n\t\twp.element.createElement(TextControl, {\n\t\t\tclassName: \"field-name-last\",\n\t\t\tlabel: __('Last Name'),\n\t\t\tonChange: function onChange(newNameLast) {\n\t\t\t\treturn setAttributes({ nameLast: newNameLast });\n\t\t\t},\n\t\t\tvalue: nameLast\n\t\t}),\n\t\twp.element.createElement(TextControl, {\n\t\t\tclassName: \"field-suffix\",\n\t\t\tlabel: __('Suffix'),\n\t\t\tonChange: function onChange(newSuffix) {\n\t\t\t\treturn setAttributes({ suffix: newSuffix });\n\t\t\t},\n\t\t\tvalue: suffix\n\t\t})\n\t);\n};\n\n/* harmony default export */ __webpack_exports__[\"a\"] = (Edit);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9lZGl0LmpzPzNmZTEiXSwic291cmNlc0NvbnRlbnQiOlsidmFyIF9fID0gd3AuaTE4bi5fXztcbnZhciBUZXh0Q29udHJvbCA9IHdwLmNvbXBvbmVudHMuVGV4dENvbnRyb2w7XG5cblxudmFyIEVkaXQgPSBmdW5jdGlvbiBFZGl0KHByb3BzKSB7XG5cdHZhciBzZXRBdHRyaWJ1dGVzID0gcHJvcHMuc2V0QXR0cmlidXRlcztcblx0dmFyIF9wcm9wcyRhdHRyaWJ1dGVzID0gcHJvcHMuYXR0cmlidXRlcyxcblx0ICAgIHByZWZpeCA9IF9wcm9wcyRhdHRyaWJ1dGVzLnByZWZpeCxcblx0ICAgIG5hbWVGaXJzdCA9IF9wcm9wcyRhdHRyaWJ1dGVzLm5hbWVGaXJzdCxcblx0ICAgIG5hbWVMYXN0ID0gX3Byb3BzJGF0dHJpYnV0ZXMubmFtZUxhc3QsXG5cdCAgICBzdWZmaXggPSBfcHJvcHMkYXR0cmlidXRlcy5zdWZmaXg7XG5cblx0cmV0dXJuIHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcImRpdlwiLFxuXHRcdHsgY2xhc3NOYW1lOiBcImVtcGxveWVlLW5hbWUtZWRpdC13cmFwXCIgfSxcblx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoVGV4dENvbnRyb2wsIHtcblx0XHRcdGNsYXNzTmFtZTogXCJmaWVsZC1wcmVmaXhcIixcblx0XHRcdGxhYmVsOiBfXygnUHJlZml4JyksXG5cdFx0XHRvbkNoYW5nZTogZnVuY3Rpb24gb25DaGFuZ2UobmV3UHJlZml4KSB7XG5cdFx0XHRcdHJldHVybiBzZXRBdHRyaWJ1dGVzKHsgcHJlZml4OiBuZXdQcmVmaXggfSk7XG5cdFx0XHR9LFxuXHRcdFx0dmFsdWU6IHByZWZpeFxuXHRcdH0pLFxuXHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChUZXh0Q29udHJvbCwge1xuXHRcdFx0Y2xhc3NOYW1lOiBcImZpZWxkLW5hbWUtZmlyc3RcIixcblx0XHRcdGxhYmVsOiBfXygnRmlyc3QgTmFtZScpLFxuXHRcdFx0b25DaGFuZ2U6IGZ1bmN0aW9uIG9uQ2hhbmdlKG5ld05hbWVGaXJzdCkge1xuXHRcdFx0XHRyZXR1cm4gc2V0QXR0cmlidXRlcyh7IG5hbWVGaXJzdDogbmV3TmFtZUZpcnN0IH0pO1xuXHRcdFx0fSxcblx0XHRcdHZhbHVlOiBuYW1lRmlyc3Rcblx0XHR9KSxcblx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoVGV4dENvbnRyb2wsIHtcblx0XHRcdGNsYXNzTmFtZTogXCJmaWVsZC1uYW1lLWxhc3RcIixcblx0XHRcdGxhYmVsOiBfXygnTGFzdCBOYW1lJyksXG5cdFx0XHRvbkNoYW5nZTogZnVuY3Rpb24gb25DaGFuZ2UobmV3TmFtZUxhc3QpIHtcblx0XHRcdFx0cmV0dXJuIHNldEF0dHJpYnV0ZXMoeyBuYW1lTGFzdDogbmV3TmFtZUxhc3QgfSk7XG5cdFx0XHR9LFxuXHRcdFx0dmFsdWU6IG5hbWVMYXN0XG5cdFx0fSksXG5cdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFRleHRDb250cm9sLCB7XG5cdFx0XHRjbGFzc05hbWU6IFwiZmllbGQtc3VmZml4XCIsXG5cdFx0XHRsYWJlbDogX18oJ1N1ZmZpeCcpLFxuXHRcdFx0b25DaGFuZ2U6IGZ1bmN0aW9uIG9uQ2hhbmdlKG5ld1N1ZmZpeCkge1xuXHRcdFx0XHRyZXR1cm4gc2V0QXR0cmlidXRlcyh7IHN1ZmZpeDogbmV3U3VmZml4IH0pO1xuXHRcdFx0fSxcblx0XHRcdHZhbHVlOiBzdWZmaXhcblx0XHR9KVxuXHQpO1xufTtcblxuZXhwb3J0IGRlZmF1bHQgRWRpdDtcblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9ibG9jay9lZGl0LmpzXG4vLyBtb2R1bGUgaWQgPSA0XG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///4\n");

/***/ }),
/* 5 */
/*!***************************!*\
  !*** ./src/block/save.js ***!
  \***************************/
/*! exports provided: default */
/*! exports used: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("var Save = function Save(props) {\n\tvar _props$attributes = props.attributes,\n\t    prefix = _props$attributes.prefix,\n\t    nameFirst = _props$attributes.nameFirst,\n\t    nameLast = _props$attributes.nameLast,\n\t    suffix = _props$attributes.suffix;\n\n\treturn wp.element.createElement(\n\t\t\"div\",\n\t\t{ className: props.className },\n\t\twp.element.createElement(\n\t\t\t\"span\",\n\t\t\t{ className: \"employee-prefix\" },\n\t\t\tprefix\n\t\t),\n\t\t\"\\xA0\",\n\t\twp.element.createElement(\n\t\t\t\"span\",\n\t\t\t{ className: \"employee-name-first\" },\n\t\t\tnameFirst\n\t\t),\n\t\t\"\\xA0\",\n\t\twp.element.createElement(\n\t\t\t\"span\",\n\t\t\t{ className: \"employee-name-last\" },\n\t\t\tnameLast\n\t\t),\n\t\t\"\\xA0\",\n\t\twp.element.createElement(\n\t\t\t\"span\",\n\t\t\t{ className: \"employee-suffix\" },\n\t\t\tsuffix\n\t\t),\n\t\t\"\\xA0\"\n\t);\n};\n\n/* harmony default export */ __webpack_exports__[\"a\"] = (Save);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9zYXZlLmpzP2M0ZDQiXSwic291cmNlc0NvbnRlbnQiOlsidmFyIFNhdmUgPSBmdW5jdGlvbiBTYXZlKHByb3BzKSB7XG5cdHZhciBfcHJvcHMkYXR0cmlidXRlcyA9IHByb3BzLmF0dHJpYnV0ZXMsXG5cdCAgICBwcmVmaXggPSBfcHJvcHMkYXR0cmlidXRlcy5wcmVmaXgsXG5cdCAgICBuYW1lRmlyc3QgPSBfcHJvcHMkYXR0cmlidXRlcy5uYW1lRmlyc3QsXG5cdCAgICBuYW1lTGFzdCA9IF9wcm9wcyRhdHRyaWJ1dGVzLm5hbWVMYXN0LFxuXHQgICAgc3VmZml4ID0gX3Byb3BzJGF0dHJpYnV0ZXMuc3VmZml4O1xuXG5cdHJldHVybiB3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoXG5cdFx0XCJkaXZcIixcblx0XHR7IGNsYXNzTmFtZTogcHJvcHMuY2xhc3NOYW1lIH0sXG5cdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XCJzcGFuXCIsXG5cdFx0XHR7IGNsYXNzTmFtZTogXCJlbXBsb3llZS1wcmVmaXhcIiB9LFxuXHRcdFx0cHJlZml4XG5cdFx0KSxcblx0XHRcIlxceEEwXCIsXG5cdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XCJzcGFuXCIsXG5cdFx0XHR7IGNsYXNzTmFtZTogXCJlbXBsb3llZS1uYW1lLWZpcnN0XCIgfSxcblx0XHRcdG5hbWVGaXJzdFxuXHRcdCksXG5cdFx0XCJcXHhBMFwiLFxuXHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdFwic3BhblwiLFxuXHRcdFx0eyBjbGFzc05hbWU6IFwiZW1wbG95ZWUtbmFtZS1sYXN0XCIgfSxcblx0XHRcdG5hbWVMYXN0XG5cdFx0KSxcblx0XHRcIlxceEEwXCIsXG5cdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XCJzcGFuXCIsXG5cdFx0XHR7IGNsYXNzTmFtZTogXCJlbXBsb3llZS1zdWZmaXhcIiB9LFxuXHRcdFx0c3VmZml4XG5cdFx0KSxcblx0XHRcIlxceEEwXCJcblx0KTtcbn07XG5cbmV4cG9ydCBkZWZhdWx0IFNhdmU7XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2svc2F2ZS5qc1xuLy8gbW9kdWxlIGlkID0gNVxuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///5\n");

/***/ }),
/* 6 */
/*!*********************************!*\
  !*** ./src/block/attributes.js ***!
  \*********************************/
/*! exports provided: default */
/*! exports used: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("/* harmony default export */ __webpack_exports__[\"a\"] = ({\n\tprefix: {\n\t\ttype: 'string',\n\t\tsource: 'meta',\n\t\tmeta: 'prefix'\n\t},\n\tnameFirst: {\n\t\ttype: 'string',\n\t\tsource: 'meta',\n\t\tmeta: 'nameFirst'\n\t},\n\tnameLast: {\n\t\ttype: 'string',\n\t\tsource: 'meta',\n\t\tmeta: 'nameLast'\n\t},\n\tsuffix: {\n\t\ttype: 'string',\n\t\tsource: 'meta',\n\t\tmeta: 'suffix'\n\t}\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9hdHRyaWJ1dGVzLmpzPzg4MDEiXSwic291cmNlc0NvbnRlbnQiOlsiZXhwb3J0IGRlZmF1bHQge1xuXHRwcmVmaXg6IHtcblx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRzb3VyY2U6ICdtZXRhJyxcblx0XHRtZXRhOiAncHJlZml4J1xuXHR9LFxuXHRuYW1lRmlyc3Q6IHtcblx0XHR0eXBlOiAnc3RyaW5nJyxcblx0XHRzb3VyY2U6ICdtZXRhJyxcblx0XHRtZXRhOiAnbmFtZUZpcnN0J1xuXHR9LFxuXHRuYW1lTGFzdDoge1xuXHRcdHR5cGU6ICdzdHJpbmcnLFxuXHRcdHNvdXJjZTogJ21ldGEnLFxuXHRcdG1ldGE6ICduYW1lTGFzdCdcblx0fSxcblx0c3VmZml4OiB7XG5cdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0c291cmNlOiAnbWV0YScsXG5cdFx0bWV0YTogJ3N1ZmZpeCdcblx0fVxufTtcblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9ibG9jay9hdHRyaWJ1dGVzLmpzXG4vLyBtb2R1bGUgaWQgPSA2XG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///6\n");

/***/ })
/******/ ]);