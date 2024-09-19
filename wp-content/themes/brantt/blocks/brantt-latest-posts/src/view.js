import React from 'react';
import ReactDOM from 'react-dom';
import PostList from './postList';

document.addEventListener( 'DOMContentLoaded', function () {
	const postListTarget = document.getElementById( 'post-list-target' );
	const order = postListTarget?.dataset.order;

	if ( postListTarget ) {
		ReactDOM.render( <PostList order={ order } />, postListTarget );
	}
} );
