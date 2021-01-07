(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(require('jquery')) :
  typeof define === 'function' && define.amd ? define(['jquery'], factory) :
  (global = global || self, factory(global.jQuery));
}(this, function ($) { 'use strict';

  $ = $ && $.hasOwnProperty('default') ? $['default'] : $;

  $.fn.multipleSelect.locales['pt-BR'] = {
    formatSelectAll: function formatSelectAll() {
      return '[Selecionar todos]';
    },
    formatAllSelected: function formatAllSelected() {
      return 'Todos selecionados';
    },
    formatCountSelected: function formatCountSelected(count, total) {
      return count + ' de ' + total + ' selecionados';
    },
    formatNoMatchesFound: function formatNoMatchesFound() {
      return 'Nenhuma equivalência encontrada';
    }
  };
  $.extend($.fn.multipleSelect.defaults, $.fn.multipleSelect.locales['pt-BR']);

}));
