/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(document, window, $) {
  'use strict';

  var Site = window.Site;

  $(document).ready(function($) {
    Site.run();
  });

})(document, window, jQuery);


// Vue instance
var registrationWizard  = new Vue({
	el: '#app',
	data: {
		phoneType: null,
	},
	ready: function() {
		this.phoneType = 'iphone';
	},
	watch: {
		'phoneType': function (val, oldVal) {

			(function() {
				// set up formvalidation

				// init the wizard
				var defaults = $.components.getDefaults("wizard");
				var options = $.extend(true, {},
					{
						step: ".steps .step",
						templates: {
							buttons: function() {
								var options = this.options;
								return '<div class="wizard-buttons">' +
									'<a class="btn btn-default btn-outline" href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' +
									'<a class="btn btn-primary btn-outline pull-right" href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' +
									'<a class="btn btn-success btn-outline pull-right" href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' +
									'</div>';
							}
						},
						autoFocus: true,
						keyboard: true,
						enableWhenVisited: true,
						enableAlways: true
					}, {
						buttonsAppendTo: '.panel-body'
					});

				var wizard = $("#"+val+"WizardForm").wizard(options).data('wizard');
				window.wizard = wizard;

			})();
		}
	}
})

