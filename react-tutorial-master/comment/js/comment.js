var  CommentBox=React.createClass({
	render:function(){
		return (
	      <div className="commentBox">
	        <h1>Comments</h1>
	        <CommentList data={this.state.data} />
	        <CommentForm onCommentSubmit={this.handleCommentSubmit} />
	      </div>
	    );
	}
});

var CommentList=React.createClass({})