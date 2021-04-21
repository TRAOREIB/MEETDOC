<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Prise de contact sur mon beau site</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
      <li><strong>Nom</strong> : <?php echo e($contact['nom']); ?></li>
      <li><strong>Email</strong> : <?php echo e($contact['email']); ?></li>
      <li><strong>Message</strong> : <?php echo e($contact['message']); ?></li>
    </ul>
  </body>
</html><?php /**PATH C:\xampp\htdocs\montest6\resources\views/emails/contact.blade.php ENDPATH**/ ?>