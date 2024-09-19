import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { title, overtitle, order, urlTitle, urlValue } = attributes;

	return (
		<>
			<section className="brantt-latest-posts" { ...useBlockProps }>
				<div className="container">
					<div className="brantt-latest-posts-header">
						<p className="brantt-latest-posts-overtitle">
							{ overtitle }
						</p>
						<a
							className="brantt-latest-posts-link"
							href={ urlValue }
						>
							{ urlTitle }
						</a>
					</div>
					<h2 className="brantt-latest-posts-heading">{ title }</h2>
					<div
						id="post-list-target"
						data-order={ order ? 'asc' : 'desc' }
					/>
				</div>
			</section>
		</>
	);
}
