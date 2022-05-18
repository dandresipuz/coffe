$(function() {
    $('#product-select').on('change', onSelectProductChange);
});

function onSelectProductChange() {
    var product_id = $(this).val();
    alert(product_id);
}
