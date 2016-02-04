/* js for c1_linklist */

function initListFilter(filterElement) {
    filterElement.find("input[name=categories]").each(function () {
        $(this).change(function () {
            linkListFilter(filterElement);
        });
    });
}

function getSelectedCategories(filterElement) {
    var selected = filterElement.find("input[name=categories]:checked").map(function () {
        return this.value;
    }).get().join(",");
    return selected;
}

function setSelectedCategory(linkList, category) {
    var selected = $(linkList).find("input[name=categories]").each(function () {
        if (parseInt(this.value) === parseInt(category)) {
            $(this).prop("checked", 1);
        } else {
            $(this).prop("checked", false);
        }
        ;
        linkListFilter($(linkList).children(".tx-linklist-filter"));
    });

}

function linkListFilter(filterElement) {
    selectedCategories = getSelectedCategories(filterElement).toString().split(",");
    var parent = filterElement.parents(".tx-linklist");
    parent.find(".tx-linklist-item").each(function () {
        itemCategories = $(this).data("categories");
        itemCategories = itemCategories.toString().split(",");
        var itemState = false; // hidden
        $.each(itemCategories, function (key, value) {
            if ($.inArray(value, selectedCategories) != -1) {
                itemState = true;
            }
        });
        if (itemState === true) {
            $(this).removeClass("hidden");
        } else {
            $(this).addClass("hidden");
        }
    });
}

function initCategoryLinks(linkList) {
    $(linkList).find(".tx-linklist-category").each(function () {
        $(this).click(function (e) {
            e.preventDefault();
            var category = $(this).data('category');
            setSelectedCategory(linkList, category);
        });
    });
}

$(function () {
    $('.tx-linklist').each(function () {
        var filterElement = $(this).children(".tx-linklist-filter");
        initListFilter(filterElement);
        initCategoryLinks(this);
    });
});