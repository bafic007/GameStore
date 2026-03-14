import { useBlockProps, InnerBlocks, InspectorControls, MediaPlaceholder } from '@wordpress/block-editor';
import {Button, PanelBody, TextControl, __experimentalDivider as Divider } from '@wordpress/components';
import './editor.scss';

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

const LogosRepeater = ({ logos, setLogos}) => {
	const addLogo = () => {
		setLogos([...logos, { url: "", image: "" }]);
	};

	const removeLogo = (index) => {
		const updatedLogos = logos.filter((_, i) => i !== index);
		setLogos(updatedLogos);
	};

	const updateLogos = (index, key, value) => {
		const updatedLogos = [...logos];
		updatedLogos[index][key] = value;
		setLogos(updatedLogos);
	};

	return (
		<div className="link-repeater">
			<h4>Manage Logos</h4>
			{logos.map((logo, index) => (
				<div key={index} className="logo-repeater-item">
					<TextControl
						label="URL"
						value={logo.url}
						onChange={(value) => updateLogos(index, "url", value)}
						placeholder="https://example.com"
					/>
					{logo.image && (<img src={logo.image} alt="Logo"/>)}
					<MediaPlaceholder
						icon="format-image"
						labels={{ title: 'Logo' }}
						onSelect={media => updateLogos(index, "image", media.url) }
						accept="image/*"
						allowedTypes={['image']}
					/>
					<Button
						variant="secondary"
						onClick={() => removeLogo(index)}
						className="remove-logo-button"
					>
						Remove Logo
					</Button>
				</div>
			))}
			<Button variant="primary" onClick={addLogo} className="add-logo-button">
				Add Logo
			</Button>
		</div>
	);
};

export default function Edit({ attributes, setAttributes }) {
	const { copyrights, logos = [], links=[] } = attributes;

	const setLinks = (newLinks) => setAttributes({ links: newLinks });
	const setLogos = (newLogos) => setAttributes({ logos: newLogos });

	return (
		<>
			<InspectorControls>
				<PanelBody title="Footer Settings">
					<TextControl
						label="Copyrights"
						value={ copyrights }
						onChange={ (value) => setAttributes({ copyrights: value }) }
					/>
					<Divider margin={8} />
					<LinkRepeater links={links} setLinks={setLinks} />
					<Divider margin={8} />
					<LogosRepeater logos={logos} setLogos={setLogos} />
				</PanelBody>
			</InspectorControls>
			<div { ...useBlockProps() }>
				<div className="wrapper inner-footer">
					<InnerBlocks />
					<div className="footer-line"></div>
					<div className="footer-bottom">
						<div className="left-part">
							{copyrights && (<p>{ copyrights }</p>)}
							{logos && (
								logos.map((logo, index) => (
									<a href={logo.url} key={index} target="_blank" rel="noopener noreferrer">
										<img src={logo.image} alt="Logo"/>
									</a>
								))
							)}
						</div>
						<div className="right-part">
							{links && (
								links.map((link, index) => (
									<a href={link.url} key={index}>
										{link.anchor}
									</a>
								))
							)}
						</div>
					</div>
				</div>
			</div>
		</>
	);
}
