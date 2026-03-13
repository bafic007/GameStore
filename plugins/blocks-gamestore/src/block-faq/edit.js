import {
	useBlockProps,
	RichText,
	InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, TextControl, TextareaControl, Button, ToggleControl } from "@wordpress/components";
import { useState } from "@wordpress/element";
import "./editor.scss";

const FAQItem = ({index, faq, onTitleChange, onDescriptionChange, onRemove}) => {
	return (
		<div className="gutenberg-faq-item">
			<TextControl
				label="Question"
				value={faq.title}
				onChange={(title) => onTitleChange(title, index)}
			/>
			<TextareaControl
				label="Answer"
				value={faq.description}
				onChange={(description) => onDescriptionChange(description, index)}
			/>
			<Button
				className="components-button is-secondary"
				isDestructive
				onClick={() => onRemove(index)}
			>Remove Item</Button>
		</div>
	);
};

export default function Edit({ attributes, setAttributes }) {
	const { title, margin } = attributes;
	const [faqs, setFaqs] = useState(attributes.faqs || []);

	const onFAQChange = (updatedFAQ, index) => {
		const updateFaqs = [...faqs];
		updateFaqs[index] = updatedFAQ;
		setFaqs(updateFaqs);
		setAttributes({ faqs: updateFaqs });
	}

	const addFAQ = () => {
		setFaqs([...faqs, { title: '', description: '' }]);
	}

	const handleTitleChange = (newTitle, index) => {
		const updateFAQ = {...faqs[index], title: newTitle};
		onFAQChange(updateFAQ, index);
	}

	const handleDescriptionChange = (newDescription, index) => {
		const updateFAQ = {...faqs[index], description: newDescription};
		onFAQChange(updateFAQ, index);
	}

	const removeFAQ = (index) => {
		const updateFaqs = [...faqs];
		updateFaqs.splice(index, 1);
		setFaqs(updateFaqs);
		setAttributes({faqs: updateFaqs});
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title="FAQ Settings">
					<TextControl
						label="Title"
						value={title}
						onChange={(title) => setAttributes({ title })}
					/>
					<ToggleControl
						label="Margins Zero"
						checked={margin}
						onChange={(margin) => setAttributes({ margin })}
					/>
					{faqs.map((faq, index) => (
						<FAQItem
							key={index}
							index={index}
							faq={faq}
							onTitleChange={handleTitleChange}
							onDescriptionChange={handleDescriptionChange}
							onRemove={removeFAQ}
						/>
					))}
					<Button className="is-primary components-button" onClick={addFAQ}>Add FAQ</Button>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps({
				className: `${margin ? 'no-margin' : ''}`
			})} >
				<div className="wrapper faq-inner">
					{title && (
						<RichText
							tagName="h2"
							className="faq-title"
							value={title}
							onChange={(title) => setAttributes({ title })}
						/>
					)}
					{faqs.map((faq, index) => (
						<div key={index} className="faq-item">
							<RichText
								tagName="div"
								className="faq-item-title"
								value={faq.title}
								onChange={(newTitle) => handleTitleChange(newTitle, index)}
							/>
							<RichText
								tagName="div"
								className="faq-item-description"
								value={faq.description}
								onChange={(newDescription) => handleDescriptionChange(newDescription, index )}
							/>
						</div>
					))}
				</div>
			</div>
		</>
	);
}
