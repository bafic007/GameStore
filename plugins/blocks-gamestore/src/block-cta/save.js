import {RichText, useBlockProps} from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { title, description, image, imageBg, links } = attributes;

	return (
		<div { ...useBlockProps.save({
			className: "alignfull",
			style: {
				background: imageBg ? `url(${imageBg})` : undefined,
			},
		}) }>
			<div className="wrapper cta-inner">
				<div className="left-part">
					<RichText.Content
						tagName="h2"
						className="cta-title"
						value={title}
					/>
					<RichText.Content
						tagName="p"
						className="cta-description"
						value={description}
					/>
					<div className="links-list">
						{links.map((link, index) => (
							<p key={index}>
								<a href={link.url} target="_blank" rel="noopener noreferrer">
									{link.anchor || "Untitled Link"}
								</a>
							</p>
						))}
					</div>
				</div>
				<div className="right-part">
					{image && <img className="image-cta" src={image} alt="CTA" />}
				</div>
			</div>
		</div>
	);
}
