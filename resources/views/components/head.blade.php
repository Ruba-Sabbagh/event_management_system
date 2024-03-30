<!-- Basic Page Info -->
<meta charset="utf-8" />
<title>@yield('pageTitle')</title>

<!-- Site favicon -->
<link
    rel="apple-touch-icon"
    sizes="180x180"
    href="/back/vendors/images/apple-touch-icon.png"
/>
<link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="/back/vendors/images/favicon-32x32.png"
/>
<link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="/back/vendors/images/favicon-16x16.png"
/>

<!-- Mobile Specific Metas -->
<meta
    name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1"
/>

<!-- Google Font -->
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet"
/>
<!-- CSS -->

@if(App::getLocale()== 'en')
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesltr/core.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="/back/vendors/stylesltr/icon-font.min.css"
    />
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesltr/style.css" />

@else
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesrtl/core.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="/back/vendors/stylesrtl/icon-font.min.css"
    />
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesrtl/style.css" />

@endif

<!-- Global site tag (gtag.js) - Google Analytics -->
<script
    async
    src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
></script>
<script
    async
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
    crossorigin="anonymous"
></script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-GBZ3SGGX85");
</script>
<!-- Google Tag Manager -->
<script>
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != "dataLayer" ? "&l=" + l : "";
        j.async = true;
        j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
</script>
<!-- End Google Tag Manager -->
@stack('stylesheets')
