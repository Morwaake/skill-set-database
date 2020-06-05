$('#menu').mmenu({
    extensions: {
      all: ["theme-white", ""],
      "(max-width: 549px)": ["fx-menu-slide"]
    },
    counters: false,
    dividers: {
      fixed:  false,
    },
    iconPanels: {
      add: !0,
      hideDivider: !0,
      hideNavbar: !0,
      visible: "first"
    },
    navbar: {
      title: ""
    },
    setSelected: {
      hover: !0,
      parent: !0
    },
    sidebar: {
      collapsed: "(min-width: 550px)",
      collapsed: {
        use: 550,
        hideNavbar: !0,
        hideDivider: !0
      },
    }
    }, {
    offCanvas: {
      page: {
        selector: "#offCanvas"
      }
    },
    clone: false,
  });
  
  var api = $("#menu").data("mmenu");
  $('#mm-0 a').click(function() {
    var href = $(this).attr('href');
    var ariaOwns = $(this).attr('aria-owns');
    if (ariaOwns) {
        if ($(this).hasClass('mm-panel_opened')) {
            return false;
        } else {
            $('#mm-0 a').removeClass('mm-panel_opened');
            $(this).toggleClass('mm-panel_opened');
        }
        var mmTitle = $(this).clone().find('span, i').remove().end().text();
        $("#" + ariaOwns).find('.mm-navbar__title').replaceWith('<span class="mm-navbar__title">' + mmTitle + '</span>');
        setTimeout(function() {
            api.closeAllPanels();
            api.openPanel($("#" + ariaOwns));
            api.open();
        }, 100);
        return false;
    } else {
        api.close();
        return false;
    }
  });
  
  api.bind("close:finish", function() {
    setTimeout(function(){
      $("#hamburger").children(".hamburger").attr("href", "#menu");
      $(".mm-listview a").removeClass("mm-panel_opened");
      $(".mm-listview li").removeClass("mm-listitem_selected-parent");
    }, 100);
  }), api.bind("open:finish", function() {
    setTimeout(function(){
      $("#hamburger").children(".hamburger").attr("href", "#offCanvas");
    }, 100);
  });