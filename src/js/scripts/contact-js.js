


function selectChange() {
    $('.email').remove()
    $('.address').remove()

    var email = $('select').find(':selected').data('email')
    var address = $('select').find(':selected').data('address')

    if (email != "") {
        $(".info").append("<span class='email'>" + email + "</span>");
    }
    if (address != "") {
        $(".info").append("<span class='address'>" + address + "</span>");
    }
}

selectChange()

$("select").change(function () {
    selectChange()
}).change();