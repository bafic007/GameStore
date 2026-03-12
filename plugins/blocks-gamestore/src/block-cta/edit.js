import {
	useBlockProps,
	RichText,
	InspectorControls,
	MediaPlaceholder,
} from "@wordpress/block-editor";
import { PanelBody, TextControl, Button } from "@wordpress/components";
import "./editor.scss";

const LinkRepeater = ({ links, setLinks }) => {
	const addLink = () => {
		setLinks([...links, { url: "", anchor: "" }]);
	};

	const removeLink = (index) => {
		const updatedLinks = links.filter((_, i) => i !== index);
		setLinks(updatedLinks);
	};

	const updateLink = (index, key, value) => {
		const updatedLinks = [...links];
		updatedLinks[index][key] = value;
		setLinks(updatedLinks);
	};

	return (
		<div className="link-repeater">
			<h4>Manage Links</h4>
			{links.map((link, index) => (
				<div key={index} className="link-repeater-item">
					<TextControl
						label="URL"
						value={link.url}
						onChange={(value) => updateLink(index, "url", value)}
						placeholder="https://example.com"
					/>
					<TextControl
						label="Anchor Text"
						value={link.anchor}
						onChange={(value) => updateLink(index, "anchor", value)}
						placeholder="Link text"
					/>
					<Button
						variant="secondary"
						onClick={() => removeLink(index)}
						className="remove-link-button"
					>
						Remove Link
					</Button>
				</div>
			))}
			<Button variant="primary" onClick={addLink} className="add-link-button">
				Add Link
			</Button>
		</div>
	);
};

export default function Edit({ attributes, setAttributes }) {
	const { title, description, links = [], imageBg, image } = attributes;

	const setLinks = (newLinks) => setAttributes({ links: newLinks });

	return (
		<>
			<InspectorControls>
				<PanelBody title="CTA Settings">
					<TextControl
						label="Title"
						value={title}
						onChange={(title) => setAttributes({ title })}
					/>
					<TextControl
						label="Description"
						value={description}
						onChange={(description) => setAttributes({ description })}
					/>
					{imageBg && <img src={imageBg} alt="Background" />}
					<MediaPlaceholder
						icon="format-image"
						labels={{ title: "Background Image" }}
						onSelect={(media) => setAttributes({ imageBg: media.url })}
						accept="image/*"
						allowedTypes={["image"]}
					/>
					<br />
					<br />
					{image && <img src={image} alt="CTA" />}
					<MediaPlaceholder
						icon="format-image"
						labels={{ title: "CTA Image" }}
						onSelect={(media) => setAttributes({ image: media.url })}
						accept="image/*"
						allowedTypes={["image"]}
					/>
				</PanelBody>
				<PanelBody title="Manage Links">
					<LinkRepeater links={links} setLinks={setLinks} />
				</PanelBody>
			</InspectorControls>
			<div
				{...useBlockProps({
					className: "alignfull",
					style: {
						background: imageBg ? `url(${imageBg})` : undefined,
					},
				})}
			>
				<div className="wrapper cta-inner">
					<div className="left-part">
						<RichText
							tagName="h2"
							className="cta-title"
							value={title}
							onChange={(title) => setAttributes({ title })}
						/>
						<RichText
							tagName="p"
							className="cta-description"
							value={description}
							onChange={(description) => setAttributes({ description })}
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
		</>
	);
}
