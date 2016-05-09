<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录注册</title>
  <script src="../build/react.js"></script>
  <script src="../build/react-dom.js"></script>
  <script src="//cdn.bootcss.com/babel-core/5.8.33/browser.min.js"></script>
  <script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/marked/0.3.5/marked.min.js"></script>
  <script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<script type="text/babel">
		var LoginBox=React.createClass({
			submitHandler:function(event){
				event.preventDefault();
				var username=this.refs.username.value.trim();
				var password=this.refs.password.value.trim();
				if (!text || !author) {
					return;
				}

			},
			render:function(){
				return (
					<div className="login-box">
						<form action="http://www.baidu.com">
							<div className="item">
								<input type="text" ref="username" placeholder="请输入用户名" />
							</div>
							<div className="item">
								<input type="text" ref="password" placeholder="请输入密码" />
							</div>
							<div className="item">
								<input type="submit" value="登录" onClick={this.submitHandler} />
							</div>
						</form>
					</div>
				)
			}
		});
		
		ReactDOM.render(
			<LoginBox data={data} />,
			document.getElementById("loginbox")
		)
	</script>
	<div id="loginbox"></div>

	

</body>
</html>