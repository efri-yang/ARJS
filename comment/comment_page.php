<?php 
	session_start();
	$sessionId=$_SESSION["user_id"];
	if(!$sessionId){
		header("location:login.html");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>评论页面</title>
	  <script src="../build/react.js"></script>
	  <script src="../build/react-dom.js"></script>
	  <script src="//cdn.bootcss.com/babel-core/5.8.33/browser.min.js"></script>
	  <script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
	  <script src="//cdn.bootcss.com/marked/0.3.5/marked.min.js"></script>
	  <script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>

	  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<script type="text/babel">
		var CommentBox=React.createClass({
			getInitialState: function() {
			    return {
			      data: [],
			      isSuccess:false
			    };
			},
			loadCommentsFromServer:function(){
				$.ajax({
					url:"conn/getComment.php",
					dataType:"json",
					type:"post",
					success:function(data){
						console.dir(data)
						this.setState({data:data[0]});
					}.bind(this),
					error:function(xhr, status, err){
						alert("发生错误loadCommentsFromServer！")
					}.bind(this)
				});
			},
			handleCommentSubmit:function(text){
				
				var newData=this.state.data;
				$.ajax({
					url:"conn/comment.php",
					data:{content:text},
					dataType:"json",
					type:"post",
					success:function(data){
						if(!data[1].flag){
							alert("插入失败！");
							return;
						}
						//添加数据到this.state.data;
						this.setState({data:data[0],isSuccess:true});	

					}.bind(this),
					error:function(xhr, status, err){
						alert("错误");
					}.bind(this)
				});
			},
			componentDidMount:function(){
				console.dir("CommentBox-componentDidMount");
				this.loadCommentsFromServer();

			},
			render:function(){
				console.dir("CommentBox-render");
				console.dir("CommentBox:"+this.state.isSuccess)
				return (
					<div className="welcome-container">
						<p className="tip">欢迎您！<strong></strong></p>
						<div className="comment-box">
							<CommentList data={this.state.data} />
							<CommentForm issuccess={this.state.isSuccess} onCommentSubmit={this.handleCommentSubmit} />
						</div>
					</div>	
			 	)
			}
		});
		var Comment = React.createClass({
		  rawMarkup: function() {
		    var rawMarkup = marked(this.props.children.toString(), {
		      sanitize: true
		    });
		    return {
		      __html: rawMarkup
		    };
		  },

		  render: function() {
		    return (
		    			<li>
							<div className="hd clearfix">
								<h4>{this.props.username}</h4>
								<span className="time">{this.props.time}</span>
							</div>
							<div className="txt" dangerouslySetInnerHTML={this.rawMarkup()}></div>
						</li>
		    );
		  }
		});
		var CommentList=React.createClass({
			render:function(){
				var commentNodes=this.props.data.map(function(comment){
					return(
						<Comment username={comment.username} key={comment.comment_id} time={comment.time} >
				        	{comment.content}
				        </Comment>
					)
				})
				return(
					<ul className="comment-list">
						{commentNodes}
					</ul>
				)
			}
		});

		var CommentForm=React.createClass({
			getInitialState: function() {
				console.dir("getInitialState");
			    return {
			      cons: '你好'
			    };
			},
			handleAuthorChange: function(e) {
			    this.setState({
			      cons: e.target.value
			    });
			  },
			handleSubmit:function(event){
				event.preventDefault();
				var commentContent=this.refs.commentDetail.value.trim();
				if(!commentContent){
					alert("评论内容不能为空！");
					return;
				}
				this.props.onCommentSubmit(commentContent);
			},
			componentDidMount:function(){
				console.dir("CommentForm-componentDidMount");
			},
			componentWillMount:function(){
				console.dir("CommentForm-componentWillMount");
			},
			componentWillReceiveProps:function(){
				console.dir("componentWillReceiveProps-"+this.props.issuccess);
				if(this.props.issuccess){
					this.setState({
						cons:""
					})
				}
			},
			
			render:function(){
				
				console.dir("render----xxxx")
				
				return(
					<div className="comment-form">
					 <form className="commentForm" onSubmit={this.handleSubmit}>
						<div className="items">
							<input type="text" id="x1" ref="commentDetail" className="ipt-text" placeholder="请输入留言的内容" value={this.state.cons} onChange={this.handleAuthorChange} />
							<input type="submit" className="btn btn-primary btn-lg" value="提交"  />
						</div>
						</form>
					</div>
				)
			}
		});
		ReactDOM.render(
			<CommentBox />,
			document.getElementById("J_welcome-container")
		);
	</script>
	<div id="J_welcome-container">
		
		
	</div>




	<!-- <p class="tip">欢迎您！<strong><?php  echo $_SESSION["user_name"]; ?></strong></p>
		<div class="comment-box">
			
			<div class="comment-form">
				<div class="items">
					<input type="text" class="ipt-text" placeholder="请输入留言的内容" />
					<input type="submit" class="btn btn-primary btn-lg" value="提交" />
				</div>
			</div>
		</div> -->
</body>
</html>