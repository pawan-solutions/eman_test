<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
        }
    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 2.025in; /* plus .6 inches from padding */
        height: .875in; /* plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }
    </style>
    <style type="text/css"  media="print">
    	@page { margin: 0mm;  }

    </style>

</head>
<body>

<div class="label"><?php echo "<img src='data:image/png;base64,$b64' />" ?><br><?php echo $company_name ?></div>

 <script type="text/javascript">
    window.print();
</script>
</body>
</html>

