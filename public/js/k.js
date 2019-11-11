function submitHrefandFrom(tag) {
    var href=$(tag).attr('data-href');
    $(tag).parents('form').attr('action',href).submit();

}