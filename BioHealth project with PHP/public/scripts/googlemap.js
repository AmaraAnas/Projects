require(['jquery', 'AffixMenu', 'IsotopeShop', 'SimpleMap', 'enquire', 'utils', 'bootstrapTransition', 'bootstrapCollapse', 'bootstrapAlert', 'bootstrapTab', 'bootstrapDropdown', 'bootstrapCarousel' ], function ($, AffixMenu, IsotopeShop, SimpleMap) {
  'use strict', 'bootstrapCarousel';

  /**
   * Affix menu
   */
  (function () {
    if ( $('.js--affix-menu').length > 0 ) {
      var sidebarMenu = new AffixMenu({
        menuElm:   '.js--affix-menu',
        footerElm: '.js--page-footer'
      });

      enquire.register('screen and (min-width: 768px)', {
        match: function() {
          sidebarMenu.init();
        },
        unmatch: function () {
          sidebarMenu.destroy();
        }
      });
    }
  })();

  /**
   * Isotope Shop
   */
  (function () {
    var shop = new IsotopeShop({
      priceSlider: $('.js--jqueryui-price-filter'),
      priceRange:  [0, 20],
      priceStep:   0.2
    });
  })();

  (function () {
    if ( $('.js--where-we-are').length < 1 ) {
      return;
    }
    var map = new SimpleMap( $('.js--where-we-are'), {
      latLng: [46.049467,14.460506],
      markers: [
        {
          lat: 46.049467,
          lng: 14.460506,
          title: 'ProteusThemes Ljubljana'
        },
        {
          lat: 46.020569,
          lng: 15.476118,
          title: 'ProteusThemes Senovo'
        },
      ],
      // markersImg: 'images/favicon.png',
      zoom: 6,
      styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]
    }).renderMap();
  })();

});