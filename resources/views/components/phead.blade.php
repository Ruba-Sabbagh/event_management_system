<!-- Basic Page Info -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('pageTitle')</title>

<!-- Site favicon -->

<link rel="apple-touch-icon" sizes="180x180" href="/back/vendors/images/apple-touch-icon.png" />
<link rel="icon" type="image/png" sizes="32x32" href="/back/vendors/images/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="16x16" href="/back/vendors/images/favicon-16x16.png" />

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
<!-- CSS -->
@if (App::getLocale() == 'en')
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesltr/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesltr/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesltr/style.css" />
@else
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesrtl/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesrtl/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/stylesrtl/style.css" />
@endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.3.0/css/searchPanes.dataTables.min.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.min.js" defer></script>

<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.min.js" defer></script>

<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.jss" defer></script>

<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js" defer></script>

<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js" defer></script>

<script src="https://cdn.datatables.net/searchpanes/2.3.0/js/dataTables.searchPanes.min.js" defer></script>

<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            "gtm.start": new Date().getTime(),
            event: "gtm.js"
        });
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
