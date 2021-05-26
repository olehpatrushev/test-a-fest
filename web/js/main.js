const filterGeoItems = function ($selector, parentId = null) {
    $selector.find('option').attr('disabled', 'disabled');
    if (parentId !== null) {
        $selector.find('option[data-parent-id="' + parentId + '"]').removeAttr('disabled');
    }
    $selector.val($selector.find('option:enabled').val());
};

$('#country_geo_selector').on('change', function () {
    filterGeoItems($('#state_geo_selector'), $(this).val());
    filterGeoItems($('#locality_geo_selector'), $('#state_geo_selector').val());
});

$('#state_geo_selector').on('change', function () {
    filterGeoItems($('#locality_geo_selector'), $(this).val());
});

$('#country_geo_selector').trigger('change');