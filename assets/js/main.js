jQuery(function() {
  
  //ドロワーメニュー開閉
  jQuery('.js-header-icon').click(function() {
    jQuery(this).toggleClass('open');
    jQuery('.drawer').toggleClass('open');
  });
  
  //スクロールボタンの表示・非表示
  jQuery('.js-scroll').hide();
    
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 60) {
      jQuery('.js-scroll').fadeIn();
    }else {
      jQuery('.js-scroll').fadeOut();
    }
  });

  //トップへ
  jQuery('.js-scroll').click(function() {
    jQuery('body, html').animate(
      {
        scrollTop: 0
      },
      500
    );
    return false;
  });
});