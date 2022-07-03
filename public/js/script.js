function hideLoader(sel) {
    if (!sel) {
        sel = 'body';
    }
    $(sel).LoadingOverlay("hide");
}
function showFormArticle() {
    $('#formMessage').hide();
    $('#formArticle').show();
}
function showFormMessage() {
    $('#formArticle').hide();
    $('#formMessage').show();
}
function showLoader(sel) {
    if (!sel) {
        sel = 'body';
    }
    $(sel).LoadingOverlay("show");
}
$(document).pjax('a', 'body');
// $(document).on('submit', 'form', function (event) {
//     $.pjax.submit(event, 'body')
// });
$(document).on('pjax:send', function () {
    showLoader('body');
});
$(document).on('pjax:complete', function () {
    hideLoader('body');
});