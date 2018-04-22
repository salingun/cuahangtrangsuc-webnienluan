<script type="text/javascript" src="jquery.js"></script> 
<script>
    $(document).ready(function () {
        $('.dslsp').on('change', function () { //on checkboxes check
        //sending checkbox value into serialize form
            var hi = $('.dslsp:checked').serialize();
            if (hi) {
                    document.getElementById('lspall').checked=false;
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: "pages/sanpham/filterLoaisanpham.php",
                        data: {brandss: hi},
                        success: function (response) {
                            document.getElementById('getdata').style.display = "block";
                            document.getElementById("getdata").innerHTML = response;
                            $('#result').hide();
                        }
                    });
            } else {
                document.getElementById('lspall').checked=true;
                document.getElementById('getdata').style.display = "none";
                $('#result').show();
            }
        });
        
        $('.dsncc').on('change', function () { //on checkboxes check
        //sending checkbox value into serialize form
            var hi = $('.dsncc:checked').serialize();
            if (hi) {
                    document.getElementById('nccall').checked=false;
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: "pages/sanpham/filterNhacungcap.php",
                        data: {brandss: hi},
                        success: function (response) {
                            document.getElementById('getdata').style.display = "block";
                            document.getElementById("getdata").innerHTML = response;
                            $('#result').hide();
                        }
                    });
            } else {
                document.getElementById('nccall').checked=true;
                document.getElementById('getdata').style.display = "none";
                $('#result').show();
            }
        });
    });
</script>
<div class=" product-menu-bar">
    <div class="col-md-3 prdt-right">
        <div class="w_sidebar">
            <section  class="sky-form">
                <h1>Danh mục</h1>
                <div class="row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input id="lspall" type="checkbox" checked="true" onclick="window.location.assign('?page=sanpham&action=index')"><i></i>Tất cả</label>
                    </div>
                    <div class="col col-4">
                        <form name="frmLoaisanpham" name="frmLoaisanpham" method="POST">
                            <?php
                                $loaispClass = new Loaisanpham();
                                $loaispResult = $loaispClass->hienthiDSLoaiSP("");
                                while ($row = mysqli_fetch_array($loaispResult)) {
                            ?>
                                <label class="checkbox"><input type="checkbox" name="dslsp[]" id="lsp<?php echo $row['lsp_ma']; ?>" value="<?php echo $row['lsp_ma']; ?>" class="dslsp"><i></i><?php echo $row['lsp_ten']; ?></label>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </section>
            <section  class="sky-form">
                <h2>Nhà cung cấp</h2>
                <div class="row1 row2 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input id="nccall" type="checkbox" checked="true" onclick="window.location.assign('?page=sanpham&action=index')"><i></i>Tất cả</label>
                    </div>
                    <form name="frmNhacungcap" id="frmNhacungcap" method="POST">
                        <?php
                            $nhaccClass = new Nhacungcap();
                            $nhaccResult = $nhaccClass->hienthiDSNhacungcap("");
                            while ($row = mysqli_fetch_array($nhaccResult)) {
                        ?>
                                <label class="checkbox"><input type="checkbox" name="dsncc[]" id="ncc<?php echo $row['ncc_ma']; ?>" value="<?php echo $row['ncc_ma']; ?>" class="dsncc"><i></i><?php echo $row['ncc_ten']; ?></label>
                            <?php } ?>
                    </form>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kurtas</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Puma</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Chanel</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fendi</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Hilde Palladino</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Lana Marks</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Prada</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>flipkart</label>									
                    </div>
                </div>
            </section>
            <section class="sky-form">
                <h4>discount</h4>
                <div class="row1 row2 scroll-pane">
                    <div class="col col-4">
                        <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                    </div>
                    <div class="col col-4">
                        <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                    </div>
                </div>						
            </section>
            <section class="sky-form">
                <h4>Colour</h4>
                <ul class="w_nav2">
                    <li><a class="color1" href="#"></a></li>
                    <li><a class="color2" href="#"></a></li>
                    <li><a class="color3" href="#"></a></li>
                    <li><a class="color4" href="#"></a></li>
                    <li><a class="color5" href="#"></a></li>
                    <li><a class="color6" href="#"></a></li>
                    <li><a class="color7" href="#"></a></li>
                    <li><a class="color8" href="#"></a></li>
                    <li><a class="color9" href="#"></a></li>
                    <li><a class="color10" href="#"></a></li>
                    <li><a class="color12" href="#"></a></li>
                    <li><a class="color13" href="#"></a></li>
                    <li><a class="color14" href="#"></a></li>
                    <li><a class="color15" href="#"></a></li>
                    <li><a class="color5" href="#"></a></li>
                    <li><a class="color6" href="#"></a></li>
                    <li><a class="color7" href="#"></a></li>
                    <li><a class="color8" href="#"></a></li>
                    <li><a class="color9" href="#"></a></li>
                    <li><a class="color10" href="#"></a></li>
                </ul>
            </section>
        </div>
    </div>
</div>