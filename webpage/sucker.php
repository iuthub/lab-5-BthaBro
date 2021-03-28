<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Buy Your Way to a Better Education!</title>
        <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
        <?php
            if ($_REQUEST["name"] == "" || $_REQUEST["sections"] == "" || $_REQUEST["credit-card"] == "" || ($_REQUEST["visa"] == "" && $_REQUEST["master-card"] == "")) { ?>
                <h1>Sorry</h1>

                <p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
            <?php } else {?>
                <h1>Thanks, sucker!</h1>

                <p>Your information has been recorded.</p>

                <dl>
                    <dt>Name</dt>
                    <dd><?php echo $_REQUEST["name"] ?></dd>

                    <dt>Section</dt>
                    <dd><?= $_REQUEST["sections"] ?></dd>

                    <dt>Credit Card</dt>
                    <dd><?= $_REQUEST["credit-card"] ?>(
                        <?php if ($_REQUEST["visa"] == "on") { ?>
                            Visa
                        <?php } else { ?>
                            Master Card
                        <?php } ?>
                        )
                    </dd>
                </dl>

                <?php
                $card_type = "";
                if ($_REQUEST["visa"] == "on") {
                    $card_type = "visa";
                } else {
                    $card_type = "mastercard";
                }

                $text = $_REQUEST["name"] . ";" . $_REQUEST["sections"] . ";" . $_REQUEST["credit-card"] . ";" . $card_type . "\n";

                file_put_contents('suckers.txt', $text, FILE_APPEND);
                ?>

                <p>Here are all the suckers who have submitted here:</p>
                <p><?php echo file_get_contents('suckers.txt')?> </p>
            <?php } ?>

    </body>
</html>