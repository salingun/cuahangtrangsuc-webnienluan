<script type="text/javascript" src="jquery.js"></script> 
<script>
    $(document).ready(function () {
        var url = new URL(window.location.href);
        var trang = 1;
        if(url.searchParams.get('sotrang')!=null){
            trang = url.searchParams.get('sotrang');
        };
        $('.dslsp').on('change', function () { //on checkboxes check
        //sending checkbox value into serialize form
            var hi = $('.dslsp:checked').serialize();
            if (hi) {
                    document.getElementById('lspall').checked=false;
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: "pages/sanpham/filterLoaisanpham.php",
                        data: {brandss: hi, sotrang: trang},
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
                        data: {brandss: hi, sotrang: trang},
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
                    <div class="col col-4">
                        <form name="frmNhacungcap" id="frmNhacungcap" method="POST">
                            <?php
                                $nhaccClass = new Nhacungcap();
                                $nhaccResult = $nhaccClass->hienthiDSNhacungcap("");
                                while ($row = mysqli_fetch_array($nhaccResult)) {
                            ?>
                                    <label class="checkbox"><input type="checkbox" name="dsncc[]" id="ncc<?php echo $row['ncc_ma']; ?>" value="<?php echo $row['ncc_ma']; ?>" class="dsncc"><i></i><?php echo $row['ncc_ten']; ?></label>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
</div>