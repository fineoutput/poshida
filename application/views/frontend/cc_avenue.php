<html>

<head>
    <title>Poshida By Ronak Textiles</title>
</head>

<body>
    <?php
    error_reporting(0);
    ?>
    <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
        <?php
        echo "<input type=hidden name=encRequest value=$encrypted_data>";
        echo "<input type=hidden name=access_code value=" . ACCESS_CODE . ">";
        ?>
    </form>
    <script language='javascript'>
        document.redirect.submit();
    </script>
</body>

</html>