import { Component } from 'react';
import axios from 'axios';

class PostList extends Component {
	constructor( props ) {
		super( props );
		this.state = {
			posts: [],
			order: props.order,
			thumbnails: {},
		};
		this.isFirst = true;
	}

	componentDidMount() {
		this.fetchPosts();
	}

	componentDidUpdate( prevProps ) {
		if ( prevProps.order !== this.props.order ) {
			this.setState( { order: this.props.order }, this.fetchPosts );
		}
	}

	fetchPosts = () => {
		axios
			.get(
				`/wp-json/wp/v2/posts?per_page=4&order=${ this.state.order }`
			)
			.then( ( response ) => {
				this.setState( { posts: response.data }, this.fetchThumbnails );
			} )
			.catch( ( error ) => {
				console.error( 'Error fetching posts:', error );
			} );
	};

	fetchThumbnails = () => {
		const { posts } = this.state;

		posts.forEach( ( post ) => {
			if ( post.featured_media ) {
				axios
					.get( `/wp-json/wp/v2/media/${ post.featured_media }` )
					.then( ( response ) => {
						this.setState( ( prevState ) => ( {
							thumbnails: {
								...prevState.thumbnails,
								[ post.id ]: response.data.guid.rendered,
							},
						} ) );
					} )
					.catch( ( error ) => {
						console.error( 'Error fetching thumbnail:', error );
					} );
			}
		} );
	};

	createMarkup = ( html ) => {
		return { __html: html };
	};

	printDatasetFirst = () => {
		if ( this.isFirst ) {
			this.isFirst = false;
			return { dataFirst: 'true' };
		} else {
			return { dataFirst: 'false' };
		}
	};

	render() {
		return (
			<div className="posts-cards">
				{ this.state.posts.map( ( post, index ) => (
					<a
						href={ post.link }
						className={
							index === 0
								? 'posts-cards-card posts-cards-card--first'
								: 'posts-cards-card'
						}
						key={ post.id }
					>
						<div className="posts-cards-thumbnail">
							{ this.state.thumbnails[ post.id ] && (
								<img
									src={ this.state.thumbnails[ post.id ] }
									alt="Post Thumbnail"
								/>
							) }
						</div>
						<div className="posts-cards-card-content">
							{ index === 0 && (
								<p className="posts-cards-featured">
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="13"
										height="12"
										viewBox="0 0 13 12"
										fill="none"
									>
										<path
											d="M6.5 1.61803L7.48381 4.6459L7.59607 4.99139H7.95934H11.143L8.56737 6.86271L8.27348 7.07624L8.38573 7.42173L9.36955 10.4496L6.79389 8.57827L6.5 8.36475L6.20611 8.57827L3.63045 10.4496L4.61426 7.42173L4.72652 7.07624L4.43263 6.86271L1.85697 4.99139H5.04066H5.40393L5.51619 4.6459L6.5 1.61803Z"
											stroke="#FF4043"
										/>
									</svg>
									<span>Featured Post</span>
								</p>
							) }
							<h3
								dangerouslySetInnerHTML={ this.createMarkup(
									post.title.rendered
								) }
							/>
							<div
								dangerouslySetInnerHTML={ this.createMarkup(
									post.excerpt.rendered
										.split( ' ' )
										.splice( 0, 14 )
										.join( ' ' )
								) }
							/>
							<span className="posts-cards-card-popup">
								Read More
							</span>
						</div>
					</a>
				) ) }
			</div>
		);
	}
}

export default PostList;
