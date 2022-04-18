/**
 *  WP Starter Kit 
 *
 *  @method formData - Collect data from form inputs
 *  @method formClear - Clear data from the form inputs
 *  @method formSubmit - submit forms using wirekit.formSubmit("form_css_id")
 *  @method ajaxReq - send fetch request to provided /ajax/* url
 *  @method mobileMenu - init mobile menu offcanvas
 */
 var wpskit = (function () {

	'use strict';

	// Create the methods object
	var methods = {};
  
  const debug = !cms ? false : cms.debug;

  /* =========================================================== 
    Forms
  =========================================================== */

  /**
   * Get fields from specified form
   * @param {string} form_id 
   */
  methods.formFields = function(form_id) {
    const form = document.getElementById(form_id);
    const fields = form.querySelectorAll("input, select, textarea");
    return fields;
  }

  /**
   * Create FormData for use in fetch requests 
   * @param {string} form_id 
   * @param {object} data - {"name": "My Name", "email": "My Email"}
   * @returns {object}
   */
  methods.formData = function(form_id, data = null) {
    let fields = this.formFields(form_id);
    let formData = new FormData();
    if (data) {
      for (const item in data) formData.append(item, data[item]);
    }
    fields.forEach((e) => {
      let name = e.getAttribute("name");
      let value = e.value;
      formData.append(name, value);
    });
    return formData;
  }

  /**
   * Reset/clear all form fields values
   * @param {string} form_id css id 
   */
  methods.formClear = function(form_id) {
    let fields = this.formFields(form_id);
    fields.forEach((e) => {
      let type = e.getAttribute("type");
      if(type !== "submit" && type !== "hidden" && type !== "button") e.value = "";
    });
  }

  /**
   * Set form field values
   * @param {string} form_id 
   * @param {object} obj {id: '123', title: 'My Title'...} 
   */
  methods.formSetVals = function(form_id, obj) {
    const form = document.getElementById(form_id);
    for (const property in obj) {
      let name = property;
      let value = obj[property]
      let input = form.querySelector(`[name='${name}']`);
      input.value = value;
    }
  }

  /**
   * Submit Form Data to the form action url
   * This should be like: /ajax/example/
   * @param {string} form_id 
   */
  methods.formSubmit = async function(form_id) {

    event.preventDefault();

    const form = document.getElementById(form_id);
    const fields = this.formFields(form_id);

    const indicator = form.querySelector(".ajax-indicator");
    if (indicator) indicator.classList.remove("uk-hidden");

    const ajaxUrl = form.getAttribute("action");
    const formMethod = form.getAttribute("method");
    let formData = this.formData(form_id);

    let request = await fetch(ajaxUrl, {
      method: formMethod,
      cache: 'no-cache',
      body: formData
    });

    let response = await request.json();
    if(debug) console.log(response);

    // if reset-form clear form fields
    if(response.reset_form) this.formClear(form_id);

    // clear error marks
    fields.forEach(e => {
      e.classList.remove("error");
    });

    // mark error fields
    if(response.error_fields && response.error_fields.length > 0) {
      response.error_fields.forEach(e => {
        let field = form.querySelector(`[name='${e}']`);
        field.classList.add("error");
      });
    }

    //
    // response errors-modal-notification
    //
    if(response.errors && response.errors.length > 0) {
      response.errors.forEach(error => {
        UIkit.notification({
          message: error,
          status: 'danger',
          pos: 'top-center',
          timeout: 3000
        });
      }); 
    } else if (response.modal) {
      UIkit.modal.alert(response.modal).then(function () {
        if(response.redirect) window.location.href = response.redirect;
      });
    } else if (response.notification) {
      UIkit.notification({
        message: response.notification,
        status: response.status ? response.status : 'primary',
        pos: 'top-center',
        timeout: 3000
      });
    } else if (response.redirect) {
      window.location.href = response.redirect;
    }

    //
    // hide indicator
    //
    if (indicator) indicator.classList.add("uk-hidden");

  }

  /* =========================================================== 
    Ajax and UI
  =========================================================== */

  /**
   * Ajax Request on given URl
   * send ajax request on given url and
   * trigger notification/modal if avalable
   * @param {string} url 
   */
  methods.ajaxReq = async function(url) {
    event.preventDefault();
    let request = await fetch(url);
    let response = await request.json();
    if(debug) console.log(response);
    if(response.errors && response.errors.length > 0) {
      response.errors.forEach(error => {
        UIkit.notification({
          message: error,
          status: 'danger',
          pos: 'top-center',
          timeout: 3000
        });
      }); 
    } else if (response.modal) {
      UIkit.modal.alert(response.modal).then(function () {
        if(response.redirect) window.location.href = response.redirect;
      });
    } else if (response.notification) {
      UIkit.notification({
        message: response.notification,
        status: response.status ? response.status : 'primary',
        pos: 'top-center',
        timeout: 3000
      });
    } else if (response.redirect) {
      window.location.href = response.redirect;
    }
  }
  
	// Expose the public methods
	return methods;

})();