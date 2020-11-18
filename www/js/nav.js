jQuery(document).ready(function () {
    /* cliques sur les liens du menu */

    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 50
    });
    jQuery(".tab-news a").click(function (e) {
        e.preventDefault();

        /* On récupère la valeur de l'onglet cliqué que l'on veut activer  ayant comme valeur onglet1 ou onglet2*/
        var tab = jQuery(this).data("tab");

        /* on désactive le contenu de l'onglet affiché*/
        jQuery(".tab").removeClass("tab-active");

        /* On active l'onglet  */
        jQuery("#" + tab).addClass("tab-active");

        /* On désactive tous les onglets */
        jQuery(".tab-news a").removeClass("tab-nav-active");

        /* On active l'onglet qui a été cliqué */
        jQuery(this).addClass("tab-news-active");
    });
});