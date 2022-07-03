jQuery(document).ready(function($) {
    $(".click_affiliate").click(function(e) {
        var app = $(this).attr('app');
        var link_affiliate = $(this).attr('link_affiliate');
        var affiliateID = $(this).attr('affiliateID');
        var link = link_affiliate + affiliateID;
        if(app == 'facebook'){

            var checkOperatingSystem = getMobileOperatingSystem();
            if(checkOperatingSystem == 'iOS')
                publishOnFbIOS(affiliateID)
            else if  (checkOperatingSystem == 'Android')
                publishOnFbAndroid(affiliateID)
            else
                publishOnLink(link)
        }
        else if (app == 'nganhang'){
            var field = '.modal-field-' + $(this).attr('modal');
            var modal = $(field);
            var span = $('.close');
            modal.show();
            span.click(function () {
                modal.hide();
            });

            $(window).on('click', function (e) {
                if ($(e.target).is('.modal')) {
                    modal.hide();
                }
            });
        }
        else{
            publishOnLink(link);
        }

    });
    $('.bank').on("click", function(){
        var value = $(this).attr('stk');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(value).select();
        document.execCommand("copy");
        $temp.remove();
        $( ".modal-content" ).append( "<p class='notification-copy'>Đã copy số tài khoản</p>" );
        setTimeout(function () {
            $('.notification-copy').remove();
        }, 2500);

    });

});

function publishOnFbIOS(affiliateID) {
    window.open('fb://profile?id='+affiliateID, '_blank');
}
function publishOnFbAndroid(affiliateID) {
    window.open(`fb://faceweb/f?href=${encodeURI(`https://www.facebook.com/${affiliateID}`)}`, '_blank');
}
function publishOnLink(link) {
    window.open(link);
}
function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

    // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {
        return "Windows Phone";
    }

    if (/android/i.test(userAgent)) {
        return "Android";
    }

    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
    }

    return "unknown";
}