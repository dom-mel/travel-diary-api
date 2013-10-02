"use strict";

var Login = function() {
    this.alert = $('.wrong-login');
    this.alert.hide();
    $('.container').show();
    this.submit = $('button[type=submit]');
    var that = this;
    $('form').submit(function(event) {that.doLogin(event)});
};

Login.prototype.doLogin = function(event) {
    event.preventDefault();
    var data = {};
    data.user = $('#email').val();
    data.password = $('#password').val();

    var that = this;
    $.ajax(TravelBookConfig.api + "/user/login", {
        data: data,
        dataType: "json",
        error: function() {that.loginError()},
        success: function(data) {that.loginSuccess(data)},
        method: "POST"
    });

    return false;
};

Login.prototype.loginSuccess = function(data) {
    if (!data.success) this.alert.show();
    this.unlockForm();
};

Login.prototype.loginError = function(data) {
    alert(data);
    this.unlockForm();
};

Login.prototype.lockForm = function() {
    this.submit.prop('disabled', true);
};

Login.prototype.unlockForm = function() {
    this.submit.prop('disabled', false);
};


var login = new Login();