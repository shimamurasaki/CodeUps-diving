<?php if (!is_page(['contact', 'thanks']) && !is_404()): ?>
<section class="contact top-contact" id="contact">
  <div class="contact__inner inner">
    <div class="contact__box">
      <div class="contact__info">
        <div class="contact__logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-blue.png" alt="CodeUps">
        </div>
        <div class="contact__access">
          <div class="contact__access-text">
            <p>沖縄県那覇市1-1</p>
            <p>TEL:0120-000-0000</p>
            <p>営業時間:8:30-19:00</p>
            <p>定休日:毎週火曜日</p>
          </div>
          <div class="contact__access-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14320.124627230969!2d127.65836873349186!3d26.19566472716933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e569a926a083d5%3A0xf368c08083a19ad6!2z44CSOTAxLTAxNTIg5rKW57iE55yM6YKj6KaH5biC5bCP56aE77yR5LiB55uu77yR!5e0!3m2!1sja!2sjp!4v1714141987828!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="contact__content">
        <div class="contact__header">
          <p class="contact__entitle">Contact</p>
          <h2 class="contact__title">お問い合わせ</h2>
        </div>
        <p class="contact__text">ご予約・お問い合わせはコチラ</p>
        <div class="contact__button">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="common-button">Contact us<span></span></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="top-up">
  <a href="#top" class="top-up__circle">
    <div class="top-up__yazirusi">
      <div class="top-up__line01"></div>
      <div class="line02"></div>
      <div class="top-up__line02"></div>
    </div>
  </a>
</div>
</main>

<<<<<<< HEAD
<footer id="footer" class="footer <?php if (is_page(['404-2'])) echo 'no-top-footer'; ?> top-footer">
=======
<footer class="footer <?php if (is_404()) echo 'no-top-footer'; ?> top-footer">
>>>>>>> 099cc8b6fce15b4e411017d351e810cd8d876019
  <div class="footer__inner inner">
    <div class="footer__info">
      <div class="footer__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logoLink">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg" alt="CodeUps">
        </a>
      </div>
      <div class="footer__snsIcon">
        <a href="https://www.facebook.com/" target="_blank" class="footer__snsLink">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebook.png" alt="CodeUps">
        </a>
        <a href="https://www.instagram.com/" target="_blank" class="footer__snsLink">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/instagram.png" alt="CodeUps">
        </a>
      </div>
    </div>
    <div class="footer__nav">
      <div class="nav-contents">
        <div class="nav-contents__box">
          <div class="nav-contents__left">
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/campaign/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>キャンペーン</p>
                  </a>
                </dt>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">ライセンス取得</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">貸切体験ダイビング</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">ナイトダイビング</a></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/about-us/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>私たちについて</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/information/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>ダイビング情報</p>
                  </a>
                </dt>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/information/')); ?>?tab=information1">ライセンス講習</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/information/')); ?>?tab=information2">ファンダイビング</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/information/')); ?>?tab=information3">体験ダイビング</a></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/blog/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>ブログ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
          </div>
          <div class="nav-contents__right nav-contents__right--footer">
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/voice/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>お客様の声</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/price/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>料金一覧</p>
                  </a>
                </dt>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/price/')); ?>">ライセンス講習</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/price/')); ?>">ファンダイビング</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/price/')); ?>">体験ダイビング</a></dd>
                <dd class="nav-contents__text"><a href="<?php echo esc_url(home_url('/price/')); ?>">スペシャルダイビング</a></dd>
              </dl>
            </div>
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/faq/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>よくある質問</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>サイトマップ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/privacypolicy/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>プライバシー<br class="u-mobile">ポリシー</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>利用規約</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>お問い合わせ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__copyright">
    <p>Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
