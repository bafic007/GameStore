import {InnerBlocks, useBlockProps} from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { copyrights, logos, links } = attributes;
	return (
		<div { ...useBlockProps.save() }>
			<div className="inner-footer">
				<InnerBlocks.Content />
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
	);
}
