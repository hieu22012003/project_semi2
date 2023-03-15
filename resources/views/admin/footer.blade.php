<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy;<span id="hvy"></span> <a href="http://adminlte.io">Airlines Reservation</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b id="hvn"></b>
    </div>
    <script>
        var today = new Date();
        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;

        document.getElementById("hvn").innerHTML = dateTime;
    </script>
    <script>
        var today = new Date();
        var date = today.getFullYear();

        document.getElementById("hvy").innerHTML = date;
    </script>
</footer>
