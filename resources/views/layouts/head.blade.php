  <head>
      {{-- Google Tag Manager --}}
      <script>
          (function(w, d, s, l, i) {
              w[l] = w[l] || [];
              w[l].push({
                  'gtm.start': new Date().getTime(),
                  event: 'gtm.js'
              });
              var f = d.getElementsByTagName(s)[0],
                  j = d.createElement(s),
                  dl = l != 'dataLayer' ? '&l=' + l : '';
              j.async = true;
              j.src =
                  'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
              f.parentNode.insertBefore(j, f);
          })(window, document, 'script', 'dataLayer', 'GTM-NFSDLX3');
      </script>
      {{-- End Google Tag Manager --}}
      {{-- Required meta tags --}}
      <meta charset="utf-8" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords"
          content="wordpress, woocommerce, woo, desenvolvedor, programador, wix, criar site, web,
      desenvolvedor web, desenvolvedor mobile, mobile, android, ios, developer, front end, back end, full stack, programmer, loja virtual,
      e-commerce, ecommerce, software, design, ui/ux, cursos, aprender online, certificado, flutter, dart, reactjs, javascript, scss, sass, php, nextjs, html, css, mysql, postgree " />
      <meta name="description"
          content="Vinicius Arcanjo | Engenheiro de Software | WordPress, Laravel, Flutter, ReactJs, NextJs, TypeScript, JavaScript, SCSS, MySql" />
      <meta property=" og:url" content="https://arcanjo.dev/" />
      <meta property="og:title" content="Vinicius Arcanjo" />
      <meta property="og:site_name" content="Vinicius Arcanjo" />
      <meta property=”og:type” content=”website“ />
      <meta property="og:description"
          content="Vinicius Arcanjo | Engenheiro de Software | WordPress, Laravel, Flutter, ReactJs, NextJs, TypeScript, JavaScript, SCSS, MySql" />
      <meta property="og:image" content="@asset('images/og.jpg')" />
      {{-- color of address bar in mobile browser --}}
      <meta name="theme-color" content="#2B2B35" />

      {{-- font awesome css --}}
      <link rel="stylesheet" href="@asset('css/font-awesome.min.css')" />
      {{-- swiper css --}}
      <link rel="stylesheet" href="@asset('css/swiper.min.css')" />
      {{-- fancybox css --}}
      <link rel="stylesheet" href="@asset('css/fancybox.min.css')" />
      <?php wp_head(); ?>
  </head>
