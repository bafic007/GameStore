import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, MediaPlaceholder } from '@wordpress/block-editor';
import { PanelBody, TextControl, TextareaControl } from "@wordpress/components";
import ServerSideRender from '@wordpress/server-side-render';

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { count, title, description, image } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __('Settings', 'blocks-gamestore') }>
					<TextControl
						label={ __('Count', 'blocks-gamestore') }
						value={ count }
						onChange={ ( val ) => setAttributes({ count: parseInt(val, 3) || 0 })}
					/>
					<TextControl
						label={ __('Title', 'blocks-gamestore') }
						value={ title }
						onChange={ ( title ) => setAttributes({ title })}
					/>
					<TextareaControl
						label={ __('Description', 'blocks-gamestore') }
						value={ description }
						onChange={ ( description ) => setAttributes({ description })}
					/>
					{image && (<img src={image} />)}
					<MediaPlaceholder
						icon="format-image"
						labels={ { title: 'Image' } }
						onSelect={ (media) => setAttributes( { image: media.url } ) }
						accept="image/*"
						allowedTypes={ ['image'] }
						notices={ ['image'] }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...useBlockProps() }>
				<ServerSideRender
					block="blocks-gamestore/recent-news"
					attributes={attributes}
				/>
			</div>
		</>
	);
}
