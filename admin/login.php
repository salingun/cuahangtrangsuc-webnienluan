<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <?php require_once '../classes/myClass.php';?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
                                    <form role="form" name="frmDangnhapQT" method="POST">
						<fieldset>
							<div class="form-group">
                                                            <input class="form-control" placeholder="Tên đăng nhập" name="txtUsername" id="txtUsername" type="text" autofocus="">
							</div>
							<div class="form-group">
                                                            <input class="form-control" placeholder="Mật khẩu" name="txtPassword" id="txtPassword" type="password" value="">
							</div>
							
                                                    <input type="submit" name="subDangnhap" id="subDangnhap" class="btn btn-primary" value="Đăng nhập"/>
							
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
        <?php
        
        //xử lý đăng nhập
        if(isset($_POST['subDangnhap'])){
           
            $username = $_POST['txtUsername'];
            $password = md5($_POST['txtPassword']);
            $tvClass = new Thanhvien();
            $tvClass->dangnhapxetquyen($username, $password, "qt");
        }
        ?>

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
