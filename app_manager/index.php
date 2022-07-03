<?php
include_once('Services.php');
$dataUser =  getUser();
checkExistUser($dataUser['id']);
$affiliates = getAffiliates();
$domain ='https://manager.vipcard.biz/';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" href="#">
    <title>Vipcard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://app.vipcard.biz/css/style1.css">
    <link rel="stylesheet" type="text/css" href="https://app.vipcard.biz/css/style2.css">
    <link rel="stylesheet" type="text/css" href="https://app.vipcard.biz/css/style3.css">
    <link rel="stylesheet" type="text/css" href="https://app.vipcard.biz/css/style4.css">
    <link rel="stylesheet" type="text/css" href="https://app.vipcard.biz/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    </style>
</head>
<body>

<div data-v-11941ac8="">
    <div data-v-11941ac8="" class="ant-spin ant-spin-lg"><span class="ant-spin-dot ant-spin-dot-spin"><i
                    class="ant-spin-dot-item"></i><i class="ant-spin-dot-item"></i><i class="ant-spin-dot-item"></i><i
                    class="ant-spin-dot-item"></i></span></div>
    <div data-v-11941ac8="" id="app">
        <div data-v-11941ac8="">
            <div class="wapper bg-profile"
                 style="background-image: url(/image/backgourd/background.jpeg);">
                <div data-v-3eebf978=""><!---->
                    <div data-v-3eebf978="" pages="navbar-public" id="" class="wapper dat-edit-navbar"
                         style="transform: translateY(0%);">
                        <div data-v-3eebf978="" class="inner">
                            <div data-v-3eebf978="" class="logo logo-preview"><img data-v-3eebf978="" src="#" alt="logo"></div>
                            <div data-v-3eebf978="" class="menu">
                                <div data-v-3eebf978="" class="mobile menu-hidden"><img data-v-3eebf978="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAABOSURBVHgB7dSxCYAwGEThO7ATHMKJ3MRVXMWFHEKwNH9ShqQOad5XHlc/CcBkbodt3c9wHBrA4fv9nqvelvb0l581RhKAHh0AQAcATJcBZc4eB1GhIH8AAAAASUVORK5CYII=" alt="menuIcon"></div>
                                <div data-v-3eebf978="" class="web">
                                    <div data-v-3eebf978="" class="container-btn"><!----><!----><!---->
                                        <div data-v-3eebf978=""><!----></div>
                                        <button data-v-3eebf978="" class="btn-call"><img data-v-3eebf978="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADhSURBVHgB5ZRtEcIwDIYzFCChEiahUiahDpgDQMHmgEMBEsDBJAwHITnG3ei1If34xZ67/NiWvW+TtgH4SxBxT+EoLhQHqAkJthQTfmOhBiRkAuLMDWpAQgPGMZDBznu2Qm4HpaDMzJsPifgVPIXcZPFUg3PTNNL331ALxkh7ppz2MH4Fj0jetXj1zHKD58gGm0h+WmX0Qy+0yayEj6v3A2rviVDFR8xh+LYzPLusxsRhGU5j0hcY6GZXgUkHWjgZ4z0PwbkGUsD3GB8V4nw4WshlMeKK+LTcvVWfMHOkb5wX3/l+CUAFYmsAAAAASUVORK5CYII=" alt="phone">
                                            <span data-v-3eebf978=""><a data-v-3eebf978="" href="tel:<?=$dataUser['phone']?>">Gọi điện</a></span>
                                        </button>
                                        <div data-v-3eebf978="" class="save save-to-phone"><img data-v-3eebf978="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAD+SURBVHgB7ZX/rUExFMe/rUokz3vpCH3vLWADTCA2MIINMAEbmMEE7gZMgBEa4S/lOFcQoReVK+LH55/bNifnc3Jzego8O8J3+JP/axBQAEgjkIyiqrUTu9srT/I2J68n+QkU4aRKwcVgU4xzFK8jr0DnjFnuk/uZzcbl47Pv/G+fNSVfvDzcOAWDlJG4M28q0NrouJVz3BSXYhUC2XTaQva5N002I2vZr/8WsEpPsFRygG3PxxK+GV1e2KT4W36RvvLsZkEQH8HjBYltymN5yB+LIIR1DpOLAn4PWjyWm0gBr0CCKjzjiwhAkOhN56POWYFSGPKLFBHCWeFVWQO98T2G4IJe3QAAAABJRU5ErkJggg==" alt="book">
                                            <a class="save-to-phone" data-v-3eebf978="" href="#f" >Lưu danh bạ</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="min-height: 600px;">
                    <div>
                        <div data-v-ab9b8fc2=""><!---->
                            <div data-v-ab9b8fc2="" id="wapper2" class="wapper">
                                <div data-v-ab9b8fc2="" class="ctn-back"><!----></div>
                                <div data-v-ab9b8fc2="" class="info_block">
                                    <div data-v-ab9b8fc2="" class="avatar_image">
                                        <img data-v-ab9b8fc2="" src="<?=$domain.$dataUser['link_avatar']?>" alt="">
                                    </div>
                                    <p data-v-ab9b8fc2=""> <?=$dataUser['name']?> <img data-v-ab9b8fc2="" src="https://app.vipcard.biz/image/icon/icon-verified.svg" alt="avata"></p></div>
                            </div>
                        </div>
                        <div data-v-5b7a91ea="" id="" class="wrapper contact-info"><p data-v-5b7a91ea=""><?=$dataUser['greeting']?> </p>
                            <div data-v-5b7a91ea="" class="ctn">
                                <div data-v-5b7a91ea="" class="container-btn">
                                    <button data-v-5b7a91ea="">
                                        <img data-v-5b7a91ea="" src="https://app.vipcard.biz/image/icon/PhoneCall.svg"
                                             alt="phone">
                                        <span data-v-5b7a91ea="">
                                            <a data-v-5b7a91ea="" href="tel:<?=$dataUser['phone']?>">Gọi điện</a>
                                        </span>
                                    </button>
                                    <div data-v-5b7a91ea="">
                                        <img data-v-5b7a91ea=""
                                             src="https://app.vipcard.biz/image/icon/BookBookmark.svg" alt="book">
                                        <a data-v-5b7a91ea=""
                                           href="#"
                                          >Lưu danh bạ</a>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-bottom: 16px;background: #c4c4c4">
                        <?php
                                $fieldBank = 0;
                                foreach($affiliates as $affiliate){ ?>
                                <?php
                                    $isBank = 0;
                                    if($affiliate['templates_affiliate_id'] == 'nganhang'){
                                        $isBank = 1;
                                        $fieldBank ++ ;
                                        $bankInfo = explode("|", $affiliate['affiliate_link']);
                                ?>
                                        <div class="modal bank modal-field-<?=$fieldBank?>" stk="<?=$bankInfo[2]?>">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <h2 class="bank-name"><?=$bankInfo[0]?></h2>
                                                <p class="bank-user"><?=$bankInfo[1]?></p>
                                                <p class="bank-stk"><?=$bankInfo[2]?></p>
                                                <p class="bank-note">(Bấm vào để copy số tài khoản)</p>
                                            </div>
                                        </div>
                                <?php }?>
                            <div class="item item-tag click_affiliate" modal="<?=$fieldBank?>" app="<?=strtolower($affiliate['templates_affiliate_id'])?>" affiliateID="<?=$affiliate['affiliate_link']?>" link_affiliate="<?=$affiliate['templates_affiliate_link']?>">
                                <img class="item-tag-img"
                                     src="<?=$domain.'/'.$affiliate['templates_affiliate_icon']?>"
                                     alt="logo" width="34">
                                <span>
                                    <?php
                                    if(!$isBank)
                                        echo $affiliate['templates_affiliate_name'];
                                    else
                                        echo $bankInfo[0]
                                    ?></span>
                            </div>

                         <?php }?>
                        </div>
                    </div>
                </div>
                <div data-v-3c45ac26="" class="wapper">
                    <span data-v-3c45ac26="">THẺ CÁ NHÂN THÔNG MINH</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>
</body>
</html>