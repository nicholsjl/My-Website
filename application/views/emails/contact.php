<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $subject; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body style="margin: 0; padding: 0;">
    <p>This message was sent from your website's contact form on <?php echo date('m/d/y h:i:s a'); ?></p>
    <p>Use the email address provided below to contact the recipient.</p>
    <p><strong>Email Address:</strong> <?php echo $email; ?></p>
    <p><strong>Subject:</strong> <?php echo $subject; ?></p>
    <p><strong>Message:</strong> <?php echo $message; ?></p>
  </body>
</html>
