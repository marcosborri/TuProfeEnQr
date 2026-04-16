<?php
// Separamos el email en partes para protegerlo de los bots
// 'nombre de email' y 'gmail.com'
$parts = explode('@', CONTACT_EMAIL);
?>

<footer>
  <p id="email-container">
    </p>
</footer>

<script>
  (function() {
    const user = "<?= $parts[0] ?>";
    const domain = "<?= $parts[1] ?>";
    

    const container = document.getElementById('email-container');
    const link = document.createElement('a');
    
    link.href = `mailto:${user}@${domain}`;
    link.className = 'contact-link';
    link.innerText = 'Contactame';
    
    container.appendChild(link);
  })();
</script>