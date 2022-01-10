/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/datatable.js ***!
  \******************************************/
$(function (e) {
  'use strict';

  $('#datatable1').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page'
    }
  });
  $('#datatable2').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
  }); // Select2

  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
  });
});
/******/ })()
;