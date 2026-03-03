import {RichText, useBlockProps} from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { title, description, image, video, link, linkAnchor, slides } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			{video && (
				<video className='video-bg' loop autoPlay muted playsInline>
					<source src={video} type="video/mp4" />
				</video>
			)}
			{image && <img src={image} alt="Background Image" />}
			<div className="hero-mask"></div>
			<div className="hero-content">
				<RichText.Content
					tagName="h1"
					className="hero-title"
					value={title}
				/>
				<RichText.Content
					tagName="p"
					className="hero-description"
					value={description}
				/>
				<a href={link} className="hero-button shadow">{linkAnchor}</a>
			</div>
			{slides && (
				<div className="hero-slider">
					<div className="slider-container swiper">
						<div className="swiper-wrapper">
							{slides.map((slide, index) => (
								<div className="swiper-slide slide-item" key={index}>
									<img src={slide.lightImage} alt="Logo" className='light-logo'/>
									<img src={slide.darkImage} alt="Logo" className='dark-logo'/>
								</div>
							))}
						</div>
					</div>
				</div>
			)}
		</div>
	);
}
