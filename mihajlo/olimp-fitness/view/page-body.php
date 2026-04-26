<!-- GREŠKE -->
<?php if (!empty($_output['_error'])): ?>
    <script>
        let errors = <?php echo json_encode($_output['_error']); ?>;
        alert("Greške:\n\n- " + errors.join("\n- "));
    </script>
<?php endif; ?>


<!-- PORUKE -->
<?php if (!empty($_output['_message'])): ?>
    <script>
        let messages = <?php echo json_encode($_output['_message']); ?>;
        alert("Poruke:\n\n- " + messages.join("\n- "));
    </script>
<?php endif; ?>