!function($){jQuery(document).ready(function(){function t(t){$(t).each(function(){var t=$(this).text(),e=moment($(this).attr("title")).format("LLLL");moment(t).format();var n=moment(t).fromNow();moment.lang("en",{relativeTime:{future:"in %s",past:"%s ago",s:"seconds",m:"a minute",mm:"%d minutes",h:"1 hour",hh:"%d hours",d:"1 day",dd:"%d days",M:"1 month",MM:"%d months",y:"a year",yy:"%d years"}}),$(this).html(n),$(this).attr("title",e)})}$("#newsletter-promo .close").click(function(t){t.preventDefault(),$("#newsletter-promo").slideUp(100)}),t(".entry .rel_time span"),t(".item .rel_time span"),$(".tags-list a").each(function(){var t=$(this).html();t=t.replace(" ","&#160;"),$(this).html(t)}),$(".btn-twitter").click(function(t){t.preventDefault();var e=$(this).attr("data-msg"),n=(new Date).valueOf();setTimeout(function(){if(!((new Date).valueOf()-n>100)){var t="https://twitter.com/share?text="+e;window.open(t,"_blank")}},50),window.location="twitter://post?message="+e});var e=$("#infinite-handle"),n=e.find("span");e.addClass("container").wrapInner('<div class="row" />'),n.wrap('<div class="" />').addClass("btn").text("show more")})}(jQuery);