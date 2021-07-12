        <link rel="stylesheet" id="font-awesome-css" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css?ver=5.5.3" media="all" />
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.3" id="contact-form-7-js"></script>
        <script defer="defer" src="https://www.google.com/recaptcha/api.js?render=6LdK4bwZAAAAAMAP80yLcmF2uR6LD5ecF32_PH0q&#038;ver=3.0" id="google-recaptcha-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/plugins/contact-form-7/modules/recaptcha/script.js?ver=5.3" id="wpcf7-recaptcha-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/bootstrap.min.js?ver=4.5.0" id="bootstrap-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/jquery.waypoints.min.js?ver=4.0.1" id="waypoint-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/mlpushmenu.js?ver=1.0.0" id="mlpushmenu-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/slick.min.js?ver=1.8.1" id="slick-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/theia-sticky-sidebar.js?ver=1.4.0" id="theia-sticky-sidebar-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/jquery.magnific-popup.min.js?ver=1.1.0" id="magnific-popup-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-content/themes/truf/include/js/custom.js" id="theme-script-js"></script>
        <script defer="defer" src="https://www.trufab.co.uk/wp-includes/js/wp-embed.min.js?ver=5.5.3" id="wp-embed-js"></script>
        <script>
            jQuery("header .mega-dropdown").each(function () {
                var largeMenuItems = jQuery(this).find("ul.dropdown-menu").html();
                var appendHTML = '<div class="mega-menu-outer">';
                appendHTML += '<div class="mega-menu-box d-flex">';
                appendHTML += '<div class="mega-menu-icon"><img src="' + jQuery(this).children("a").data("icon") + '" alt=""></div>';
                appendHTML += '<div class="mega-menu-left"><div class="mega-menu-left-content">';
                appendHTML += "<h4>" + jQuery(this).children("a").data("heading") + "</h4>";
                appendHTML += "<p>" + jQuery(this).children("a").data("description") + "</p>";
                appendHTML += '<a href="' + jQuery(this).children("a").attr("href") + '" class="btn btn-outline4">' + jQuery(this).children("a").data("button_text") + "</a>";
                appendHTML += "</div></div>";
                appendHTML += '<div class="mega-menu-right">';
                appendHTML += '<ul class="sub-menu">';
                appendHTML += "</ul>";
                appendHTML += "</div>";
                appendHTML += "</div>";
                appendHTML += "</div>";
                jQuery(this).append(appendHTML);
                jQuery(this).find("ul.sub-menu").html(largeMenuItems);
                jQuery(this)
                    .find("ul.sub-menu")
                    .find("a")
                    .each(function () {
                        jQuery(this).contents().wrap("<h5/>");
                        jQuery(this).append("<p>" + jQuery(this).data("description") + "</p>");
                        if (typeof jQuery(this).attr("data-bg_image") !== "undefined" || jQuery(this).attr("data-bg_image") === "") {
                            jQuery(this).append('<div class="case-menu-bg" />');
                            jQuery(this)
                                .find(".case-menu-bg")
                                .css("background-image", "url(" + jQuery(this).data("bg_image") + ")");
                        }
                    });
                if (jQuery(this).find("ul").find("ul").length > 0) {
                    jQuery(this).find("ul").find("ul").addClass("sub-menu-third").removeClass("dropdown-menu");
                }
            });
        </script>
    </body>
</html>
