<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Спасибо!</title>
    </head>
    <body>
        <?php if(isset( $_GET['name']) && isset( $_GET['id'])) { ?>
        Спасибо, <?php echo $_GET['name']; ?>, мы свяжемся с вами в близжайшее время. Ваша заявка отправлена под номером <?php echo $_GET['id'];?>
        <?php } else {?>
            <script>
                window.location = '/'; // changing of the address    
            </script>
        <?php } ?>
    </body>
</html>