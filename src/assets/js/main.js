/*
 Third party
 */

//= ../../../bower_components/jquery/dist/jquery.min.js
//= ../../../bower_components/semantic-ui/dist/semantic.min.js
//= ../../../bower_components/swiper/dist/js/swiper.min.js
//= ../../../bower_components/lodash/lodash.min.js


//= partials/helper.js


$(document).ready(
    function () {
        inflateNavigation('#auto-data-footer-collections', COLLECTIONS);
        inflateCollectionsGrid('#auto-data-collections-grid', COLLECTIONS);
        inflateNavigation('#auto-data-footer-dop', DOP);
        inflateNavigation('#auto-data-collections-list', COLLECTIONS);
        createSideBar();
        selectActiveTopMenuTab();
    }
);


function selectActiveTopMenuTab() {
    var items = ['company','collection','dop'];
    var loc = $(location).attr('href');
    var i = _.chain(items).map(function(item) { return _.contains(loc,item); }).indexOf(true).value();
    var itemId = '#' + items[i] + '-tab';
    $(itemId).addClass('active');
}


function inflateNavigation(blockId, array) {
    return $(blockId).html(convertToLinksString(array));
}


function convertToLinksString(array){
    var loc = $(location).attr('href');
    return stringizeArray(_.map(array, function(obj) { return makeA(obj, loc) }));
}


function makeA(obj, location){
    if(obj.sub)
        return '<div class="footer-links-sub-header">' + obj.title +'<div class="link list moved-left-1em">' +  convertToLinksString(obj.sub) + '</div>' + '</div>';
    else{
        var active = '';
        if(_.contains(location,obj.url)) {
            active = ' active';
        }
        return '<a href="' + obj.url + '" class="item padded-0-5em' + active + '">' + obj.title + '</a>';
    }
}


function stringizeArray(array){
    return _.reduce(array, function (out, obj) {
        return out + obj;
    });
}


function inflateCollectionsGrid(blockId, array) {
    var grid = $(blockId);

    if(grid.length > 0) {
        var makeDiv = function(obj){

            if(obj.thumbnail)
                return '<div class="column center aligned">' +
                    '<a href="' + obj.url + '">' +
                        '<img src="' + obj.thumbnail + '" class="rounded-corners-0-3em" /><br>' +
                        obj.title +
                    '</a>' +
                '</div>';
        }

        grid.html(stringizeArray(_.map(array, function(obj) { return makeDiv(obj) })));

    }
}


function createSideBar(){
    $('.ui.sidebar')
        .sidebar('setting', 'transition', 'overlay')
        .sidebar('setting', 'mobileTransition', 'overlay')
        .sidebar('attach events', '.toc.item')
        .toggle();

    inflateNavigation('#auto-data-sidebar-collections', COLLECTIONS);
    inflateNavigation('#auto-data-sidebar-dop', DOP);
}


function initSwiper(containerSelector, paginationSelector) {
    return new Swiper (containerSelector, {
        direction: 'horizontal',
        loop: true,
        pagination: paginationSelector,
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        centeredSlides: true,
        autoplay: 3500,
        autoplayDisableOnInteraction: false
    });
}
