/*
 Third party
 */
//= ../../../bower_components/jquery/dist/jquery.min.js
//= ../../../bower_components/semantic-ui/dist/semantic.min.js
//= ../../../bower_components/swiper/dist/js/swiper.min.js
//= ../../../bower_components/lodash/lodash.min.js


//= partials/helper.js


function makeA(obj){
    if(obj.sub)
        return '<div class="footer-links-sub-header">' + obj.title +'<div class="link list moved-left-1em">' +  convertToLinksString(obj.sub) + '</div>' + '</div>';
    else
        return '<a href="' + obj.url + '" class="item padded-0-5em">' + obj.title + '</a>';
}


function stringize(array){
    return _.reduce(array, function (out, obj) {
        return out + obj;
    });
}


function convertToLinksString(array){
    return stringize(_.map(array, function(obj) { return makeA(obj) } ));
}


function inflateNavigation(blockId, array) {
    return $(blockId).html(convertToLinksString(array));
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


$(document).ready(
    function () {
        inflateNavigation('#auto-data-footer-collections', COLLECTIONS);
        inflateNavigation('#auto-data-footer-dop', DOP);
        createSideBar();
        selectActiveTopMenuTab();
    }
);


function initDefaultSwiper(containerSelector, paginationSelector) {
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


function selectActiveTopMenuTab() {
    var tabs = ['company','collection','dop'];
    var loc = $(location).attr('href');
    var i = _.chain(tabs).map(function(tab) { return _.contains(loc,tab); }).indexOf(true).value();
    var tabId = '#' + tabs[i] + '-tab';
    $(tabId).addClass('active');
}