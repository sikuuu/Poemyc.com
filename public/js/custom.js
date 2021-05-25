$(function () {
    function resizeIFrameToFitContent() {
        iFrame = document.getElementById('iframe-ng');
        var iframes = document.querySelectorAll(".iframe-angular");

        for( var i = 0; i < iframes.length; i++) {
            iframes[i].height  = iFrame.contentWindow.document.body.scrollWidth;        }
    }

    //angularheight = setInterval(function() { resizeIFrameToFitContent(); },100)

    $('#body-row .collapse').collapse('hide');

    $('#collapse-icon').addClass('fa-angle-double-left');

    $('[data-toggle=sidebar-colapse]').click(function () {
        SidebarCollapse(true);
    });

    function SidebarCollapse(change) {
        $('.menu-collapsed').toggleClass('d-none');
        $('.sidebar-submenu').toggleClass('d-none');
        $('.submenu-icon').toggleClass('d-none');
        $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

        var SeparatorTitle = $('.sidebar-separator-title');
        if (SeparatorTitle.hasClass('d-flex')) {
            SeparatorTitle.removeClass('d-flex');
        } else {
            SeparatorTitle.addClass('d-flex');
        }

        $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');

        if (change){
            if(localStorage.getItem('sidebar') == 1){
                localStorage.setItem('sidebar',0)
            } else {
                localStorage.setItem('sidebar',1)
            }
        }
        
    }

    if (localStorage.getItem('sidebar') == 1) {
        SidebarCollapse(false);
    }
});

