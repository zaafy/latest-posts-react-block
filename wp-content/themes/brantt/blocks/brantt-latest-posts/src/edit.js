import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';
import PostList from './postList';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { title, overtitle, order, urlTitle, urlValue } = attributes;
	const blockProps = useBlockProps();
	blockProps.className = `${ blockProps.className } brantt-latest-posts`;

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'brantt' ) }>
					<TextControl
						label={ __( 'Title of the block', 'brantt' ) }
						value={ title || '' }
						onChange={ ( value ) =>
							setAttributes( { title: value } )
						}
					/>
					<TextControl
						label={ __( 'Text on top of title', 'brantt' ) }
						value={ overtitle || '' }
						onChange={ ( value ) =>
							setAttributes( { overtitle: value } )
						}
					/>
					<ToggleControl
						checked={ !! order }
						label={ __( 'Order by ASC / DESC', 'brantt' ) }
						onChange={ () => setAttributes( { order: ! order } ) }
					/>
					<TextControl
						label={ __( 'View All button text', 'brantt' ) }
						value={ urlTitle || '' }
						onChange={ ( value ) =>
							setAttributes( { urlTitle: value } )
						}
					/>
					<TextControl
						label={ __( 'View All button url', 'brantt' ) }
						value={ urlValue || '' }
						onChange={ ( value ) =>
							setAttributes( { urlValue: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<section { ...blockProps }>
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
					<PostList order={ order ? 'asc' : 'desc' } />
				</div>
			</section>
		</>
	);
}
