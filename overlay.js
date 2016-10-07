/* ========================================================================
 * Bootstrap: overlay.js v3.3.7

 * ======================================================================== */

/* jshint latedef: false */

+function ($) {
  'use strict';

  // OVERLAY PUBLIC CLASS DEFINITION
  // ================================

  var Overlay = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Overlay.DEFAULTS, options)
    this.$trigger      = $('[data-toggle="overlay"][href="#' + element.id + '"],' +
                           '[data-toggle="overlay"][data-target="#' + element.id + '"]')
    this.transitioning = null

    if (this.options.parent) {
      this.$parent = this.getParent()
    } else {
      this.addAriaAndCollapsedClass(this.$element, this.$trigger)
    }

    if (this.options.toggle) this.toggle()
  }

  Overlay.VERSION  = '3.3.7'

  Overlay.TRANSITION_DURATION = 350

  Overlay.DEFAULTS = {
    toggle: true
  }

  Overlay.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }

  Overlay.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return

    var activesData
    var actives = this.$parent && this.$parent.children('.panel').children('.in, .collapsing')

    if (actives && actives.length) {
      activesData = actives.data('bs.overlay')
      if (activesData && activesData.transitioning) return
    }

    var startEvent = $.Event('show.bs.overlay')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    if (actives && actives.length) {
      Plugin.call(actives, 'hide')
      activesData || actives.data('bs.overlay', null)
    }

    var dimension = this.dimension()

    this.$element
      .removeClass('overlay')
      .addClass('collapsing')[dimension](0)
      .attr('aria-expanded', true)

    this.$trigger
      .removeClass('collapsed')
      .attr('aria-expanded', true)

    this.transitioning = 1

    var complete = function () {
      this.$element
        .removeClass('collapsing')
        .addClass('overlay in')[dimension]('')
      this.transitioning = 0
      this.$element
        .trigger('shown.bs.overlay')
    }

    if (!$.support.transition) return complete.call(this)

    var scrollSize = $.camelCase(['scroll', dimension].join('-'))

    this.$element
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Overlay.TRANSITION_DURATION)[dimension](this.$element[0][scrollSize])
  }

  Overlay.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return

    var startEvent = $.Event('hide.bs.overlay')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var dimension = this.dimension()

    this.$element[dimension](this.$element[dimension]())[0].offsetHeight

    this.$element
      .addClass('collapsing')
      .removeClass('overlay in')
      .attr('aria-expanded', false)

    this.$trigger
      .addClass('collapsed')
      .attr('aria-expanded', false)

    this.transitioning = 1

    var complete = function () {
      this.transitioning = 0
      this.$element
        .removeClass('collapsing')
        .addClass('overlay')
        .trigger('hidden.bs.overlay')
    }

    if (!$.support.transition) return complete.call(this)

    this.$element
      [dimension](0)
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Overlay.TRANSITION_DURATION)
  }

  Overlay.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }

  Overlay.prototype.getParent = function () {
    return $(this.options.parent)
      .find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]')
      .each($.proxy(function (i, element) {
        var $element = $(element)
        this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element)
      }, this))
      .end()
  }

  Overlay.prototype.addAriaAndCollapsedClass = function ($element, $trigger) {
    var isOpen = $element.hasClass('in')

    $element.attr('aria-expanded', isOpen)
    $trigger
      .toggleClass('collapsed', !isOpen)
      .attr('aria-expanded', isOpen)
  }

  function getTargetFromTrigger($trigger) {
    var href
    var target = $trigger.attr('data-target')
      || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') // strip for ie7

    return $(target)
  }


  // OVERLAY PLUGIN DEFINITION
  // ==========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.overlay')
      var options = $.extend({}, Overlay.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data && options.toggle && /show|hide/.test(option)) options.toggle = false
      if (!data) $this.data('bs.overlay', (data = new Overlay(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.overlay

  $.fn.overlay             = Plugin
  $.fn.overlay.Constructor = Overlay


  // OVERLAY NO CONFLICT
  // ====================

  $.fn.overlay.noConflict = function () {
    $.fn.overlay = old
    return this
  }


  // OVERLAY DATA-API
  // =================

  $(document).on('click.bs.overlay.data-api', '[data-toggle="overlay"]', function (e) {
    var $this   = $(this)

    if (!$this.attr('data-target')) e.preventDefault()

    var $target = getTargetFromTrigger($this)
    var data    = $target.data('bs.overlay')
    var option  = data ? 'toggle' : $this.data()

    Plugin.call($target, option)
  })

}(jQuery);