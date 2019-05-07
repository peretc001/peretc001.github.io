CatalogMenu = {
	init : function(){
        this.setTmp();
		this.tOpen, this.tClose;
                
	},
	showMenu: function(){
            clearTimeout(this.tOpen);
            $('.default_popup:visible').trigger('popup.needClose');
            this.tClose = setTimeout(function(){

                if(!this.statusClose){
                    $(".headerCatalogItem.currentSection").removeClass('headerCatalogItemActive');
                    var obj = $(".catalogue_positioner>.catalogue_bottom .expand_catalogue a").parent().hide().parent();
                    $('.headerCatalogList').addClass('ieNoShadow');
                    $('#main_menu_container').removeClass('closeHeaderCatalog');
                    $(".headerCatalogItem").not(".headerCatalogHd").slideDown(300, function(){
                        obj.height("0px");
                        $('.headerCatalogList').removeClass('ieNoShadow');
                    });
                    obj.animate({height:"0px"}, 300, function(){
                        $(this).stop(true, true);
                        obj.height("0px");
                    });

                    $("#main_menu_container .headerCatalogHd .headerCatalogItemLink").addClass("active");
                    this.statusClose = true;
                }
            }, 250);
	},
	hideMenu: function(){
            clearTimeout(this.tClose);
            this.tOpen = setTimeout(function(){
                var iOffset = 48;
                if(this.statusClose){
                    var obj = $(".catalogue_positioner>.catalogue_bottom .expand_catalogue a").parent().show().parent();
                    $('.headerCatalogList').addClass('ieNoShadow');
                    $(".headerCatalogItem").not('.headerCatalogHd, .currentSection').slideUp(200, function () {
                        obj.height(iOffset+"px");
                        $(".headerCatalogItem.currentSection").addClass('headerCatalogItemActive');
                        $('.headerCatalogList').removeClass('ieNoShadow');
                        $('#main_menu_container').addClass('closeHeaderCatalog');
                    });
                    obj.animate({height: iOffset + "px"}, 200, function () {
                        $(this).stop(true, true);
                        obj.height(iOffset+"px");
                    });
                }
                $("#main_menu_container .headerCatalogHd .headerCatalogItemLink").removeClass("active");
                this.statusClose = false;
            }, 500);
	},

    showSubMenu: function(){
        $('#main_menu_container').addClass('zTop').addClass('headerCatalogItemLastNoBR');
        $('#main_menu_container .headerCatalogItem').last().addClass('headerCatalogItemLastNoBR').addClass('notRoundForIe');
        $('.headerLogo').addClass('zTop');
        $('.shadeLight').stop().fadeTo(200, 0.5);
    },

    hideSubMenu: function(){
        $('.headerCatalogItemLastNoBR').removeClass('headerCatalogItemLastNoBR').removeClass('notRoundForIe');
        $('.shadeLight').stop().fadeOut(200, function(){
            $('#main_menu_container, .headerLogo').removeClass('zTop');
        });
    },

	setTmp: function(){
		var cont = $('<div/>').appendTo('body');
		cont.css({'position':'absolute', 'top': '-1000px', 'left':'-1000px', width: $('#main_menu_container').parent().width()}).attr('id', 'tmp_menu_catalog');
		$('#main_menu_container').clone().appendTo(cont).removeClass('closeHeaderCatalog');
		$('#tmp_menu_catalog .headerCatalogSub').show();
		$('#tmp_menu_catalog .headerCatalogItem').show();
        $('#tmp_menu_catalog .headerCatalogItemActive').removeClass('headerCatalogItemActive');
        this.setMinHeight();
        this.removeTmp();
    },
	removeTmp: function(){
		$('#tmp_menu_catalog').remove();
	},

    setMinHeight: function(){
        var isIE8 = $.browser.msie && +$.browser.version === 8;
        var height = $('#tmp_menu_catalog .headerCatalogList').height() - $('#tmp_menu_catalog .headerCatalogHd').height() -31;
        var compareHeight = height;
        if (isIE8) {
            compareHeight += 42;
        }
        var i = 0;
        var subMenus = $('#main_menu_container .headerCatalogSub');
        $('#tmp_menu_catalog .headerCatalogSub').each(function() {
            if ($(this).height() <= compareHeight){
                $(subMenus.get(i)).addClass('headerCatalogSubSmall');
            }
            i++;
        });
        if (isIE8) {
            $('#main_menu_container .headerCatalogSub ul').css('min-height', height-16);
        } else {
            $('#main_menu_container .headerCatalogSub ul').css('min-height', height-20);
        }
    },

    showOnFirstVisit: function() {
        var cm = $.cookie('cm');
        if(!cm){
            if (this.index) {
                $.cookie('cm', '1', {expires: 3600*24*30, path: '/' });
            } else {
                CatalogMenu.showMenu();
                setTimeout(function(){
                    CatalogMenu.hideMenu();
                    $.cookie('cm', '1', {expires: 3600*24*30, path: '/' });
                }, 1000);
            }
        }
    }
};

$(function(){
    $(document).ready(function(){
        CatalogMenu.init();

        CatalogMenu.showOnFirstVisit();

        if (!CatalogMenu.index) {
            $('#main_menu_container').hover(function(){
                CatalogMenu.showMenu();
            }, function(){
                CatalogMenu.hideMenu();
            });
        }

        $('.headerCatalogItem:not(.headerCatalogHd)').hover(function(){
            CatalogMenu.showSubMenu();
        }, function(){
            CatalogMenu.hideSubMenu();
        });

        $(".catalogue_positioner>.catalogue_bottom .expand_catalogue a").unbind('click');

        $(".catalogue_positioner>.catalogue_bottom .expand_catalogue a").click(function(){
            CatalogMenu.showMenu();
            return false;
        });
    });
});