import { __ } from '@wordpress/i18n';
import {useBlockProps, InspectorControls, MediaPlaceholder, RichText} from '@wordpress/block-editor';
import { PanelBody, TextControl, TextareaControl } from "@wordpress/components";

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { title, description, image } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __('Settings', 'blocks-gamestore') }>
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
			<div { ...useBlockProps({
				className: "alignfull",
				style: {
					background: image ? `url(${image})` : undefined
				}
			}) }>
				<div className="wrapper">
					<RichText
						tagName="h1"
						className="news-header-title"
						value={title}
						onChange = { (title) => setAttributes({ title })}
					/>
					<RichText
						tagName="p"
						className="news-header-description"
						value={description}
						onChange = { (description) => setAttributes({ description })}
					/>
				</div>
			</div>
		</>
	);
}
