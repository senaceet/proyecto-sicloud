<br>
<center>
    <div id="error"><?php if (isset($this->_error)) {
                        echo $this->_error;
                    } ?></div>
</center>
</div>


<footer class="footer py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <a class="mr-3 text-white" href="<?= BASE_URL . 'index/terminos' ?> ">Politica de privacidad</a>
            </div>
            <div class="col-md-4 ">
                <span class="col-lg-4 h6 text-muted text-white ">Copyright SICLOUD <?= date('Y') ?> &copy</span>
            </div>
        </div>
    </div>
</footer>
<script>
    //$('table').addClass('box-card').addClass('text-center').addClass('mx-3')
    $('table').addClass('tablesorte table-hover bg-white table-sm table-bordered table-striped  text-center')
    $('table thead').addClass('p-2 bg-dark text-white text-center');
</script>
</body>

</html>