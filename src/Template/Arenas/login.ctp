<body>


<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<fieldset>
<legend><?= __('Please enter your email and password') ?></legend>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>

<button onclick="javascript:login();">Login Facebook</button>

<footer>
    <div class="footer-center">
        <p> <strong>Gr-SI5-03-AG</strong> - Antoine BUI , Amarnath SUNDARAM</p>

    </div>
</footer>

</body>

</html>