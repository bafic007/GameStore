import { useBlockProps } from '@wordpress/block-editor';

export default function save() {
	return (
		<div { ...useBlockProps.save() }>
			{ 'Blocks Gamestore – hello from the saved content!' }
		</div>
	);
}
